<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index');
    }

    public function penjadwalan()
    {

        return view('pegawai.penjadwalan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Pegawai::all();

        return view('pegawai.input_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function lengkapi_data()
    {
        $pegawai_data = auth()->user()->pegawai;


        return view('pegawai.lengkapi_data', compact('pegawai_data'));
    }

    public function edit_data($pegawai_id)
    {
        // Ambil data pegawai berdasarkan pegawai_id
        $pegawai_data = Pegawai::findOrFail($pegawai_id);

        // Tampilkan view edit_data.blade.php dengan data pegawai
        return view('pegawai.edit_data', compact('pegawai_data'));
    }

    public function kirim_edit_data(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
        ]);

        $pegawai_data = Pegawai::findOrFail($id);

        // Update user details
        $pegawai_data->update($request->all());

        Alert::success('Sukses', 'Profil berhasil diperbarui');
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
    public function destroy($id)
    {
        $data = Pegawai::find($id);

        $data->delete();

        return redirect()->back();
    }
}
