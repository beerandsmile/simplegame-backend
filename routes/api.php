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

Route::prefix('/v1')->group(function() {
    Route::post('login', 'Api\AuthController@login');

    Route::middleware('token')->group(function() {
        Route::get('/games', 'Global\Api\GameController@list');

        Route::post('/games', 'Global\Api\GameController@create');

        Route::get('/games/{hash}', 'Global\Api\GameController@game');

        Route::post('/games/{hash}', 'Global\Api\GameController@move');

        Route::get('/users', 'Global\Api\UserController@list');
    });
});