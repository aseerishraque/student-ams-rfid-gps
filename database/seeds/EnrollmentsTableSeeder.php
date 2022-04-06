<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Enrollment;

class EnrollmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classroom_id = \App\Models\Classroom::first()->id;
        // $students = User::role('student')->get();
        $students = User::all();
        foreach ($students as $student){
            $obj = new Enrollment();
            $obj->classroom_id = $classroom_id;
            $obj->student_id = $student->id;
            $obj->save();
        }
    }
}
