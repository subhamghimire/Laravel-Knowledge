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

Route::group(['namespace'=> 'Api', 'middleware'=>['admin','auth:sanctum']], function (){
    Route::group(['prefix' => 'admin'], function () {
        Route::post('invite', 'AdminController@invite');
    });
});

Route::group(['namespace'=> 'Api', 'middleware'=>['auth:sanctum']], function (){
    Route::group(['prefix' => 'user'], function () {
        Route::post('create', 'UserController@store');
    });
});
