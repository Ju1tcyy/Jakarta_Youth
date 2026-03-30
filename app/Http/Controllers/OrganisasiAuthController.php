<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrganisasiAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('organisasi.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email_organisasi' => 'required|email',
            'password' => 'required',
        ]);

        $organisasi = Organisasi::where('email_organisasi', $credentials['email_organisasi'])->first();

        if ($organisasi && Hash::check($credentials['password'], $organisasi->password)) {
            session(['organisasi_id' => $organisasi->id]);
            return redirect()->route('organisasi.dashboard');
        }

        return back()->withErrors([
            'email_organisasi' => 'Email atau password salah.',
        ]);
    }

    public function dashboard()
    {
        $organisasiId = session('organisasi_id');
        if (!$organisasiId) {
            return redirect()->route('organisasi.login');
        }

        $organisasi = Organisasi::findOrFail($organisasiId);
        return view('organisasi.dashboard', compact('organisasi'));
    }

    public function uploadDocuments(Request $request)
    {
        $organisasiId = session('organisasi_id');
        if (!$organisasiId) {
            return redirect()->route('organisasi.login');
        }

        $validated = $request->validate([
            'surat_rekomendasi' => 'nullable|file|mimes:pdf|max:2048',
            'struktur_kepengurusan' => 'nullable|file|mimes:pdf|max:2048',
            'bukti_share_ig' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'bukti_repost_ig' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $organisasi = Organisasi::findOrFail($organisasiId);
        $updateData = [];

        if ($request->hasFile('surat_rekomendasi')) {
            $updateData['surat_rekomendasi'] = $request->file('surat_rekomendasi')->store('documents/organisasi', 'public');
        }
        
        if ($request->hasFile('struktur_kepengurusan')) {
            $updateData['struktur_kepengurusan'] = $request->file('struktur_kepengurusan')->store('documents/organisasi', 'public');
        }
        
        if ($request->hasFile('bukti_share_ig')) {
            $updateData['bukti_share_ig'] = $request->file('bukti_share_ig')->store('screenshots/organisasi', 'public');
        }
        
        if ($request->hasFile('bukti_repost_ig')) {
            $updateData['bukti_repost_ig'] = $request->file('bukti_repost_ig')->store('screenshots/organisasi', 'public');
        }

        if (!empty($updateData)) {
            $organisasi->update($updateData);
        }

        return redirect()->route('organisasi.dashboard')
            ->with('success', 'Dokumen berhasil diupload!');
    }

    public function logout()
    {
        session()->forget('organisasi_id');
        return redirect()->route('home');
    }
}