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
//    return view('welcome');
//});

Route::get('/', function () {
    if (Auth::check() && Auth::user()->user_type == 'A') {
        return redirect(route('admin.home'));
    } else {
        return redirect(route('home'));
    }
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('/home', 'HomeController@home')->name('home')->middleware('is_user');

Route::group(['middleware' => ['web']], function () {
    Auth::routes();
    Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor');
    Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor');
    Route::get('/2fa/validate', 'Auth\LoginController@getValidateToken');
    Route::get('/2fa/forget2FA', 'Auth\LoginController@validateotp');
    Route::post('/2fa/validate', ['uses' => 'Auth\LoginController@postValidateToken']);
    Route::post('/2fa/validateotp', ['uses' => 'Auth\LoginController@postValidateOtpToken']);
});