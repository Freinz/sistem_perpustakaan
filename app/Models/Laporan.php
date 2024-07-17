<?php
// app/Models/Laporan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'anggota_id',
        'buku_id',
        'id_peminjaman',
        'id_pengembalian',
        // Tambahkan kolom-kolom lain yang diperlukan
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class, 'id_pemgembalian');
    }
}
