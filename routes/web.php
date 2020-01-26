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

Route::namespace('admin')->prefix('/admin')->group(function (){
    Route::resource('units','UnitController');
    Route::resource('shifts','ShiftController');
    Route::resource('workTime','WorkTimeController');
});

Route::resource('users', 'admin\UsersController');
Route::resource('vacationType', 'admin\VacationTypeController');
Route::resource('specialVacation', 'admin\SpecialVacationController');
Route::resource('holidays', 'admin\HolidayController');
Route::resource('demandVacation', 'DemandVacationController');
Route::resource('userVacation', 'UserVacationController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('demandVacation', 'DemandVacationController')->middleware('auth');
