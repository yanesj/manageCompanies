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

Route::get('/companies', 'HomeController@index')->name('companies');
Route::get('/employees','EmployeeController@index')->name('employees');
Route::post('/createCompany','HomeController@create')->name('createCompany');
Route::post('/createEmployee','EmployeeController@create')->name('createEmployee');
