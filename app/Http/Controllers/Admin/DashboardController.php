<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrganisasi = Organisasi::count();
        $totalPendaftar = $totalOrganisasi;
        
        $recentOrganisasi = Organisasi::latest()->take(10)->get();
        
        // Analytics data for the last 7 days
        $analyticsData = [];
        for($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $orgCount = Organisasi::whereDate('created_at', $date)->count();
            $total = $orgCount;
            $height = $total > 0 ? ($total * 20) + 20 : 20;
            
            $analyticsData[] = [
                'date' => $date->format('d/m'),
                'total' => $total,
                'height' => min($height, 180)
            ];
        }
        
        // Document completion statistics
        $documentStats = [
            'surat_rekomendasi' => [
                'name' => 'Surat Rekomendasi Sekolah',
                'icon' => '📄',
                'completed' => Organisasi::whereNotNull('surat_rekomendasi')->count(),
                'pending' => Organisasi::whereNull('surat_rekomendasi')->count(),
            ],
            'struktur_kepengurusan' => [
                'name' => 'Struktur Kepengurusan',
                'icon' => '👥',
                'completed' => Organisasi::whereNotNull('struktur_kepengurusan')->count(),
                'pending' => Organisasi::whereNull('struktur_kepengurusan')->count(),
            ],
            'buktishare' => [
                'name' => 'Bukti Share IG Story',
                'icon' => '📱',
                'completed' => Organisasi::whereNotNull('buktishare')->count(),
                'pending' => Organisasi::whereNull('buktishare')->count(),
            ],
            'buktirepost' => [
                'name' => 'Bukti Repost IG Feeds',
                'icon' => '📸',
                'completed' => Organisasi::whereNotNull('buktirepost')->count(),
                'pending' => Organisasi::whereNull('buktirepost')->count(),
            ],
        ];
        
        // Nomination statistics
        $nominationStats = [
            'innovation' => [
                'name' => 'Outstanding Student Council Innovation',
                'icon' => '🏆',
                'total' => Organisasi::whereNotNull('portofolio_program_kerja')
                    ->whereNotNull('google_form_kepuasan')
                    ->count(),
                'pending' => Organisasi::where(function($query) {
                    $query->whereNull('portofolio_program_kerja')
                          ->orWhereNull('google_form_kepuasan');
                })->count(),
                'scored' => Organisasi::whereNotNull('nilai_innovation')->count(),
                'avg_score' => Organisasi::whereNotNull('nilai_innovation')->avg('nilai_innovation')
            ],
            'social_impact' => [
                'name' => 'Leading Student Council Social Impact',
                'icon' => '🤝',
                'total' => Organisasi::whereNotNull('portofolio_kegiatan_sosial')
                    ->whereNotNull('google_form_kepuasan_sosial')
                    ->count(),
                'pending' => Organisasi::where(function($query) {
                    $query->whereNull('portofolio_kegiatan_sosial')
                          ->orWhereNull('google_form_kepuasan_sosial');
                })->count(),
                'scored' => Organisasi::whereNotNull('nilai_social_impact')->count(),
                'avg_score' => Organisasi::whereNotNull('nilai_social_impact')->avg('nilai_social_impact')
            ],
            'media' => [
                'name' => 'Next-Level Student Council Media',
                'icon' => '📱',
                'total' => Organisasi::whereNotNull('portofolio_sosial_media')
                    ->whereNotNull('google_form_kepuasan_media')
                    ->count(),
                'pending' => Organisasi::where(function($query) {
                    $query->whereNull('portofolio_sosial_media')
                          ->orWhereNull('google_form_kepuasan_media');
                })->count(),
                'scored' => Organisasi::whereNotNull('nilai_media')->count(),
                'avg_score' => Organisasi::whereNotNull('nilai_media')->avg('nilai_media')
            ],
            'video_reels' => [
                'name' => "People's Choice Student Council - DKI Jakarta",
                'icon' => '🎬',
                'total' => Organisasi::whereNotNull('link_instagram_reels')
                    ->whereNotNull('google_form_kepuasan_reels')
                    ->count(),
                'pending' => Organisasi::where(function($query) {
                    $query->whereNull('link_instagram_reels')
                          ->orWhereNull('google_form_kepuasan_reels');
                })->count(),
                'scored' => Organisasi::whereNotNull('nilai_video_reels')->count(),
                'avg_score' => Organisasi::whereNotNull('nilai_video_reels')->avg('nilai_video_reels')
            ],
            'president' => [
                'name' => 'Student Council President of the Year 2026',
                'icon' => '👑',
                'total' => Organisasi::whereNotNull('pas_foto_formal')
                    ->whereNotNull('curriculum_vitae')
                    ->whereNotNull('fotokopi_rapor')
                    ->whereNotNull('video_profil_jakarta')
                    ->whereNotNull('portofolio_inovasi')
                    ->whereNotNull('esai_solusi_kepemimpinan')
                    ->whereNotNull('google_form_kepuasan_president')
                    ->whereNotNull('surat_pernyataan_kedisiplinan')
                    ->count(),
                'pending' => Organisasi::where(function($query) {
                    $query->whereNull('pas_foto_formal')
                          ->orWhereNull('curriculum_vitae')
                          ->orWhereNull('fotokopi_rapor')
                          ->orWhereNull('video_profil_jakarta')
                          ->orWhereNull('portofolio_inovasi')
                          ->orWhereNull('esai_solusi_kepemimpinan')
                          ->orWhereNull('google_form_kepuasan_president')
                          ->orWhereNull('surat_pernyataan_kedisiplinan');
                })->count(),
                'scored' => Organisasi::whereNotNull('nilai_president')->count(),
                'avg_score' => Organisasi::whereNotNull('nilai_president')->avg('nilai_president')
            ]
        ];
        
        return view('admin.dashboard', compact(
            'totalOrganisasi', 
            'totalPendaftar',
            'recentOrganisasi',
            'documentStats',
            'nominationStats',
            'analyticsData'
        ));
    }
}