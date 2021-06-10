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

Route::post('login', 'Auth\LoginController@login');
Route::post('confirm','Auth\RegisterController@confirm')->middleware('hasInvitation')->name('confirm');
Route::post('register','Auth\RegisterController@store')->middleware('hasCode');

Route::group(['namespace'=> 'Api', 'middleware'=>['admin','auth:sanctum']], function (){
    Route::group(['prefix' => 'admin'], function () {
        Route::post('invite', 'AdminController@invite');
    });
});

Route::group(['namespace'=> 'Api', 'middleware'=>['auth:sanctum']], function (){
    Route::group(['prefix' => 'user'], function () {
        Route::post('update', 'UserController@update');
    });
});
