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

Route::group(['middleware' => ['cek_login']], function () {
    // Dashboard
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    
    // Master User
    Route::get('users','MasterUserController@index')->name('master_users');
    Route::post('add-users','MasterUserController@add_user')->name('add_user');
    Route::get('get-users','MasterUserController@get_user')->name('get_user');
    Route::post('update-users','MasterUserController@update_user')->name('update_user');
    Route::get('delete-users','MasterUserController@delete_user')->name('delete_user');
    
    //Karyawan 
    Route::get('karyawan','KaryawanController@index')->name('karyawan');
    Route::post('add-karyawan','KaryawanController@add_karyawan')->name('add_karyawan');
    Route::get('view-ktp-load','KaryawanController@view_ktp_load')->name('view_ktp_load');
    Route::get('view-npwp-load','KaryawanController@view_npwp_load')->name('view_npwp_load');
    Route::get('delete-karyawan','KaryawanController@delete_karyawan')->name('delete_karyawan');
    Route::get('get-karyawan','KaryawanController@get_karyawan')->name('get_karyawan');
    Route::post('update-karyawan','KaryawanController@update_karyawan')->name('update_karyawan');
    Route::get('get-direktur','KaryawanController@get_direktur')->name('get_direktur');
    Route::post('save-direktur','KaryawanController@save_direktur')->name('save_direktur');
    Route::get('reset-direktur','KaryawanController@reset_direktur')->name('reset_direktur');
    Route::get('get-hrd','KaryawanController@get_hrd')->name('get_hrd');
    Route::post('save-hrd','KaryawanController@save_hrd')->name('save_hrd');
    Route::get('reset-hrd','KaryawanController@reset_hrd')->name('reset_hrd');
    Route::get('view-dt-karyawan','KaryawanController@view_dt_karyawan')->name('view_dt_karyawan');
    Route::get('view-gambar-load','KaryawanController@view_gambar_load')->name('view_gambar_load');
    
    // Cetak Perjanjian
    Route::get('cetak','CetakController@index')->name('v_cetak');
    Route::get('cetak-pdf','CetakController@cetak_pdf')->name('cetak_pdf');
});