<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('blogs', BlogController::class);
    Route::post('/media', [MediaController::class, 'upload']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
