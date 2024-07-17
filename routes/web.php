<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/lihat_anggota', [AdminController::class, 'lihat_anggota']);
    Route::get('/tambah_anggota', [AdminController::class, 'tambah_anggota']);
    Route::post('/kirim_anggota', [AdminController::class, 'kirim_anggota']);
    Route::get('/anggota_read/{id}', [AdminController::class, 'anggota_read']);
    Route::post('/anggota_edit/{id}', [AdminController::class, 'anggota_edit']);
    Route::get('/anggota_hapus/{id}', [AdminController::class, 'anggota_hapus']);

    Route::get('/daftar_peminjaman', [AdminController::class, 'daftar_peminjaman']);
    Route::get('/validasi_pinjam/{id}', [AdminController::class, 'validasi_peminjaman'])->name('validasi_peminjaman');
    Route::get('/tolak_pinjam/{id}', [AdminController::class, 'tolak_peminjaman'])->name('tolak_peminjaman');


    Route::get('/lihat_buku', [BukuController::class, 'index']);
    Route::get('/tambah_buku', [BukuController::class, 'create']);
    Route::post('/kirim_buku', [BukuController::class, 'store']);
    Route::get('/edit_buku/{id}', [BukuController::class, 'edit']);
    Route::put('update_buku/{id}', [BukuController::class, 'update'])->name('update_buku');
    Route::get('/buku_hapus/{id}', [BukuController::class, 'destroy']);

    Route::get('/lihat_buku_anggota', [BukuController::class, 'lihat_buku_anggota']);

    Route::get('/data_peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/pinjam_buku/{id}', [PeminjamanController::class, 'pinjam_buku'])->name('pinjam_buku');
    Route::get('/bukuDipinjam', [PeminjamanController::class, 'bukuDipinjam'])->name('pinjam_buku');


    Route::get('/daftar_pengembalian', [PengembalianController::class, 'daftar_pengembalian']);
    Route::get('/selesai_pinjam/{id}', [PengembalianController::class, 'selesai_peminjaman'])->name('selesai_peminjaman');
    Route::get('/tambah_jatuh_tempo/{id}', [PengembalianController::class, 'tambah_jatuh_tempo'])->name('tambah_jatuh_tempo');


    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
