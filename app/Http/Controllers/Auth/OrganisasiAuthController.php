<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrganisasiAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.organisasi-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if user is organisasi
            if ($user->role !== 'organisasi') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => 'Akses ditolak. Anda tidak terdaftar sebagai organisasi.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('organisasi.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('organisasi.login');
    }
}