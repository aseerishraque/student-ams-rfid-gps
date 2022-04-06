<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\StudentRfidCardInfo;

class StudentRfidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = User::role("student")->get();
        $i=0;
        foreach($students as $student){

            if($i == 0){
                $obj = new StudentRfidCardInfo();
                $obj->student_id = $student->id;
                $obj->card_id = "ajuddi";
                $obj->save();
            }else if($i == 1){
                $obj = new StudentRfidCardInfo();
                $obj->student_id = $student->id;
                $obj->card_id = "ajuqji";
                $obj->save();          
            }
            

            $i++;
            if($i == 2){
                break;
            }
        }
    }
}
