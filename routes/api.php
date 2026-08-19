<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

Route::post('/login', [LoginController::class, 'store']);

Route::middleware('auth:api')->group(function () {
 Route::apiResource('users', UserController::class);
Route::post('/users', [UserController::class, 'store']);

});

