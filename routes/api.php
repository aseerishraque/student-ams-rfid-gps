<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => "v1"], function (){
    Route::get('get-new-join-code', 'api\ApiController@getNewJoinCode')->name('join_code.new');


    //Student Android api
    Route::post('login', "api\ApiController@studentLogin");
    Route::post("store-gps/{student_id}", "api\ApiController@storeGPS");


    // Arduino Api
    Route::get("store-student-rfid/{card_id}", "api\ApiController@storeRfidLog");

    //Track students api
    Route::get("fetch-gps-data", "api\ApiController@fetchGpsData");
    Route::get("fetch-rfid-gps-data", "api\ApiController@fetchRfidGpsData");
    Route::post("get-rfid-logs-today", "api\ApiController@getRfidsToday");
    Route::post("store-student-gps-attendance/{classroom_id}", "api\ApiController@storeStudentGpsAttendance");
});
