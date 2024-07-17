<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul_buku',
        'nama_penulis',
        'nama_penerbit',
        'tahun_terbit',
        'kategori',
        'jumlah',
    ];

    /**
     * Get the peminjamans for the Buku.
     */
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku', 'id');
    }

    /**
     * Get the laporans for the Buku.
     */
    public function laporan()
    {
        return $this->hasManyThrough(
            Laporan::class,
            Peminjaman::class,
            'id_buku', // Foreign key on Peminjaman table
            'peminjaman_id', // Foreign key on Laporan table
            'id', // Local key on Buku table
            'id' // Local key on Peminjaman table
        );
    }
}

