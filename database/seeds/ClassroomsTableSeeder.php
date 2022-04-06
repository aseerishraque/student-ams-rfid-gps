<?php

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('classrooms')->delete();
        
        \DB::table('classrooms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'name' => 'Class 9',
                'section' => 'A',
                'working_days' => 32,
                'marks' => 100,
                'join_code' => 'WWVCL5',
                'send_msg_guardian' => 1,
                'created_at' => '2021-08-05 15:47:21',
                'updated_at' => '2021-08-05 15:47:21',
            ),
        ));
        
        
    }
}