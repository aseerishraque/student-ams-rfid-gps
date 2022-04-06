<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleStudents = Role::create(['name' => 'student']);
        $roleUser = Role::create(['name' => 'guardian']);

        //Permissions list as Array
        $permissions = [

            [
                'group_name' => "Admin",
                'permissions' => [
                    'Admin.Roles and Permission',
                    'Admin.RFID',
                    'Admin.Leave Approval',
                    'Admin.Users',
                    'Admin.Reports',
                    'Admin.Take Attendance',
                    'Admin.Track Students'
                ]
            ],
            [
                'group_name' => "Classrooms",
                'permissions' => [
                    'Classrooms.Create',
                    'Classrooms.View',
                    'Classrooms.Edit',
                    'Classrooms.Delete'
                ]
            ],

            [
                'group_name' => "Students",
                'permissions' => [
                    'Students.Apply Leave'
                ]
            ]
        ];

        //Create  and Assign Permissions to superAdmin
//        $permission = Permission::create(['name' => 'edit articles']);
        for ($i=0;$i<count($permissions);$i++){
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0;$j<count($permissions[$i]['permissions']);$j++){
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup
                ]);
                if($permissionGroup == "Students"){
                    $roleStudents->givePermissionTo($permission);
                    $permission->assignRole($roleStudents);
                }else{
                    $roleAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleAdmin);

                    $roleSuperAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleSuperAdmin);
                }
                
            }

        }
    }
}
