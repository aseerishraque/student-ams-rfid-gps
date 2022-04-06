<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request, $id)
    {
       $students = User::role('student')->join('enrollments', 'enrollments.student_id', 'users.id')
            ->where('enrollments.classroom_id', $id)
            ->get();
       foreach ($students as $student)
       {
           $check = Attendance::where('student_id', $student->student_id)
                                ->where('date', $request->date)
                                ->first();
           $obj = new Attendance();
           if (isset($check))
               $obj = $check;
           $obj->classroom_id = $id;
           $obj->student_id = $student->student_id;
           $obj->date = $request->date;
           if (isset($request->present[$student->student_id]))
               $obj->is_present = 1;
           else
               $obj->is_present = 0;
           $obj->save();
       }
       return back()->with([
          'success' => 'Attendance Taken for Date: '.$request->date
       ]);

    }
}
