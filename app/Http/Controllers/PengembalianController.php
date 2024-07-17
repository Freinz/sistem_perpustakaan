<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function daftar_pengembalian()
    {
        // Ambil semua data pengembalian beserta relasi buku dan user yang masih dipinjam
        $pengembalian = Peminjaman::with('buku', 'user')
            ->where('status', 'Dipinjam')
            ->get();
        
        return view('admin.daftar_pengembalian', compact('pengembalian'));
    }

    public function selesai_peminjaman($id)
    {
        // Temukan data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);
    
        // Ubah status peminjaman menjadi 'Selesai'
        $peminjaman->status = 'Selesai';
        $peminjaman->save();
    
        // Tambahkan jumlah buku yang tersedia kembali
        $buku = Buku::findOrFail($peminjaman->id_buku);
        $buku->jumlah += 1;
        $buku->save();
    
        // Redirect kembali ke halaman daftar pengembalian dengan pesan sukses
        return redirect()->route('daftar_pengembalian')->with('success', 'Pengembalian buku berhasil diselesaikan.');
    }

    public function tambah_jatuh_tempo($id)
    {
        // Temukan data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);
    
        // Tambah jatuh tempo 1 minggu
        $peminjaman->jatuh_tempo = Carbon::parse($peminjaman->jatuh_tempo)->addWeek();
        $peminjaman->save();
    
        // Redirect kembali ke halaman daftar pengembalian dengan pesan sukses
        return redirect()->route('daftar_pengembalian')->with('success', 'Jatuh tempo berhasil diperpanjang 1 minggu.');
    }
}

