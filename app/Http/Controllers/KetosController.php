<?php

namespace App\Http\Controllers;

use App\Models\Ketos;
use Illuminate\Http\Request;

class KetosController extends Controller
{
    public function create()
    {
        return view('ketos.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nomor_wa' => 'required|string|max:20',
        ]);

        Ketos::create($validated);

        return redirect()->route('home')
            ->with('success', 'Pendaftaran ketos berhasil disimpan!');
    }
}
