<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// API Login & Register Route
Route::post('login', 'AuthnewController@login')->name('api-login');
Route::post('register', 'AuthnewController@register')->name('api-register');
Route::post('logout', 'AuthnewController@logout');

Route::middleware('auth:api')->group(function () {
    Route::post('refresh', 'AuthnewController@refresh');
    Route::post('me', 'AuthnewController@me');
});

/** Admin */
Route::group(['middleware' => ['auth:api','admin']], function () {
    /** Dashboard*/
    /** Admin Folder Access */
    Route::namespace('Admin')->group(function () {

    });
});
/** User */
Route::group(['middleware' => ['auth:api']], function () {
     /** Dashboard*/
    /** User Folder Access */
    Route::namespace('User')->group(function () {

    });
});
