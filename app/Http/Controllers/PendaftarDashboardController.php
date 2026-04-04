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
            'buktishare'             => 'nullable|array|max:10',
            'buktishare.*'           => 'file|mimes:jpg,jpeg,png|max:5120',
            'buktirepost'            => 'nullable|array|max:10',
            'buktirepost.*'          => 'file|mimes:jpg,jpeg,png|max:5120',
        ]);

        $updateData = [];
        // Handle single PDF files
        $singleFiles = [
            'surat_rekomendasi' => 'documents/organisasi',
            'struktur_kepengurusan' => 'documents/organisasi',
        ];

        foreach ($singleFiles as $field => $path) {
            if ($request->hasFile($field)) {
                if ($organisasi->$field) {
                    Storage::disk('public')->delete($organisasi->$field);
                }
                $updateData[$field] = $request->file($field)->store($path, 'public');
            }
        }

        // Handle multiple image files (array) - APPEND mode
        $arrayFiles = [
            'buktishare' => 'documents/organisasi',
            'buktirepost' => 'documents/organisasi',
        ];

        foreach ($arrayFiles as $field => $path) {
            if ($request->hasFile($field)) {
                // Get existing files (don't delete them)
                $existingFiles = $organisasi->$field ?? [];
                if (!is_array($existingFiles)) {
                    $existingFiles = [];
                }

                // Store new files and APPEND to existing
                $newPaths = [];
                foreach ($request->file($field) as $file) {
                    $newPaths[] = $file->store($path, 'public');
                }

                // Merge: existing + new (max 10 total)
                $merged = array_merge($existingFiles, $newPaths);
                if (count($merged) > 10) {
                    $merged = array_slice($merged, -10);
                }

                $updateData[$field] = $merged;
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

        // Count how many nominations are currently selected
        $currentNominations = 0;
        if ($organisasi->portofolio_program_kerja || $organisasi->google_form_kepuasan) $currentNominations++;
        if ($organisasi->portofolio_kegiatan_sosial || $organisasi->google_form_kepuasan_sosial) $currentNominations++;
        if ($organisasi->portofolio_sosial_media || $organisasi->google_form_kepuasan_media) $currentNominations++;
        if ($organisasi->link_instagram_reels || $organisasi->google_form_kepuasan_reels) $currentNominations++;
        if ($organisasi->pas_foto_formal || $organisasi->curriculum_vitae || $organisasi->fotokopi_rapor || 
            $organisasi->video_profil_jakarta || $organisasi->portofolio_inovasi || $organisasi->esai_solusi_kepemimpinan || 
            $organisasi->surat_pernyataan_kedisiplinan || $organisasi->google_form_kepuasan_president) $currentNominations++;

        // Count how many nominations are being submitted
        $newNominations = 0;
        if ($request->hasFile('portofolio_program_kerja') || $request->has('google_form_kepuasan')) $newNominations++;
        if ($request->hasFile('portofolio_kegiatan_sosial') || $request->has('google_form_kepuasan_sosial')) $newNominations++;
        if ($request->hasFile('portofolio_sosial_media') || $request->has('google_form_kepuasan_media')) $newNominations++;
        if ($request->filled('link_instagram_reels') || $request->has('google_form_kepuasan_reels')) $newNominations++;
        if ($request->hasFile('pas_foto_formal') || $request->hasFile('curriculum_vitae') || $request->hasFile('fotokopi_rapor') || 
            $request->filled('video_profil_jakarta') || $request->hasFile('portofolio_inovasi') || $request->hasFile('esai_solusi_kepemimpinan') || 
            $request->hasFile('surat_pernyataan_kedisiplinan') || $request->has('google_form_kepuasan_president')) $newNominations++;

        // Validate min 1 max 5 nominations
        $totalNominations = max($currentNominations, $newNominations);
        if ($totalNominations < 1) {
            return back()->withErrors(['error' => 'Anda harus memilih minimal 1 kategori nominasi.'])->withInput();
        }
        if ($totalNominations > 5) {
            return back()->withErrors(['error' => 'Anda hanya dapat memilih maksimal 5 kategori nominasi.'])->withInput();
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
