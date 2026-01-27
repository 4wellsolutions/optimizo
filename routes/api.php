<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;

Route::apiResource('blogs', BlogController::class);
Route::post('/media', [App\Http\Controllers\Api\MediaController::class, 'upload']);
