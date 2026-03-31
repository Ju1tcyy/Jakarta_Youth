<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrganisasiAuthController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'organisasi') {
            Auth::logout();
            return redirect()->route('login');
        }

        return view('organisasi.dashboard', ['organisasi' => $user]);
    }

    public function uploadDocuments(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'organisasi') {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'surat_rekomendasi' => 'nullable|file|mimes:pdf|max:2048',
            'struktur_kepengurusan' => 'nullable|file|mimes:pdf|max:2048',
            'bukti_share_ig' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'bukti_repost_ig' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

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
            $user->update($updateData);
        }

        return redirect()->route('organisasi.dashboard')
            ->with('success', 'Dokumen berhasil diupload!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}