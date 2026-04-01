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
        
        return view('admin.dashboard', compact(
            'totalOrganisasi', 
            'totalPendaftar',
            'recentOrganisasi',
            'documentStats',
            'analyticsData'
        ));
    }
}