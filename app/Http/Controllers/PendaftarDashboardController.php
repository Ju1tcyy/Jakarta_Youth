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
        
        if (!$user->isPendaftar()) {
            return redirect()->route('home');
        }

        $organisasi = $user->organisasi;
        
        if (!$organisasi) {
            return redirect()->route('home')
                ->withErrors(['error' => 'Data organisasi tidak ditemukan.']);
        }

        return view('organisasi.dashboard', ['organisasi' => $organisasi]);
    }

    public function uploadDocuments(Request $request)
    {
        $user = Auth::user();
        $organisasi = $user->organisasi;

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
}
