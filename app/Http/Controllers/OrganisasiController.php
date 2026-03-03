<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function create()
    {
        return view('organisasi.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'nama_organisasi' => 'required|string|max:255',
            'email_organisasi' => 'required|email|max:255',
            'nomor_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        Organisasi::create($validated);

        return redirect()->route('home')
            ->with('success', 'Pendaftaran organisasi berhasil disimpan!');
    }
}
