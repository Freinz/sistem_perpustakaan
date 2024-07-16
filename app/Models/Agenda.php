<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',
        'start_date',
        'end_date',
        'tempat_kegiatan',
        'pelaksana_kegiatan',
        'kelengkapan_kegiatan',
        'berkas_kegiatan',
        'catatan',
        'status',
        'user_id',
      
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
