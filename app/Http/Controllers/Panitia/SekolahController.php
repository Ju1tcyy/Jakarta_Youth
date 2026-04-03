<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::with('user')->latest()->paginate(10);
        return view('panitia.organisasi.index', compact('organisasi'));
    }

    public function show($id)
    {
        $organisasi = Organisasi::with('user')->findOrFail($id);
        return view('panitia.organisasi.show', compact('organisasi'));
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

        return view('panitia.leaderboard.index', compact('organisasis', 'kategori'));
    }
}
