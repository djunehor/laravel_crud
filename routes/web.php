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

Route::post('/company/add', 'CompanyController@store')->name('company_add');

Route::post('/employee/add', 'EmployeeController@store')->name('employee_add');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company', 'CompanyController@index')->name('company');

Route::get('/company/edit/{id}', 'CompanyController@edit')->name('edit');

Route::delete('/company/delete/{id}', 'CompanyController@destroy')->name('delete');

Route::put('/company/update/{id}', 'CompanyController@update')->name('update');


Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('edit');

Route::delete('/employee/delete/{id}', 'EmployeeController@destroy')->name('destroy');

Route::put('/employee/update/{id}', 'EmployeeController@update')->name('update');
