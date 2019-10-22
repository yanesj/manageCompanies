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
//Companies
Route::get('/companies', 'HomeController@index')->name('companies');
Route::post('/createCompany','HomeController@create')->name('createCompany');
Route::get('/editCompany/{id}','HomeController@edit')->name('editCompany');
Route::put('/updateCompany/{id}','HomeController@update')->name('updateCompany');
Route::delete('deleteCompany/{id}','HomeController@delete')->name('deleteCompany');
//Employees
Route::get('/employees','EmployeeController@index')->name('employees');
Route::post('/createEmployee','EmployeeController@create')->name('createEmployee');
Route::get('/editEmployee/{id}','EmployeeController@edit')->name('editEmployee');
Route::put('/updateEmployee/{id}','EmployeeController@update')->name('updateEmployee');
Route::delete('deleteEmployee/{id}','EmployeeController@delete')->name('deleteEmployee');