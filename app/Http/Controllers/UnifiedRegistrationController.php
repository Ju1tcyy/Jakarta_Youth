<?php

namespace App\Http\Controllers;

use App\Models\Ketos;
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
        $role = $request->input('role');

        if ($role === 'ketos') {
            $validated = $request->validate([
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|max:255|unique:users,email',
                'password'      => 'required|string|min:8|confirmed',
                'asal_sekolah'  => 'required|string|max:255',
                'tempat_lahir'  => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'nomor_wa'      => 'required|string|max:20',
            ]);

            // 1. Save to unified users table
            $user = User::create([
                'name'          => $validated['name'],
                'email'         => $validated['email'],
                'password'      => Hash::make($validated['password']),
                'role'          => 'ketos',
                'asal_sekolah'  => $validated['asal_sekolah'],
                'tempat_lahir'  => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'nomor_wa'      => $validated['nomor_wa'],
            ]);

            // 2. Also write to the legacy ketos table
            Ketos::create([
                'user_id'       => $user->id,
                'nama'          => $validated['name'],
                'email'         => $validated['email'],
                'password'      => Hash::make($validated['password']),
                'asal_sekolah'  => $validated['asal_sekolah'],
                'tempat_lahir'  => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'nomor_wa'      => $validated['nomor_wa'],
            ]);

        } elseif ($role === 'organisasi') {
            $validated = $request->validate([
                'asal_sekolah'    => 'required|string|max:255',
                'nama_organisasi' => 'required|string|max:255',
                'email'           => 'required|email|max:255|unique:users,email',
                'password'        => 'required|string|min:8|confirmed',
                'nomor_wa'        => 'required|string|max:20',
                'alamat'          => 'required|string',
            ]);

            // 1. Save to unified users table
            $user = User::create([
                'name'            => $validated['nama_organisasi'],
                'email'           => $validated['email'],
                'password'        => Hash::make($validated['password']),
                'role'            => 'organisasi',
                'asal_sekolah'    => $validated['asal_sekolah'],
                'nama_organisasi' => $validated['nama_organisasi'],
                'nomor_wa'        => $validated['nomor_wa'],
                'alamat'          => $validated['alamat'],
            ]);

            // 2. Also write to the legacy organisasis table
            Organisasi::create([
                'user_id'          => $user->id,
                'nama_sekolah'     => $validated['asal_sekolah'],
                'nama_organisasi'  => $validated['nama_organisasi'],
                'email_organisasi' => $validated['email'],
                'password'         => Hash::make($validated['password']),
                'nomor_wa'         => $validated['nomor_wa'],
                'alamat'           => $validated['alamat'],
            ]);

        } else {
            return back()->withErrors(['role' => 'Silakan pilih kategori pendaftaran.']);
        }

        Auth::login($user);

        if ($user->role === 'ketos') {
            return redirect()->route('ketos.dashboard');
        } elseif ($user->role === 'organisasi') {
            return redirect()->route('organisasi.dashboard');
        }

        return redirect()->route('login')
            ->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
