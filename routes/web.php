<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login', 'DashboardController@loginPage')->name('login.get');
Route::post('login', 'DashboardController@loginCheck')->name('login.auth');
Route::get("register-student", "ClassroomController@registerStudent")->name("register.student");
Route::post("register-student", "ClassroomController@ProcessRegisterStudent")->name("register.student.store");
Route::middleware(['is_logged_in'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.classrooms');
    });
    Route::get('logout', 'DashboardController@logout')->name('logout');
    Route::group(['prefix' => "classrooms"], function (){
        Route::get('/', 'ClassroomController@index')->name('admin.classrooms');
        Route::get('create', 'ClassroomController@createClassroom')->name('classrooms.create');
        Route::post('create', 'ClassroomController@storeClassroom')->name('classrooms.store');
        Route::get('edit/{classroom_id}', 'ClassroomController@editClassroom')->name('classrooms.edit');
        Route::put('edit/{classroom_id}', 'ClassroomController@updateClassroom')->name('classrooms.update');
        Route::delete('delete/{classroom_id}', 'ClassroomController@destroyClassroom')->name('classroom.destroy');
        Route::group(['prefix' => "attendance"], function (){
            Route::get('take-attendance/{classroom_id}', 'ClassroomController@takeAttendance')->name('attendance.get');
            Route::get('track-students/{classroom_id}', 'ClassroomController@trackStudents')->name('track.get');
            Route::post('store-attendance/{classroom_id}', 'AttendanceController@store')->name('attendance.store');
        });

    });
    Route::group(['prefix' => "admin"], function (){
        Route::get('dashboard', 'DashboardController@adminDashboard')->name('dashboard.admin');
        Route::group(['prefix' => "reports"], function (){
            Route::get('daily', 'ReportsController@daily')->name('reports.daily');
            Route::post('daily', 'ReportsController@dailyFilter')->name('reports.daily.filter');
            Route::get('monthly', 'ReportsController@monthly')->name('reports.monthly');
            Route::post('monthly', 'ReportsController@monthlyFilter')->name('reports.monthly.filter');
            Route::get('yearly', 'ReportsController@yearly')->name('reports.yearly');
        });
        Route::get('rfid-logs', 'ClassroomController@rfidLogs')->name('rfid.logs');
        Route::post('rfid-logs', 'ClassroomController@rfidLogsFilter')->name('rfid.logs.filter');
        Route::group(['prefix' => "leave-approvals"], function (){
            Route::get('requests', 'ClassroomController@requests')->name('leave.requests');
            Route::get('approves', 'ClassroomController@approves')->name('leave.approves');
            Route::post('approve-request/{req_id}', 'ClassroomController@approveRequest')->name('leave.approve-request');
            Route::post('decline-request/{req_id}', 'ClassroomController@declineRequest')->name('leave.approve-decline');
        });

        Route::get('student-list', 'ClassroomController@studentList')->name('students.list');
        Route::get('guardian-list', 'ClassroomController@guardianList')->name('guardians.list');

        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('users', 'UserController');
        Route::post("join-classroom", "ClassroomController@joinClassroom")->name("classroom.join");
    });//End of Admin Routes


//    Start of Student Routes
    Route::group(['prefix' => "students"], function (){
        Route::get('apply-leave/{classroom_id}', 'LeaveApprovalController@create')->name('leave.apply');
        Route::post('apply-leave/{classroom_id}', 'LeaveApprovalController@applyLeave')->name('leave.apply.post');
    });
});



