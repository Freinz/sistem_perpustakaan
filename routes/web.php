<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
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
    Route::get('/anggota_hapus/{id}', [AdminController::class,'anggota_hapus']);
    
    Route::get('/lihat_buku', [BukuController::class,'index']);
    Route::get('/tambah_buku', [BukuController::class,'create']);
    Route::post('/kirim_buku', [BukuController::class,'store']);
    Route::get('/edit_buku/{id}', [BukuController::class,'edit']);
    Route::put('update_buku/{id}', [BukuController::class, 'update'])->name('update_buku');
    Route::get('/buku_hapus/{id}', [BukuController::class,'destroy']);
    


    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
