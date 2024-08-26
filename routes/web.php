<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\settings\{instansiController, bidangInstansiController, kegiatanController, userController};

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // for super admin
    Route::prefix('settings')->group(function () {
        Route::resource('instansi', instansiController::class);
        Route::resource('bidang-instansi', bidangInstansiController::class);
        Route::resource('kegiatan', kegiatanController::class);

        Route::resource('users', userController::class);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
