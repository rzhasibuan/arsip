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

Route::get('/', function () {
    return redirect('login');
});


Auth::routes();

Route::get('/register', function() {
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/covid19','CertaintyFactorController@proses');

Route::name('admin.') //pemberian nama seperti admin.user.index
->prefix('admin')
->namespace('Admin')
->middleware(['auth','role:superadmin'])
->group(function() {
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
    Route::resource('permission','PermissionController');
    Route::resource('gejala','GejalaController');
    Route::resource('pasien','PasienController');
});

Route::get('/diagnosa','DiagnosaController@index')->name('diagnosa.index');
Route::post('/diagnosa','DiagnosaController@store')->name('diagnosa.store');
