<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\instansiController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [dashboardController::class, 'index']);

    // for super admin
    Route::prefix('settings')->group(function () {
        Route::resource('instansi', instansiController::class);
    });
});