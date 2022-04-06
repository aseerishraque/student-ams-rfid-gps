<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\LeaveApproval;
use App\Models\RfidLog;
use App\User;
use App\Models\Enrollment;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::join("enrollments", "enrollments.classroom_id", "classrooms.id")
                                ->where('enrollments.student_id', auth()->user()->id)
                                ->select("classrooms.*")
                                ->get();

        return view('pages.classrooms.index', compact('classrooms'));
    }

    public function joinClassroom(Request $request){
        $classroom = Classroom::where("join_code", $request->join_code)->first();
        if(!is_null($classroom)){
            $obj = new Enrollment();
            $obj->classroom_id = $classroom->id;
            $obj->student_id = auth()->user()->id;
            if($obj->save()){
                return redirect()->route("admin.classrooms")->with([
                    "success" => "Classroom joined Successfully!"
                ]);
            }else{
                return redirect()->route("admin.classrooms")->with([
                    "error" => "Classroom join Error!"
                ]);
            }
        }else{
            return redirect()->route("admin.classrooms")->with([
                "error" => "Classroom Not found!"
            ]);
        }
    }

    public function registerStudent(){
        return view('pages.users.register-student');
    }

    public function ProcessRegisterStudent(Request $request){
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email',
            'username' => 'required|max:100|unique:users,username',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New Student
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();


        $user->assignRole('student');

        session()->flash('success', 'Student has been registered !!');
        return redirect()->route('login.get');
    }

    public function trackStudents($classroom_id){
        return view("pages.classrooms.track", compact('classroom_id'));
    }

    public function rfidLogs()
    {
        $logs = RfidLog::join("users", "users.id", "rfid_logs.student_id")
                        ->select("rfid_logs.*", "users.name", "users.username")
                        ->get();
        $classrooms = Classroom::select("classrooms.*")
                                ->get();

        return view('pages.rfid-logs', compact("logs", "classrooms"));
    }

    public function rfidLogsFilter(Request $request)
    {
        $logs = RfidLog::join("users", "users.id", "rfid_logs.student_id")
                        ->join("enrollments", "enrollments.classroom_id", "rfid_logs.student_id")
                        ->select("rfid_logs.*", "users.name", "users.username")
                        ->where("enrollments.classroom_id", $request->classroom_id)
                        ->get();
        $classrooms = Classroom::select("classrooms.*")
                                ->get();

        return view('pages.rfid-logs', compact("logs","classrooms"));
    }

    public function requests()
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $requests = LeaveApproval::join('classrooms', 'classrooms.id', 'leave_approvals.classroom_id')
                                ->join('users', 'users.id', 'leave_approvals.user_id')
                                ->where('classrooms.user_id', auth()->user()->id)
                                ->where('leave_approvals.is_approve', 0)
                                ->select('leave_approvals.*', 'users.id as student_id', 'users.name as student_name', 'classrooms.name as classroom_name')
                                ->get();
        return view('pages.requests', compact('requests', 'classrooms'));
    }

    public function approveRequest(Request $request, $req_id)
    {
        $obj = LeaveApproval::find($req_id);
        $obj->is_approve = 1;
        $obj->save();

        $period = new \DatePeriod(
            new \DateTime($obj->start_date),
            new \DateInterval('P1D'),
            new \DateTime($obj->end_date)
        );

        foreach ($period as $key => $value) {
            $check = Attendance::where('student_id', $obj->user_id)
                ->where('date', $value->format('Y-m-d'))
                ->first();
            $obj2 = new Attendance();
            if (isset($check))
                $obj2 = $check; //Create or Update
            $obj2->classroom_id = $obj->classroom_id;
            $obj2->student_id = $obj->user_id;
            $obj2->date = $value->format('Y-m-d');
            $obj2->is_present = 1;
            $obj2->save();
        }
        return back()->with([
           'success' => 'Leave Application Approved!'
        ]);

    }

    public function declineRequest(Request $request, $req_id)
    {
        $obj = LeaveApproval::find($req_id);
        if (file_exists($obj->document))
            unlink(public_path($obj->document));
        if ($obj->delete())
            return back()->with([
               'success' => 'Approval Declined!'
            ]);
        else
            return back()->with([
               'error' => 'Something went wrong!'
            ]);
    }
    public function approves()
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $approves = LeaveApproval::join('classrooms', 'classrooms.id', 'leave_approvals.classroom_id')
                                ->join('users', 'users.id', 'leave_approvals.user_id')
                                ->where('classrooms.user_id', auth()->user()->id)
                                ->where('leave_approvals.is_approve', 1)
                                ->select('leave_approvals.*', 'users.id as student_id', 'users.name as student_name', 'classrooms.name as classroom_name')
                                ->get();
        return view('pages.approves', compact("approves"));
    }

    public function createClassroom()
    {
        while (true){
            $faker = Factory::create();
            $join_code = $faker->regexify('^[0-9,A-Z]{6}$');
            $check = Classroom::where('join_code', $join_code)->first();
            if (!isset($check))
                return view('pages.classrooms.create', compact('join_code'));
        }

    }
    public function editClassroom($id)
    {
        $classroom = Classroom::find($id);
        return view('pages.classrooms.edit', compact('classroom'));

    }

    public function storeClassroom(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'section' => 'required|max:10',
            'send_msg_guardian' => 'required',
            'join_code' => 'required|max:6|unique:classrooms,join_code'
        ]);
        $obj = new Classroom();
        $obj->user_id = auth()->user()->id;
        $obj->user_id = 1;
        $obj->name = $request->name;
        $obj->section = $request->section;
        if (isset($request->working_days))
            $obj->working_days = $request->working_days;
        if (isset($request->marks))
            $obj->marks = $request->marks;
        $obj->send_msg_guardian = $request->send_msg_guardian;
        $obj->join_code = $request->join_code;
        if ($obj->save()){
            $obj2 = new Enrollment();
            $obj2->classroom_id = $obj->id;
            $obj2->student_id = auth()->user()->id;
            $obj2->save();
            return back()->with([
                'success' => 'Classroom Created !'
            ]);
        }
        else
            return back()->with([
                'error' => 'Classroom Create Error!'
            ]);

    }

    public function updateClassroom(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'section' => 'required|max:10',
            'send_msg_guardian' => 'required',
            'join_code' => 'required|max:6|unique:classrooms,join_code,'.$id
        ]);
        $obj = new Classroom();
        $obj = $obj->find($id);
        $obj->user_id = auth()->user()->id;
        $obj->name = $request->name;
        $obj->section = $request->section;
        if (isset($request->working_days))
            $obj->working_days = $request->working_days;
        if (isset($request->marks))
            $obj->marks = $request->marks;
        $obj->send_msg_guardian = $request->send_msg_guardian;
        $obj->join_code = $request->join_code;
        if ($obj->save())
            return back()->with([
                'success' => 'Classroom Updated !'
            ]);
        else
            return back()->with([
                'error' => 'Classroom Update Error!'
            ]);
    }

    public function destroyClassroom($id)
    {
        $obj = new Classroom();
        $obj = $obj->find($id);
        if ($obj->delete())
            return back()->with([
               'success' => 'Classroom Deleted !'
            ]);
        else
            return back()->with([
               'error' => 'Classroom Delete Error!'
            ]);
    }

    public function guardianList()
    {
        return view('pages.guardian-list');
    }

    public function studentList()
    {
        return view('pages.student-list');
    }

    public function takeAttendance($classroom_id)
    {
        $students = User::role('student')->join('enrollments', 'enrollments.student_id', 'users.id')
                    ->where('enrollments.classroom_id', $classroom_id)
                    ->get();
        return view('pages.take-attendance', compact('students', 'classroom_id'));
    }
}
