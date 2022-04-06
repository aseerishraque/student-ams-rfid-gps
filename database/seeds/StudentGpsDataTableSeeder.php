<?php

use Illuminate\Database\Seeder;
use App\StudentGpsData;

class StudentGpsDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new StudentGpsData();
        $user1->user_id = 2;
        $user1->lat = "22.363544";
        $user1->lng = "91.819885";
        $user1->save();

        $user1 = new StudentGpsData();
        $user1->user_id = 3;
        $user1->lat = "22.363639";
        $user1->lng = "91.819970";
        $user1->save();

        $user1 = new StudentGpsData();
        $user1->user_id = 4;
        $user1->lat = "22.363810063065678";
        $user1->lng = "91.81981297784178";
        $user1->save();

    }
}
