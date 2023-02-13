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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/register', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'refresh']);
    Route::post('/me', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {

});
