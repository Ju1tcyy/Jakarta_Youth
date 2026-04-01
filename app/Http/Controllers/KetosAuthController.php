<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KetosAuthController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'ketos') {
            Auth::logout();
            return redirect()->route('login');
        }

        return view('ketos.dashboard', ['ketos' => $user]);
    }

    public function uploadNomination(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'ketos') {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'nomination_type' => 'required|string|in:innovation,social_impact,media,video_reels,president',
            'portofolio_program_kerja' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan' => 'nullable|boolean',
            'portofolio_kegiatan_sosial' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_sosial' => 'nullable|boolean',
            'portofolio_sosial_media' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_media' => 'nullable|boolean',
            'link_instagram_reels' => 'nullable|url',
            'google_form_kepuasan_reels' => 'nullable|boolean',
            'pas_foto_formal' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'curriculum_vitae' => 'nullable|file|mimes:pdf|max:5120',
            'fotokopi_rapor' => 'nullable|file|mimes:pdf|max:5120',
            'video_profil_jakarta' => 'nullable|url',
            'portofolio_inovasi' => 'nullable|file|mimes:pdf|max:5120',
            'esai_solusi_kepemimpinan' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_president' => 'nullable|boolean',
            'surat_pernyataan_kedisiplinan' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $updateData = [];

        // Handle Innovation nomination
        if ($validated['nomination_type'] === 'innovation') {
            if ($request->hasFile('portofolio_program_kerja')) {
                $updateData['portofolio_program_kerja'] = $request->file('portofolio_program_kerja')->store('nominations/ketos', 'public');
            }
            
            if ($request->has('google_form_kepuasan')) {
                $updateData['google_form_kepuasan'] = $request->google_form_kepuasan ? 1 : 0;
            }
        }

        // Handle Social Impact nomination
        if ($validated['nomination_type'] === 'social_impact') {
            if ($request->hasFile('portofolio_kegiatan_sosial')) {
                $updateData['portofolio_kegiatan_sosial'] = $request->file('portofolio_kegiatan_sosial')->store('nominations/ketos', 'public');
            }
            
            if ($request->has('google_form_kepuasan_sosial')) {
                $updateData['google_form_kepuasan_sosial'] = $request->google_form_kepuasan_sosial ? 1 : 0;
            }
        }

        // Handle Media nomination
        if ($validated['nomination_type'] === 'media') {
            if ($request->hasFile('portofolio_sosial_media')) {
                $updateData['portofolio_sosial_media'] = $request->file('portofolio_sosial_media')->store('nominations/ketos', 'public');
            }
            
            if ($request->has('google_form_kepuasan_media')) {
                $updateData['google_form_kepuasan_media'] = $request->google_form_kepuasan_media ? 1 : 0;
            }
        }

        // Handle Video Reels nomination
        if ($validated['nomination_type'] === 'video_reels') {
            if ($request->filled('link_instagram_reels')) {
                $updateData['link_instagram_reels'] = $validated['link_instagram_reels'];
            }
            
            if ($request->has('google_form_kepuasan_reels')) {
                $updateData['google_form_kepuasan_reels'] = $request->google_form_kepuasan_reels ? 1 : 0;
            }
        }

        // Handle President nomination
        if ($validated['nomination_type'] === 'president') {
            if ($request->hasFile('pas_foto_formal')) {
                $updateData['pas_foto_formal'] = $request->file('pas_foto_formal')->store('nominations/ketos', 'public');
            }
            
            if ($request->hasFile('curriculum_vitae')) {
                $updateData['curriculum_vitae'] = $request->file('curriculum_vitae')->store('nominations/ketos', 'public');
            }
            
            if ($request->hasFile('fotokopi_rapor')) {
                $updateData['fotokopi_rapor'] = $request->file('fotokopi_rapor')->store('nominations/ketos', 'public');
            }
            
            if ($request->filled('video_profil_jakarta')) {
                $updateData['video_profil_jakarta'] = $validated['video_profil_jakarta'];
            }
            
            if ($request->hasFile('portofolio_inovasi')) {
                $updateData['portofolio_inovasi'] = $request->file('portofolio_inovasi')->store('nominations/ketos', 'public');
            }
            
            if ($request->hasFile('esai_solusi_kepemimpinan')) {
                $updateData['esai_solusi_kepemimpinan'] = $request->file('esai_solusi_kepemimpinan')->store('nominations/ketos', 'public');
            }
            
            if ($request->has('google_form_kepuasan_president')) {
                $updateData['google_form_kepuasan_president'] = $request->google_form_kepuasan_president ? 1 : 0;
            }
            
            if ($request->hasFile('surat_pernyataan_kedisiplinan')) {
                $updateData['surat_pernyataan_kedisiplinan'] = $request->file('surat_pernyataan_kedisiplinan')->store('nominations/ketos', 'public');
            }
        }

        if (!empty($updateData)) {
            $user->update($updateData);
        }

        return redirect()->route('ketos.dashboard')
            ->with('success', 'Berkas nominasi berhasil diupload!');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'ketos') {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:20',
            'password' => 'nullable|min:6|confirmed',
        ]);
        
        // Update data
        $user->name = $validated['nama'];
        $user->email = $validated['email'];
        $user->tempat_lahir = $validated['tempat_lahir'];
        $user->tanggal_lahir = $validated['tanggal_lahir'];
        $user->asal_sekolah = $validated['asal_sekolah'];
        $user->nomor_wa = $validated['nomor_wa'];
        
        // Update password jika diisi
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        
        $user->save();

        return redirect()->route('ketos.dashboard')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}