<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('shift/create', 'Admin\ShiftController@add')->name('admin.shift.create');
    Route::post('shift/create', 'Admin\ShiftController@create');
    Route::get('shift', 'Admin\ShiftController@index')->name('admin.shift');
    Route::get('shift/edit', 'Admin\ShiftController@edit');
    Route::post('shift/edit', 'Admin\ShiftController@update');
    Route::get('shift/display', 'Admin\ShiftController@display');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('schedule/create', 'Admin\ScheduleController@add')->name('admin.schedule.create');
    Route::post('schedule/create', 'Admin\ScheduleController@create');
    Route::get('schedule', 'Admin\ScheduleController@index')->name('admin.schedule');
    Route::get('schedule/edit', 'Admin\ScheduleController@edit');
    Route::post('schedule/edit', 'Admin\ScheduleController@update');
    Route::get('schedule/display', 'Admin\ScheduleController@display');
});