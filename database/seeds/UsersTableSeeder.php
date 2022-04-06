<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'aseer@gmail.com')->first();
        if (is_null($user))
        {
            $user = new User();
            $user->name = "Aseer Ishraqul Hoque";
            $user->username = "admin";
            $user->email = "aseer@gmail.com";
            $user->password = Hash::make('123456');
            $user->save();
        }
        //Assign SuperAdmin Role to First User(username: admin)
        $user = User::first();
        $roleSuperAdmin = Role::findByName('superadmin');
        $user->assignRole($roleSuperAdmin);

        //creating 10 users and assigning them as Student
        factory(\App\User::class, 10)->create();
        $users = User::where('id', '!=', $user->id)->get();
        $studentRole = Role::findByName('student');
        foreach ($users as $value){
            $value->assignRole($studentRole);
        }
    }
}
