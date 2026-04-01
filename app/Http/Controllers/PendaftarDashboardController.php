<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftarDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Consistent role-based access
        if ($user->role !== 'pendaftar') {
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home');
        }

        $organisasi = $user->organisasi;

        return view('organisasi.dashboard', ['organisasi' => $organisasi]);
    }

    public function uploadDocuments(Request $request)
    {
        $user = Auth::user();
        $organisasi = $user->organisasi;

        if (!$organisasi) {
            return back()->withErrors(['error' => 'Data organisasi tidak ditemukan.']);
        }

        $request->validate([
            'surat_rekomendasi'      => 'nullable|file|mimes:pdf|max:2048',
            'struktur_kepengurusan'  => 'nullable|file|mimes:pdf|max:2048',
            'buktishare'             => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'buktirepost'            => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $updateData = [];
        $files = [
            'surat_rekomendasi' => 'documents/organisasi',
            'struktur_kepengurusan' => 'documents/organisasi',
            'buktishare' => 'documents/organisasi',
            'buktirepost' => 'documents/organisasi',
        ];

        foreach ($files as $field => $path) {
            if ($request->hasFile($field)) {
                if ($organisasi->$field) {
                    Storage::disk('public')->delete($organisasi->$field);
                }
                $updateData[$field] = $request->file($field)->store($path, 'public');
            }
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
        $organisasi = $user->organisasi;

        if (!$organisasi) {
            return back()->withErrors(['error' => 'Data organisasi tidak ditemukan.']);
        }

        $request->validate([
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
            'portofolio_program_kerja' => 'nominations/organisasi',
            'portofolio_kegiatan_sosial' => 'nominations/organisasi',
            'portofolio_sosial_media' => 'nominations/organisasi',
            'pas_foto_formal' => 'nominations/organisasi',
            'curriculum_vitae' => 'nominations/organisasi',
            'fotokopi_rapor' => 'nominations/organisasi',
            'portofolio_inovasi' => 'nominations/organisasi',
            'esai_solusi_kepemimpinan' => 'nominations/organisasi',
            'surat_pernyataan_kedisiplinan' => 'nominations/organisasi',
        ];

        foreach ($fileFields as $field => $path) {
            if ($request->hasFile($field)) {
                if ($organisasi->$field) {
                    Storage::disk('public')->delete($organisasi->$field);
                }
                $updateData[$field] = $request->file($field)->store($path, 'public');
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
            } else {
                $updateData[$field] = 0; // Default to unchecked if not present
            }
        }

        if (!empty($updateData)) {
            $organisasi->update($updateData);
        }

        return redirect()->route('organisasi.dashboard')
            ->with('success', 'Data nominasi berhasil diupload!');
    }

}
