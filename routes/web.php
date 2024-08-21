<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [dashboardController::class, 'index']);
});