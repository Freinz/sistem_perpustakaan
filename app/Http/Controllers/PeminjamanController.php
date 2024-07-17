<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
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

        // Cek apakah user memiliki pinjaman yang jatuh tempo
        if (Peminjaman::isUserBanned(Auth::id())) {
            return redirect()->back()->with('error', 'Anda tidak bisa meminjam buku baru karena memiliki peminjaman yang melewati jatuh tempo.');
        }

        // Pastikan ada cukup buku yang tersedia untuk dipinjam
        if ($buku && $buku->jumlah > 0) {

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
        $peminjaman = Peminjaman::where('status', 'Selesai Dipinjam')
            ->where('user_id', auth()->user()->id)
            ->with(['buku', 'user.anggota']) // Load relasi buku dan user.anggota
            ->get();

        return view('anggota.buku_dipinjam', compact('peminjaman'));
    }


    public function selesaiPeminjaman($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // Update status peminjaman menjadi 'Selesai Dipinjam'
    $peminjaman->status = 'Selesai Dipinjam';
    $peminjaman->save();

    // Simpan informasi pengembalian ke dalam tabel pengembalian
    $pengembalian = new Pengembalian();
    $pengembalian->id_peminjaman = $peminjaman->id;
    $pengembalian->tanggal_pengembalian = now(); // Misalnya menggunakan waktu sekarang
    $pengembalian->save();

    Alert::success('Sukses', 'Peminjaman telah ditandai sebagai selesai.');

    return redirect()->back();
}



    public function tambahJatuhTempo($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Tambah 7 hari ke tanggal jatuh tempo yang ada
        $peminjaman->jatuh_tempo = Carbon::parse($peminjaman->jatuh_tempo)->addDays(7);
        $peminjaman->save();

        Alert::success('Sukses', 'Tanggal jatuh tempo berhasil diperpanjang.');
        return redirect()->back();
    }
}
