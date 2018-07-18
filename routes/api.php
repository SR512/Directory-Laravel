<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
Route::group(['prefix' => 'auth'], function () {
    Route::post('UserCheck', 'API\UserController@userCheck');
    Route::post('UserRegister', 'API\UserController@userRegister');
    Route::post('NewRegister', 'API\UserController@newRegister');
    Route::post('Login', 'API\UserController@login');
    Route::post('ChangeInfo', 'API\UserController@login');
    Route::post('Profile', 'API\UserController@profile');
    Route::get('Advertisement', 'API\UserController@getAdd');
    Route::get('EVENT', 'API\UserController@getEvent');
    Route::get('Article', 'API\UserController@getArticle');

});