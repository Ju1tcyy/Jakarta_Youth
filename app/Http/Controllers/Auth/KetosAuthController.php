<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class KetosAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.ketos-login');
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
            
            // Check if user is ketos
            if ($user->role !== 'ketos') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => 'Akses ditolak. Anda tidak terdaftar sebagai ketos.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('ketos.dashboard'));
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
        
        return redirect()->route('ketos.login');
    }
}