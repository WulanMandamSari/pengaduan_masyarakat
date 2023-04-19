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
    return view('welcome');
}); 

// Halaman Beranda Dashboard //
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/beranda', 'BerandaController@index')->name('beranda');


// Form Pengaduan //
Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan')->middleware('auth');
Route::get('/pengaduan_riwayat', 'PengaduanController@index_riwayat')->name('pengaduan_riwayat')->middleware('auth');
Route::get('/pengaduan/create', 'PengaduanController@create')->name('create')->middleware('auth');
Route::post('/pengaduan/store', 'PengaduanController@store')->middleware('auth');
Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit')->middleware('auth'); 
Route::put('/pengaduan/update/{id}', 'PengaduanController@update')->middleware('auth');
Route::get('/pengaduan/destroy/{id_pengaduan}', 'PengaduanController@destroy')->middleware('auth'); 
Route::get('/pengaduan/show/{id_pengaduan}', 'PengaduanController@show')->middleware('auth');
Route::get('/pengaduan/status/{id}', 'PengaduanController@status')->middleware('auth');
Route::get('cetak-pengaduan', 'PengaduanController@cetakpengaduan')->name('cetak-pengaduan')->middleware('auth');

// Form Tanggapan //
Route::get('/tanggapan', 'TanggapanController@index')->name('tanggapan')->middleware('auth');
Route::get('/tanggapan/create', 'TanggapanController@create')->middleware('auth');
Route::post('/tanggapan/store', 'TanggapanController@store')->middleware('auth');
Route::get('/tanggapan/edit/{id}', 'TanggapanController@edit')->middleware('auth'); 
Route::put('/tanggapan/update/{id}', 'TanggapanController@update')->middleware('auth');
Route::get('/tanggapan/destroy/{id_tanggapan}', 'TanggapanController@destroy')->middleware('auth');
Route::get('/tanggapan/show/{id_tanggapan}', 'TanggapanController@show')->middleware('auth');

// Profile //
Route::get('user_profile', 'UserprofileController@index')->name('user_profile')->middleware('auth');
// Route::get('/user_profile/edit/{id}','UserprofileController@edit');
Route::post('/user/store', 'UserprofileController@store')->middleware('auth');
Route::put('user_profile/{id}','UserprofileController@update')->middleware('auth');
// Route::put('user_profile/{id}','UserprofileController@update_masyarakat')->name('user_profile.update_masyarakat')->middleware('auth');
Route::post('getKota', 'UserprofileController@getKota')->name('getKota');//getkota
Route::post('getKecamatan', 'UserprofileController@getKecamatan')->name('getKecamatan');//getkemacatan
Route::post('getKelurahan', 'UserprofileController@getKelurahan')->name('getKelurahan');//getkelurahan
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Hak Akses //
Route::group(['middleware' => ['auth', 'role:masyarakat']], function () {
    Route::get('/pengaduan/create', 'PengaduanController@create')->name('create')->middleware('auth');
    Route::post('/pengaduan/store', 'PengaduanController@store')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'role:admin', 'role:petugas']], function () {
//     Route::get('/beranda', 'BerandaController@index')->name('beranda')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'role:petugas']], function () {
//     Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit')->middleware('auth'); 
//     Route::put('/tanggapan/update/{id}', 'TanggapanController@update')->middleware('auth');
//     Route::get('/tanggapan/destroy/{id_tanggapan}', 'TanggapanController@destroy')->middleware('auth');
//     Route::get('/tanggapan/show/{id_tanggapan}', 'TanggapanController@show')->middleware('auth');

//     Route::get('/tanggapan', 'TanggapanController@index')->name('tanggapan')->middleware('auth');
//     Route::get('/tanggapan/edit/{id}', 'TanggapanController@edit')->middleware('auth'); 
//     Route::put('/tanggapan/update/{id}', 'TanggapanController@update')->middleware('auth');
//     Route::get('/tanggapan/destroy/{id_tanggapan}', 'TanggapanController@destroy')->middleware('auth');
});

// Edit Profile User //
// Route::get('edit_profile', 'EditprofileController@index')->name('edit_profile');

// Reset Password //
Route::get('password/reset','UserprofileController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'UserprofileController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'UserprofileController@showResetForm')->name('password.reset');
Route::post('password/reset', 'UserprofileController@reset')->name('password.update');

// History // 
Route::get('/history', 'MasyarakatController@historyPengaduan')->name('history'); 
Route::get('/history/show/{id_tanggapan}', 'MasyarakatController@detailHistory')->middleware('auth');

// Admin Role //
Route::get('/user', 'AdminController@index')->name('userEdit')->middleware('auth');
Route::get('/user/edit/{id}', 'AdminController@edit')->middleware('auth');
Route::put('/user/update/{id}', 'AdminController@update')->middleware('auth');
Route::get('/user/destroy/{id}', 'AdminController@destroy')->middleware('auth');
Route::get('/user/create', 'AdminController@create')->name('create')->middleware('auth');
Route::post('/user/store', 'AdminController@store')->middleware('auth');