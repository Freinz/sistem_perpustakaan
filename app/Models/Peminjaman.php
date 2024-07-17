<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'user_id',
        'status',
        'jatuh_tempo', // Jika akan ditambahkan di masa depan
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class, 'id_pengembalian');
    }
}
