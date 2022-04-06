<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function daily()
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $attendances = Attendance::join('classrooms', 'classrooms.id', 'attendances.classroom_id')
                                ->join('users', 'users.id', 'attendances.student_id')
                                ->where('classrooms.user_id', auth()->user()->id)
                                ->get();

        return view('pages.reports.daily', compact('classrooms', 'attendances'));
    }

    public function dailyFilter(Request $request)
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $attendances = Attendance::join('classrooms', 'classrooms.id', 'attendances.classroom_id')
            ->join('users', 'users.id', 'attendances.student_id')
            ->where('classrooms.user_id', auth()->user()->id)
            ->where('attendances.date', '>=', $request->start_date)
            ->where('attendances.date', '<=', $request->end_date)
            ->get();

        return view('pages.reports.daily', compact('classrooms', 'attendances'))->with([
            'success' => 'Showing Results of Date:'.$request->start_date.' - '.$request->end_date
        ]);
    }

    public function monthly()
    {
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $attendances = DB::select(DB::raw('SELECT a.*, month(date) as month, day(date) as day from attendances a, classrooms c where a.classroom_id = c.id AND c.user_id = '.auth()->user()->id));
        $students = User::role('student')->join('enrollments', 'enrollments.student_id', 'users.id')
//                      ->where('enrollments.classroom_id', $classroom_id)
                        ->get();
        $data = array();
        foreach ($attendances as $value){
            $data[$value->student_id][$value->month][$value->day] = $value->is_present;
        }
        $months = DB::select(DB::raw('SELECT month(a.date) as month from attendances a, classrooms c where a.classroom_id = c.id AND c.user_id = '.auth()->user()->id.' GROUP BY month'));

        return view('pages.reports.monthly', compact('classrooms', 'students', 'data', 'months'));
    }

    public function monthlyFilter(Request $request)
    {
        $classroom_name = Classroom::where('id', $request->classroom_id)->first()->name;
        $classrooms = Classroom::where('user_id', auth()->user()->id)->get();
        $attendances = DB::select(DB::raw('SELECT a.*, month(date) as month, day(date) as day from attendances a, classrooms c where a.classroom_id = c.id AND c.user_id = '.auth()->user()->id.' AND month(date) >= '.$request->start_month.' AND month(date) <= '.$request->end_month));
        $students = User::role('student')->join('enrollments', 'enrollments.student_id', 'users.id')
                      ->where('enrollments.classroom_id', $request->classroom_id)
                      ->get();
        $data = array();
        foreach ($attendances as $value){
            $data[$value->student_id][$value->month][$value->day] = $value->is_present;
        }
        $months = DB::select(DB::raw('SELECT month(a.date) as month from attendances a, classrooms c where a.classroom_id = c.id AND c.user_id = '.auth()->user()->id.' AND month(date) >= '.$request->start_month.' AND month(date) <= '.$request->end_month.' GROUP BY month'));

        return view('pages.reports.monthly', compact('classrooms', 'students', 'data', 'months', 'classroom_name'));
    }

    public function yearly()
    {
        return view('pages.reports.yearly');
    }
}
