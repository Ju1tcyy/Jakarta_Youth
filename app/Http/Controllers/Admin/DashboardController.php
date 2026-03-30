<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ketos;
use App\Models\Organisasi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKetos = Ketos::count();
        $totalOrganisasi = Organisasi::count();
        $totalPendaftar = $totalKetos + $totalOrganisasi;
        
        $recentKetos = Ketos::latest()->take(5)->get();
        $recentOrganisasi = Organisasi::latest()->take(5)->get();
        
        // Analytics data for the last 7 days
        $analyticsData = [];
        for($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $ketosCount = Ketos::whereDate('created_at', $date)->count();
            $orgCount = Organisasi::whereDate('created_at', $date)->count();
            $total = $ketosCount + $orgCount;
            $height = $total > 0 ? ($total * 20) + 20 : 20;
            
            $analyticsData[] = [
                'date' => $date->format('d/m'),
                'total' => $total,
                'height' => min($height, 180)
            ];
        }
        
        // Nomination statistics
        $nominationStats = [
            'innovation' => [
                'name' => 'Outstanding Student Council Innovation',
                'icon' => '🏆',
                'total' => Ketos::whereNotNull('portofolio_program_kerja')
                    ->whereNotNull('google_form_kepuasan')
                    ->count(),
                'pending' => Ketos::where(function($query) {
                    $query->whereNull('portofolio_program_kerja')
                          ->orWhereNull('google_form_kepuasan');
                })->count(),
                'scored' => Ketos::whereNotNull('nilai_innovation')->count(),
                'avg_score' => Ketos::whereNotNull('nilai_innovation')->avg('nilai_innovation')
            ],
            'social_impact' => [
                'name' => 'Leading Student Council Social Impact',
                'icon' => '🤝',
                'total' => Ketos::whereNotNull('portofolio_kegiatan_sosial')
                    ->whereNotNull('google_form_kepuasan_sosial')
                    ->count(),
                'pending' => Ketos::where(function($query) {
                    $query->whereNull('portofolio_kegiatan_sosial')
                          ->orWhereNull('google_form_kepuasan_sosial');
                })->count(),
                'scored' => Ketos::whereNotNull('nilai_social_impact')->count(),
                'avg_score' => Ketos::whereNotNull('nilai_social_impact')->avg('nilai_social_impact')
            ],
            'media' => [
                'name' => 'Next-Level Student Council Media',
                'icon' => '📱',
                'total' => Ketos::whereNotNull('portofolio_sosial_media')
                    ->whereNotNull('google_form_kepuasan_media')
                    ->count(),
                'pending' => Ketos::where(function($query) {
                    $query->whereNull('portofolio_sosial_media')
                          ->orWhereNull('google_form_kepuasan_media');
                })->count(),
                'scored' => Ketos::whereNotNull('nilai_media')->count(),
                'avg_score' => Ketos::whereNotNull('nilai_media')->avg('nilai_media')
            ],
            'video_reels' => [
                'name' => 'Video IG Reels',
                'icon' => '🎬',
                'total' => Ketos::whereNotNull('link_instagram_reels')
                    ->whereNotNull('google_form_kepuasan_reels')
                    ->count(),
                'pending' => Ketos::where(function($query) {
                    $query->whereNull('link_instagram_reels')
                          ->orWhereNull('google_form_kepuasan_reels');
                })->count(),
                'scored' => Ketos::whereNotNull('nilai_video_reels')->count(),
                'avg_score' => Ketos::whereNotNull('nilai_video_reels')->avg('nilai_video_reels')
            ],
            'president' => [
                'name' => 'Student Council President of the Year 2026',
                'icon' => '👑',
                'total' => Ketos::whereNotNull('pas_foto_formal')
                    ->whereNotNull('curriculum_vitae')
                    ->whereNotNull('fotokopi_rapor')
                    ->whereNotNull('video_profil_jakarta')
                    ->whereNotNull('portofolio_inovasi')
                    ->whereNotNull('esai_solusi_kepemimpinan')
                    ->whereNotNull('google_form_kepuasan_president')
                    ->whereNotNull('surat_pernyataan_kedisiplinan')
                    ->count(),
                'pending' => Ketos::where(function($query) {
                    $query->whereNull('pas_foto_formal')
                          ->orWhereNull('curriculum_vitae')
                          ->orWhereNull('fotokopi_rapor')
                          ->orWhereNull('video_profil_jakarta')
                          ->orWhereNull('portofolio_inovasi')
                          ->orWhereNull('esai_solusi_kepemimpinan')
                          ->orWhereNull('google_form_kepuasan_president')
                          ->orWhereNull('surat_pernyataan_kedisiplinan');
                })->count(),
                'scored' => Ketos::whereNotNull('nilai_president')->count(),
                'avg_score' => Ketos::whereNotNull('nilai_president')->avg('nilai_president')
            ]
        ];
        
        return view('admin.dashboard', compact(
            'totalKetos',
            'totalOrganisasi', 
            'totalPendaftar',
            'recentKetos',
            'recentOrganisasi',
            'nominationStats',
            'analyticsData'
        ));
    }
}