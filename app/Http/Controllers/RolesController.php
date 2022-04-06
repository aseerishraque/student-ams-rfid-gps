<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesController extends Controller
{
//    public $user;
//
//    public function __construct()
//    {
//        $this->middleware(function ($request, $next){
//            $this->user = Auth::guard('admin')->user();
//            return $next($request);
//        });
//    }

    public function index()
    {
//        if (is_null($this->user) || !$this->user->can('role.view')){
//            abort(403, "Sorry! You are Unauthorized to view any role.!");
//        }
        $roles = Role::all();
        return view('pages.roles.index', compact('roles'));
    }


    public function create()
    {
//        if (is_null($this->user) || !$this->user->can('role.create')){
//            abort(403, "Sorry! You are Unauthorized to create any role.!");
//        }
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('pages.roles.create', compact('all_permissions', 'permission_groups'));
    }


    public function store(Request $request)
    {
//        if (is_null($this->user) || !$this->user->can('role.create')){
//            abort(403, "Sorry! You are Unauthorized to create any role.!");
//        }
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        // Process Data
        $role = Role::create(['name' => $request->name]);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been created !!');
        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
//        if (is_null($this->user) || !$this->user->can('role.edit')){
//            abort(403, "Sorry! You are Unauthorized to edit any role.!");
//        }
        $role = Role::findById($id);
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('pages.roles.edit', compact('role', 'all_permissions', 'permission_groups'));
    }


    public function update(Request $request, $id)
    {
//        if (is_null($this->user) || !$this->user->can('role.edit')){
//            abort(403, "Sorry! You are Unauthorized to edit any role.!");
//        }
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        $role = Role::findById($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been updated !!');
        return back();
    }


    public function destroy($id)
    {
//        if (is_null($this->user) || !$this->user->can('role.delete')){
//            abort(403, "Sorry! You are Unauthorized to delete any role.!");
//        }
        $role = Role::findById($id);
        if (!is_null($role)) {
            $role->delete();
        }

        session()->flash('success', 'Role has been deleted !!');
        return back();
    }
}
