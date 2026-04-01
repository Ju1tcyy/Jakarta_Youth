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

    public function uploadNomination(Request $request)
    {
        $user = Auth::user();
        
        if (!$user || !$user->isPendaftar()) {
            return redirect()->route('organisasi.login');
        }

        $organisasi = $user->organisasi;

        $validated = $request->validate([
            // Innovation
            'portofolio_program_kerja' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan' => 'nullable|boolean',
            
            // Social Impact
            'portofolio_kegiatan_sosial' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_sosial' => 'nullable|boolean',
            
            // Media
            'portofolio_sosial_media' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_media' => 'nullable|boolean',
            
            // Video Reels
            'link_instagram_reels' => 'nullable|url|max:255',
            'google_form_kepuasan_reels' => 'nullable|boolean',
            
            // President
            'pas_foto_formal' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'curriculum_vitae' => 'nullable|file|mimes:pdf|max:2048',
            'fotokopi_rapor' => 'nullable|file|mimes:pdf|max:2048',
            'video_profil_jakarta' => 'nullable|url|max:255',
            'portofolio_inovasi' => 'nullable|file|mimes:pdf|max:5120',
            'esai_solusi_kepemimpinan' => 'nullable|file|mimes:pdf|max:2048',
            'surat_pernyataan_kedisiplinan' => 'nullable|file|mimes:pdf|max:2048',
            'google_form_kepuasan_president' => 'nullable|boolean',
        ]);

        $updateData = [];

        // Handle file uploads
        $fileFields = [
            'portofolio_program_kerja',
            'portofolio_kegiatan_sosial',
            'portofolio_sosial_media',
            'pas_foto_formal',
            'curriculum_vitae',
            'fotokopi_rapor',
            'portofolio_inovasi',
            'esai_solusi_kepemimpinan',
            'surat_pernyataan_kedisiplinan',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($organisasi->$field) {
                    Storage::disk('public')->delete($organisasi->$field);
                }
                $updateData[$field] = $request->file($field)->store('nominations/organisasi', 'public');
            }
        }

        // Handle URL fields
        if ($request->filled('link_instagram_reels')) {
            $updateData['link_instagram_reels'] = $request->link_instagram_reels;
        }
        if ($request->filled('video_profil_jakarta')) {
            $updateData['video_profil_jakarta'] = $request->video_profil_jakarta;
        }

        // Handle checkbox fields
        $checkboxFields = [
            'google_form_kepuasan',
            'google_form_kepuasan_sosial',
            'google_form_kepuasan_media',
            'google_form_kepuasan_reels',
            'google_form_kepuasan_president',
        ];

        foreach ($checkboxFields as $field) {
            if ($request->has($field)) {
                $updateData[$field] = $request->$field ? 1 : 0;
            }
        }

        if (!empty($updateData)) {
            $organisasi->update($updateData);
        }

        return redirect()->route('organisasi.dashboard')
            ->with('success', 'Data nominasi berhasil diupload!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
