<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data_diri()
    {
        $anggota = auth()->user()->anggota;


        return view('anggota.data_diri', compact('anggota'));
    }
    
    public function edit_data($anggota_id)
    {
        // Ambil data anggota berdasarkan anggota_id
        $anggota = Anggota::findOrFail($anggota_id);

        // Tampilkan view edit_data.blade.php dengan data anggota
        return view('anggota.edit_data', compact('anggota'));
    }

    public function kirim_edit_data(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
        ]);
    
        // Find the member by ID
        $anggota = Anggota::findOrFail($id);
    
        // Update the member details
        $anggota->update($request->only('nama_lengkap', 'alamat', 'tanggal_lahir', 'no_hp'));
    
        // Set a success message
        Alert::success('Sukses', 'Profil berhasil diperbarui');
    
        // Redirect back
        return redirect()->back();
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
