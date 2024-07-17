<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjaman extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'id_buku', 'user_id', 'status', 'jatuh_tempo'
    ];

    // Relasi dengan model Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan model Pengembalian
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_peminjaman');
    }

    // Relasi dengan model Laporan
    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'id_peminjaman');
    }

    // Cek apakah user memiliki peminjaman yang jatuh tempo
    public static function isUserBanned($userId)
    {
        return self::where('user_id', $userId)
                   ->where('status', 'Dipinjam')
                   ->where('jatuh_tempo', '<', Carbon::now())
                   ->exists();
    }
}
