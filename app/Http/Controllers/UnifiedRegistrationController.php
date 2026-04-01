<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UnifiedRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255|unique:users,email',
            'password'        => 'required|string|min:8|confirmed',
            'nama_sekolah'    => 'required|string|max:255',
            'nama_organisasi' => 'required|string|max:255',
            'nomor_wa'        => 'required|string|max:20',
            'alamat'          => 'required|string',
        ]);

        // Create user with pendaftar role
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'pendaftar',
        ]);

        // Create organisasi record
        Organisasi::create([
            'user_id'          => $user->id,
            'nama_sekolah'     => $validated['nama_sekolah'],
            'nama_organisasi'  => $validated['nama_organisasi'],
            'nomor_wa'         => $validated['nomor_wa'],
            'alamat'           => $validated['alamat'],
        ]);

        Auth::login($user);

        // Redirect to success page with WhatsApp group link
        return view('registration-success', ['role' => 'organisasi']);
    }
}
