@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Admin Portal')

@section('content')
<p class="text-gray-600 mb-8">Pantau statistik pendaftar, verifikasi berkas, dan kelola seleksi dalam satu panel terintegrasi.</p>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Pendaftar -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                </svg>
            </div>
            <span class="text-xs text-gray-500">TOTAL</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">{{ $totalPendaftar }}</h3>
        <p class="text-sm text-gray-500 mt-1">Pendaftar Terdaftar</p>
    </div>

    <!-- Data Ketos -->
    <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg shadow p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <span class="text-xs opacity-80">LOLOS SELEKSI</span>
        </div>
        <h3 class="text-3xl font-bold">{{ $totalKetos }}</h3>
        <p class="text-sm opacity-80 mt-1">Data Ketos</p>
    </div>

    <!-- Data Organisasi -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
            </div>
            <span class="text-xs text-gray-500">LOLOS SELEKSI</span>
        </div>
        <h3 class="text-3xl font-bold text-gray-800">{{ $totalOrganisasi }}</h3>
        <p class="text-sm text-gray-500 mt-1">Data Organisasi</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Analitik Pendaftaran -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Analitik Pendaftaran</h3>
            <span class="text-xs text-gray-500">DATA 7 HARI TERAKHIR</span>
        </div>
        <div class="h-48 flex items-end justify-between space-x-2">
            @for($i = 6; $i >= 0; $i--)
                @php
                    $date = now()->subDays($i);
                    $ketosCount = \App\Models\Ketos::whereDate('created_at', $date)->count();
                    $orgCount = \App\Models\Organisasi::whereDate('created_at', $date)->count();
                    $total = $ketosCount + $orgCount;
                    $height = $total > 0 ? ($total * 20) + 20 : 20;
                @endphp
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-full bg-orange-200 rounded-t" style="height: {{ min($height, 180) }}px"></div>
                    <span class="text-xs text-gray-500 mt-2">{{ $date->format('d/m') }}</span>
                </div>
            @endfor
        </div>
    </div>

    <!-- Log Aktivitas -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center mb-4">
            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-800">Log Aktivitas</h3>
        </div>
        <div class="space-y-4">
            @forelse($recentKetos->take(3) as $ketos)
                <div class="flex items-start">
                    <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3"></div>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500">{{ $ketos->created_at->diffForHumans() }}</p>
                        <p class="text-sm text-gray-800">Pendaftaran Ketos: <span class="font-semibold">{{ $ketos->nama }}</span></p>
                        <p class="text-xs text-gray-500">{{ $ketos->asal_sekolah }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">Belum ada aktivitas</p>
            @endforelse

            @foreach($recentOrganisasi->take(2) as $org)
                <div class="flex items-start">
                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2 mr-3"></div>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500">{{ $org->created_at->diffForHumans() }}</p>
                        <p class="text-sm text-gray-800">Pendaftaran Organisasi: <span class="font-semibold">{{ $org->nama_organisasi }}</span></p>
                        <p class="text-xs text-gray-500">{{ $org->nama_sekolah }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
