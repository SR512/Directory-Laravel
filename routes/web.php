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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:web'],function(){
    Route::resource('User', 'Admin\User_CT');
    Route::resource('Profile', 'Admin\User_Profile_CT');
    Route::resource('Advertisement', 'Admin\User_Add_CT');

});

