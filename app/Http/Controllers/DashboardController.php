<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('pages.admin-dashboard');
    }

    public function loginPage()
    {
        return view('pages.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.get');
    }

    public function loginCheck(Request $request)
    {
        if (auth()->attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return redirect()->route('admin.classrooms');
        }else{
            return back()->with([
               'error' => 'Invalid Username/Password'
            ]);
        }
    }
}
