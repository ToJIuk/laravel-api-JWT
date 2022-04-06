<?php

use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\RecordsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResources([
//    'records' => RecordsApiController::class,
//]);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthApiController::class, 'register']);
    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::post('refresh', [AuthApiController::class, 'refresh']);
    Route::post('me', [AuthApiController::class, 'me']);
});

Route::middleware('jwt.auth')->apiResource(
    'records', RecordsApiController::class
);
