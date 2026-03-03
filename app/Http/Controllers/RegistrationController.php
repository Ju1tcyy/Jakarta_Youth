<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'nama_organisasi' => 'required|string|max:255',
            'email_organisasi' => 'required|email|max:255',
        ]);

        Registration::create($validated);

        return redirect()->route('home')
            ->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
