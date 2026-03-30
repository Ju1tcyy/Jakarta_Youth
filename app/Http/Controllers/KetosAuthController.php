<?php

namespace App\Http\Controllers;

use App\Models\Ketos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KetosAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('ketos.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $ketos = Ketos::where('email', $credentials['email'])->first();

        if ($ketos && Hash::check($credentials['password'], $ketos->password)) {
            session(['ketos_id' => $ketos->id]);
            return redirect()->route('ketos.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function dashboard()
    {
        $ketosId = session('ketos_id');
        if (!$ketosId) {
            return redirect()->route('ketos.login');
        }

        $ketos = Ketos::findOrFail($ketosId);
        return view('ketos.dashboard', compact('ketos'));
    }

    public function uploadNomination(Request $request)
    {
        $ketosId = session('ketos_id');
        if (!$ketosId) {
            return redirect()->route('ketos.login');
        }

        $validated = $request->validate([
            'nomination_type' => 'required|string|in:innovation,social_impact,media,video_reels,president',
            'portofolio_program_kerja' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan' => 'nullable|url',
            'portofolio_kegiatan_sosial' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_sosial' => 'nullable|url',
            'portofolio_sosial_media' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_media' => 'nullable|url',
            'link_instagram_reels' => 'nullable|url',
            'google_form_kepuasan_reels' => 'nullable|url',
            'pas_foto_formal' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'curriculum_vitae' => 'nullable|file|mimes:pdf|max:5120',
            'fotokopi_rapor' => 'nullable|file|mimes:pdf|max:5120',
            'video_profil_jakarta' => 'nullable|url',
            'portofolio_inovasi' => 'nullable|file|mimes:pdf|max:5120',
            'esai_solusi_kepemimpinan' => 'nullable|file|mimes:pdf|max:5120',
            'google_form_kepuasan_president' => 'nullable|url',
            'surat_pernyataan_kedisiplinan' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $ketos = Ketos::findOrFail($ketosId);
        $updateData = [];

        // Handle Innovation nomination
        if ($validated['nomination_type'] === 'innovation') {
            if ($request->hasFile('portofolio_program_kerja')) {
                $updateData['portofolio_program_kerja'] = $request->file('portofolio_program_kerja')->store('nominations/ketos', 'public');
            }
            
            if ($request->filled('google_form_kepuasan')) {
                $updateData['google_form_kepuasan'] = $validated['google_form_kepuasan'];
            }
        }

        // Handle Social Impact nomination
        if ($validated['nomination_type'] === 'social_impact') {
            if ($request->hasFile('portofolio_kegiatan_sosial')) {
                $updateData['portofolio_kegiatan_sosial'] = $request->file('portofolio_kegiatan_sosial')->store('nominations/ketos', 'public');
            }
            
            if ($request->filled('google_form_kepuasan_sosial')) {
                $updateData['google_form_kepuasan_sosial'] = $validated['google_form_kepuasan_sosial'];
            }
        }

        // Handle Media nomination
        if ($validated['nomination_type'] === 'media') {
            if ($request->hasFile('portofolio_sosial_media')) {
                $updateData['portofolio_sosial_media'] = $request->file('portofolio_sosial_media')->store('nominations/ketos', 'public');
            }
            
            if ($request->filled('google_form_kepuasan_media')) {
                $updateData['google_form_kepuasan_media'] = $validated['google_form_kepuasan_media'];
            }
        }

        // Handle Video Reels nomination
        if ($validated['nomination_type'] === 'video_reels') {
            if ($request->filled('link_instagram_reels')) {
                $updateData['link_instagram_reels'] = $validated['link_instagram_reels'];
            }
            
            if ($request->filled('google_form_kepuasan_reels')) {
                $updateData['google_form_kepuasan_reels'] = $validated['google_form_kepuasan_reels'];
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
            
            if ($request->filled('google_form_kepuasan_president')) {
                $updateData['google_form_kepuasan_president'] = $validated['google_form_kepuasan_president'];
            }
            
            if ($request->hasFile('surat_pernyataan_kedisiplinan')) {
                $updateData['surat_pernyataan_kedisiplinan'] = $request->file('surat_pernyataan_kedisiplinan')->store('nominations/ketos', 'public');
            }
        }

        if (!empty($updateData)) {
            $ketos->update($updateData);
        }

        return redirect()->route('ketos.dashboard')
            ->with('success', 'Berkas nominasi berhasil diupload!');
    }

    public function logout()
    {
        session()->forget('ketos_id');
        return redirect()->route('home');
    }
}