<?php

namespace App\Http\Controllers;


use App\Models\Anggota;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function dashboard()
    {

        // Menghitung jumlah anggota
        $totalAnggota = Anggota::count();

        // Mengambil semua data anggota
        $anggota = Anggota::all();

        // Menghitung jumlah judul buku
        $totalBuku = Buku::count();

        // Mengambil semua data buku
        $buku = Buku::all();

        $usertype = Auth::user()->usertype;

        if ($usertype == 'admin') {
            return view('admin.index', compact('anggota', 'totalAnggota', 'buku', 'totalBuku'));
        } else if ($usertype == 'anggota') {
            return view('anggota.index', compact('anggota', 'totalAnggota', 'buku', 'totalBuku'));
        } else {
            return redirect()->back();
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function lihat_anggota()
    {
        $anggota = Anggota::all();

        return view('admin.lihat_anggota', compact('anggota'));
    }

    public function tambah_anggota()
    {

        return view('admin.tambah_anggota');
    }

    public function kirim_anggota(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email|max:255|unique:anggotas,email',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'no_hp' => 'nullable|string|max:20', // Sesuaikan dengan tipe data yang dipilih di migration
        ]);

        // Menambah anggota baru
        $anggota = Anggota::create([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap, // Sesuaikan dengan nama kolom di tabel
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
        ]);

        $user = User::create([
            'email' => $anggota->email,
            'password' => bcrypt('12345678'),
            'usertype' => 'anggota', // Menetapkan usertype secara otomatis
        ]);

        // Menghubungkan user dengan pegawai yang baru dibuat
        $user->anggota()->associate($anggota);
        $user->save();

        // Menampilkan notifikasi sukses
        Alert::success('Sukses', 'Anggota berhasil ditambahkan');
        return redirect()->back();
    }

    public function anggota_read($id)
    {
        $anggota = Anggota::find($id);


        return view('admin.update_anggota', compact('anggota'));
    }

    public function anggota_edit(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'no_hp' => 'nullable|string|max:20',
        ]);

        // Ambil data anggota berdasarkan ID
        $anggota = Anggota::findOrFail($id);

        // Update data anggota
        $anggota->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
        ]);

        // Tampilkan notifikasi sukses
        Alert::success('Sukses', 'Anggota berhasil diperbarui');

        // Redirect ke halaman tertentu setelah berhasil memperbarui
        return redirect('/lihat_anggota');
    }

    public function anggota_hapus($id)
    {

        $anggota = Anggota::find($id); // User dari nama models

        $anggota->delete();

        Alert::success('Sukses', 'Anggota Berhasil Dihapus');

        return redirect()->back();
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
