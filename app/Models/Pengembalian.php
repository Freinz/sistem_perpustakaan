<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';

    protected $fillable = [
        'id_peminjaman', 'tanggal_pengembalian'
    ];

    // Relasi dengan model Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    // Relasi dengan model Laporan
    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'id_pengembalian');
    }
}
