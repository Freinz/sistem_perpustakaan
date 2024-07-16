<?php

namespace App\Http\Controllers;


use App\Models\Agenda;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function dashboard()
    {

        $usertype = Auth::user()->usertype;

        if ($usertype == 'admin') {
            return redirect()->route('admin.index');
        } else if ($usertype == 'user') {
            return redirect()->route('pegawai.index');
        } else {
            return redirect()->back();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function lihat_pengirim()
    {

        $agenda = Agenda::all();

        return view('admin.lihat_pengirim', compact('agenda'));
    }

    public function hapus_pengirim($id)
    {
        $event = Agenda::find($id);

        $event->delete();

        // Tampilkan alert menggunakan SweetAlert
        Alert::success('Sukses', 'Event berhasil dihapus');

        return redirect()->back();
    }


    public function update_status(Request $request, $id)
    {
        // Cari agenda berdasarkan id
        $agenda = Agenda::findOrFail($id);

        // Update status
        $agenda->status = $request->input('status');
        $agenda->save();

        // Berikan notifikasi sukses
        Alert::success('Sukses', 'Status Telah Diperbarui');

        return redirect()->back();
    }


    public function lihat_pegawai()
    {
        $data = Pegawai::all();

        return view('admin.lihat_pegawai', compact('data'));
    }

    public function index()
    {
        return view('admin.index');
    }

    public function input_pegawai()
    {

        return view('admin.input_pegawai');
    }

    public function store_pegawai(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
        ]);
    
        // Menambah pegawai baru
        $pegawai = Pegawai::create([
            'email' => $request->email,
            'nama_pegawai' => $request->nama_pegawai,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
        ]);
    
        // Membuat pengguna baru terkait dengan detail pegawai yang baru dibuat
        $user = User::create([
            'email' => $pegawai->email,
            'password' => bcrypt('12345678'),
            'usertype' => 'user', // Menetapkan usertype secara otomatis
        ]);
    
        // Menghubungkan user dengan pegawai yang baru dibuat
        $user->pegawai()->associate($pegawai);
        $user->save();
    
        // Menampilkan notifikasi sukses
        Alert::success('Sukses', 'Akun berhasil dibuat');
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
