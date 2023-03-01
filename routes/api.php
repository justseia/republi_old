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
    Route::post('/email/send', \App\Http\Controllers\API\v1\Auth\SendCodeMailController::class);
    Route::post('/email/verify', \App\Http\Controllers\API\v1\Auth\VerifyMailController::class);
    Route::post('/register', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'refresh']);
    Route::post('/me', [\App\Http\Controllers\API\v1\Auth\AuthController::class, 'me']);
});

//Route::group(['middleware' => 'jwt.auth'], function () {
Route::get('/posts', \App\Http\Controllers\API\v1\Post\IndexController::class);
Route::get('/posts/{post}', \App\Http\Controllers\API\v1\Post\ShowController::class);
Route::post('/posts', \App\Http\Controllers\API\v1\Post\StoreController::class);
Route::post('/posts/{post}/comment', \App\Http\Controllers\API\v1\Comment\StoreController::class);
Route::post('/posts/{post}/comment/{comment}', \App\Http\Controllers\API\v1\Comment\ReplyController::class);
Route::patch('/posts/{post}/comment/{comment}/like', \App\Http\Controllers\API\v1\Comment\LikeController::class);
Route::patch('/posts/{post}/comment/{comment}/unlike', \App\Http\Controllers\API\v1\Comment\UnlikeController::class);

Route::get('/vacancies', \App\Http\Controllers\API\v1\Vacancy\IndexController::class);
Route::get('/vacancies/{vacancy}', \App\Http\Controllers\API\v1\Vacancy\ShowController::class);
Route::post('/vacancy', \App\Http\Controllers\API\v1\Vacancy\StoreController::class);
//});
