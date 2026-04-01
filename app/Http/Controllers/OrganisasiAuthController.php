<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganisasiAuthController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        if (!$user || !$user->isPendaftar()) {
            Auth::logout();
            return redirect()->route('organisasi.login');
        }

        $organisasi = $user->organisasi;
        
        if (!$organisasi) {
            return redirect()->route('organisasi.login')
                ->withErrors(['error' => 'Data organisasi tidak ditemukan.']);
        }

        return view('organisasi.dashboard', ['organisasi' => $organisasi]);
    }

    public function uploadDocuments(Request $request)
    {
        $user = Auth::user();
        
        if (!$user || !$user->isPendaftar()) {
            return redirect()->route('organisasi.login');
        }

        $organisasi = $user->organisasi;

        $validated = $request->validate([
            'surat_rekomendasi'      => 'nullable|file|mimes:pdf|max:2048',
            'struktur_kepengurusan'  => 'nullable|file|mimes:pdf|max:2048',
            'buktishare'             => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'buktirepost'            => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $updateData = [];

        if ($request->hasFile('surat_rekomendasi')) {
            if ($organisasi->surat_rekomendasi) {
                Storage::disk('public')->delete($organisasi->surat_rekomendasi);
            }
            $updateData['surat_rekomendasi'] = $request->file('surat_rekomendasi')
                ->store('documents/organisasi', 'public');
        }

        if ($request->hasFile('struktur_kepengurusan')) {
            if ($organisasi->struktur_kepengurusan) {
                Storage::disk('public')->delete($organisasi->struktur_kepengurusan);
            }
            $updateData['struktur_kepengurusan'] = $request->file('struktur_kepengurusan')
                ->store('documents/organisasi', 'public');
        }

        if ($request->hasFile('buktishare')) {
            if ($organisasi->buktishare) {
                Storage::disk('public')->delete($organisasi->buktishare);
            }
            $updateData['buktishare'] = $request->file('buktishare')
                ->store('documents/organisasi', 'public');
        }

        if ($request->hasFile('buktirepost')) {
            if ($organisasi->buktirepost) {
                Storage::disk('public')->delete($organisasi->buktirepost);
            }
            $updateData['buktirepost'] = $request->file('buktirepost')
                ->store('documents/organisasi', 'public');
        }

        if (!empty($updateData)) {
            $organisasi->update($updateData);
        }

        return redirect()->route('organisasi.dashboard')
            ->with('success', 'Dokumen berhasil diupload!');
    }
}
