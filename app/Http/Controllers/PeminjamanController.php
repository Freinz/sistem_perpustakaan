<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('peminjaman.index', compact('buku'));
    }

    /**
     * Pinjam buku.
     */
    public function pinjam_buku($id)
    {
        // Ambil data buku berdasarkan ID
        $buku = Buku::find($id);

        // Pastikan ada cukup buku yang tersedia untuk dipinjam
        if ($buku->jumlah > 0) {

            // Buat data peminjaman baru
            $peminjaman = new Peminjaman();
            $peminjaman->id_buku = $id;
            $peminjaman->user_id = Auth::id(); // Ambil ID user yang sedang login
            $peminjaman->status = 'Menunggu Validasi'; // Misalnya awalnya status menunggu validasi
            $peminjaman->jatuh_tempo = Carbon::now()->addDays(7); // Tambahkan 7 hari dari sekarang

            // Simpan data peminjaman
            $peminjaman->save();

            // Kurangi jumlah buku yang tersedia
            $buku->jumlah--;

            // Update jumlah buku
            $buku->save();

            return redirect()->back()->with('success', 'Permohonan peminjaman berhasil dikirimkan.');
        } else {
            return redirect()->back()->with('error', 'Maaf, buku yang Anda pilih tidak tersedia saat ini.');
        }
    }

    public function bukuDipinjam()
    {
        // Ambil peminjaman yang sudah divalidasi dan dimiliki oleh anggota yang sedang login
        $peminjaman = Peminjaman::where('status', 'Dipinjam')
                                ->where('user_id', auth()->user()->id)
                                ->with('buku')
                                ->get();

        return view('anggota.buku_dipinjam', compact('peminjaman'));
    }
}
