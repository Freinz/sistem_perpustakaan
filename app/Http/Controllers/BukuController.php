<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();

        return view('buku.lihat_buku', compact('buku'));
    }
    
    public function lihat_buku_anggota()
    {
        $buku = Buku::all();

        return view('anggota.lihat_buku_anggota', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.tambah_buku');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'judul_buku' => 'required|string|max:255',
        'nama_penulis' => 'required|string|max:255',
        'nama_penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
        'jumlah' => 'required|integer',
        'kategori' => 'required|string|max:255',
    ]);

    // Menambah buku baru
    $buku = Buku::create([
        'judul_buku' => $request->judul_buku, // Sesuaikan dengan nama kolom di tabel
        'nama_penulis' => $request->nama_penulis,
        'nama_penerbit' => $request->nama_penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'jumlah' => $request->jumlah,
        'kategori' => $request->kategori,
    ]);

    // Menampilkan notifikasi sukses
    Alert::success('Sukses', 'Buku berhasil ditambahkan');
    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit_buku', compact('buku'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'judul_buku' => 'required|string|max:255',
        'nama_penulis' => 'required|string|max:255',
        'nama_penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
        'kategori' => 'required|string|max:255',
    ]);

    // Temukan buku berdasarkan id
    $buku = Buku::findOrFail($id);

    // Update data buku
    $buku->update([
        'judul_buku' => $request->judul_buku,
        'nama_penulis' => $request->nama_penulis,
        'nama_penerbit' => $request->nama_penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'kategori' => $request->kategori,
    ]);

    // Menampilkan notifikasi sukses
    Alert::success('Sukses', 'Buku berhasil diperbarui');
    return redirect()->back();
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $buku = Buku::find($id); // User dari nama models

        $buku->delete();

        Alert::success('Sukses', 'Buku Berhasil Dihapus');

        return redirect()->back();
    }
}


