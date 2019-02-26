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

Route::prefix('/v1')->group(function () {
    Route::get('/', function () { return ['rev' => '1.0']; });
    Route::post('/auth', 'Api\AuthController@auth');
    Route::post('/reg', 'Api\RegisterController@register');
});