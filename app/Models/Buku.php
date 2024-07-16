<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judul_buku',
        'nama_penulis',
        'nama_penerbit',
        'tahun_terbit',
        'kategori',
    ];
}
