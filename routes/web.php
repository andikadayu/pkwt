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
// Login
Route::get('login','LoginController@index')->name('login');
Route::post('post-login','LoginController@post_login')->name('post_login');
Route::get('logout','LoginController@logout')->name('logout');

// Dashboard
Route::get('dashboard','DashboardController@index')->name('dashboard');


// Master User
Route::get('users','MasterUserController@index')->name('master_users');
Route::post('add-users','MasterUserController@add_user')->name('add_user');
Route::get('get-users','MasterUserController@get_user')->name('get_user');
Route::post('update-users','MasterUserController@update_user')->name('update_user');
Route::get('delete-users','MasterUserController@delete_user')->name('delete_user');