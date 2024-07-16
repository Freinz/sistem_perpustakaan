<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/lihat_anggota', [AdminController::class,'lihat_anggota']);
    Route::get('/tambah_anggota', [AdminController::class,'tambah_anggota']);
    Route::post('/kirim_anggota', [AdminController::class,'kirim_anggota']);
    Route::get('/anggota_read/{id}', [AdminController::class,'anggota_read']);
    Route::post('/anggota_edit/{id}', [AdminController::class,'anggota_edit']);
    Route::post('/anggota_hapus/{id}', [AdminController::class,'anggota_hapus']);

    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
