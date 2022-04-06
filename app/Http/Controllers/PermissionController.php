<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $group_names = Permission::groupBy('group_name')->select('group_name')->get();

        return view('pages.permissions.create', compact('group_names'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:permissions,name',
            'group_name' => 'required|max:100'
        ]);

        $permission = Permission::create([
            'name' => $request->group_name.'.'.$request->name,
            'group_name' => $request->group_name
        ]);
        return back()->with([
            'success' => "Permission Created Successfully!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $group_names = Permission::groupBy('group_name')->select('group_name')->get();
        $permission = Permission::findById($id);
        return view('pages.permissions.edit', compact('permission', 'group_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|unique:permissions,name',
            'group_name' => 'required|max:100'
        ]);

        $permission = Permission::findById($id);
        $permission->name = $request->name;
        $permission->group_name = $request->group_name;
        if ($permission->save())
            return back()->with([
                'success' => "Permission Updated Successfully!"
            ]);
        else
            return back()->with([
                'error' => "Something went Wrong!"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $permission = Permission::findById($id);

        $roles = Role::all();
        foreach ($roles as $role){
            $role->revokePermissionTo($permission);
        }
        if($permission->delete())
            return back()->with([
                'success' => "Permission Deleted Successfully!"
            ]);
        else
            return back()->with([
                'error' => "Something went Wrong!"
            ]);
    }
}
