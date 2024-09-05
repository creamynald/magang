<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboardController;

use App\Http\Controllers\backend\magang\rincianKegiatanController;
use App\Http\Controllers\backend\magang\dataKegiatanController as dataKegiatanMagangController;

use App\Http\Controllers\backend\settings\{instansiController, bidangInstansiController, kegiatanController, userController};
use App\Http\Controllers\backend\settings\dataKegiatanController as dataKegiatanController;
use App\Models\rincianKegiatan;
=======
use App\Http\Controllers\PostController;
use App\Http\Controllers\backend\settings\instansiController;
>>>>>>> 9169589 (add: module post)

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');

<<<<<<< HEAD
    Route::prefix('magang')->group(function () {
        Route::resource('data-kegiatan', dataKegiatanMagangController::class);
        Route::resource('rincian-kegiatan', rincianKegiatanController::class);
    });
=======
//route resource
Route::resource('/posts', PostController::class);


>>>>>>> 9169589 (add: module post)
    // for super admin
    Route::prefix('settings')->group(function () {
        Route::resource('instansi', instansiController::class);
        Route::resource('bidang-instansi', bidangInstansiController::class);
        Route::resource('kegiatan', kegiatanController::class);
        Route::resource('data-kegiatan-magang', dataKegiatanController::class);

        Route::resource('users', userController::class);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
