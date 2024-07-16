<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Pegawai extends Model
    {
        use HasFactory;

        protected $fillable = [
            'nip',
            'email',
            'nama_pegawai',
            'jabatan',
        ];

        // Relasi dengan user
        public function user()
        {
            return $this->hasOne(User::class);
        }
    }
