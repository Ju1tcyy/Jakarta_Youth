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
        
        return view('admin.dashboard', compact(
            'totalKetos',
            'totalOrganisasi', 
            'totalPendaftar',
            'recentKetos',
            'recentOrganisasi'
        ));
    }
}