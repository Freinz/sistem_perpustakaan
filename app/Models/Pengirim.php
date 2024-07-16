<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kegiatan',
        'tanggal_pelaksanaan',        
        'status',        
    ];
}
