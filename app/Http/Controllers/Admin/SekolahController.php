<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SekolahController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::with('user')->latest()->paginate(10);
        return view('admin.organisasi.index', compact('organisasi'));
    }

    public function show($id)
    {
        $organisasi = Organisasi::with('user')->findOrFail($id);
        return view('admin.organisasi.show', compact('organisasi'));
    }

    public function edit($id)
    {
        $organisasi = Organisasi::with('user')->findOrFail($id);
        return view('admin.organisasi.edit', compact('organisasi'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate(['password' => 'required|min:8']);
        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make($request->password)]);
        
        return back()->with('success', 'Password pengguna berhasil diubah!');
    }

    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail($id);

        $validated = $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $organisasi->update($validated);

        return redirect()->route('sekolah.show', $id)
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();

        return redirect()->route('sekolah.index')
            ->with('success', 'Data organisasi berhasil dihapus');
    }

    // ─── Juri Management ────────────────────────────────────────────

    public function juriIndex()
    {
        $juris = User::where('role', 'juri')->latest()->get();
        return view('admin.juri.index', compact('juris'));
    }

    public function juriStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'juri',
        ]);

        return redirect()->route('admin.juri.index')
            ->with('success', 'Akun juri berhasil dibuat!');
    }

    public function juriDestroy($id)
    {
        $juri = User::where('role', 'juri')->findOrFail($id);
        $juri->delete();

        return redirect()->route('admin.juri.index')
            ->with('success', 'Akun juri berhasil dihapus.');
    }

    // ─── Panitia Management ─────────────────────────────────────────

    public function panitiaIndex()
    {
        $panitias = User::where('role', 'panitia')->latest()->get();
        return view('admin.panitia.index', compact('panitias'));
    }

    public function panitiaStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'panitia',
        ]);

        return redirect()->route('admin.panitia.index')
            ->with('success', 'Akun panitia berhasil dibuat!');
    }

    public function panitiaDestroy($id)
    {
        $panitia = User::where('role', 'panitia')->findOrFail($id);
        $panitia->delete();

        return redirect()->route('admin.panitia.index')
            ->with('success', 'Akun panitia berhasil dihapus.');
    }

    // ─── Leaderboard ────────────────────────────────────────────────

    public function leaderboard($kategori)
    {
        $validCategories = ['innovation', 'social_impact', 'media', 'video_reels', 'president'];
        if (!in_array($kategori, $validCategories)) {
            abort(404);
        }

        $organisasis = Organisasi::with('user')
            ->whereHas('penilaianByJuri', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->withAvg('penilaianByJuri as avg_skor', 'total_skor')
            ->orderByDesc('avg_skor')
            ->get();

        return view('admin.leaderboard.index', compact('organisasis', 'kategori'));
    }
}

