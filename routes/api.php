<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
});


Route::middleware('auth:api')->group(function () {
    Route::get('/guest', [ClientController::class, 'getClient']);
    Route::get('/users/download', [UserController::class, 'getAllUsers']);
});
