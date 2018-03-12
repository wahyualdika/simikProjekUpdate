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

//Route::get('/', function () {
//    return view('home');
//});

Route::resource('dosen','DataDosenController');
Route::resource('mahasiswa','DataMahasiswaController');
Route::resource('staff','DataStaffController');
Route::resource('publikasi','PublikasiController');
/*Route::get('/dataNim/{data}','HomeController@getData');*/
Route::post('/dataNim','HomeController@getData');

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
        Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login','Auth\AdminLoginController@login')->name('admin.submit.login');
        Route::post('/logout','Auth\AdminLoginController@adminlogout')->name('admin.logout');
        Route::get('/','AdminController@index')->name('admin.home');

        Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
});



Auth::routes();