<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'tanggal_lahir',
        'no_hp',
        'email',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Relasi dengan model Laporan
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'anggota_id');
    }
}
