<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/lihat_pengirim', [AdminController::class,'lihat_pengirim']);
    Route::get('/hapus_pengirim/{id}', [AdminController::class,'hapus_pengirim'])->name('hapus_pengirim');
    Route::put('/update_status/{id}', [AdminController::class,'update_status']);
    
    Route::get('/lihat_pegawai', [AdminController::class,'lihat_pegawai']);
    Route::get('/input_pegawai', [AdminController::class,'input_pegawai']);
    Route::post('/store_pegawai', [AdminController::class,'store_pegawai']);
    
    Route::get('/dashboard/user', [PegawaiController::class,'index'])->name('pegawai.index');
    Route::get('/hapus_pegawai/{id}', [PegawaiController::class,'destroy']);
    Route::get('/penjadwalan', [PegawaiController::class,'penjadwalan']);
    Route::get('/lengkapi_data', [PegawaiController::class,'lengkapi_data']);
    Route::get('/edit_data/{pegawai_id}', [PegawaiController::class,'edit_data']);
    Route::post('/kirim_edit_data/{id}', [PegawaiController::class,'kirim_edit_data']);

    Route::post('/penjadwalan/store', [AgendaController::class,'store']);
    Route::put('/penjadwalan/update', [AgendaController::class,'update']);
    Route::delete('/penjadwalan/delete/{id}', [AgendaController::class, 'destroy'])->name('penjadwalan.destroy');

    Route::get('events', [AgendaController::class,'getEvents']);
    
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
