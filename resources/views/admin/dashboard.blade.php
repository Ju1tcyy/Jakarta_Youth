@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Overview')

@section('content')
<!-- Logo Section -->
<div class="text-center mb-8">
    <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo" class="mx-auto h-20 w-auto mb-3">
    <h1 class="text-2xl font-bold text-gray-800 mb-1">Admin Dashboard</h1>
    <p class="text-gray-600 text-sm">Jakarta Youth Achievement Award 2026</p>
</div>

<p class="text-slate-500 mb-8 font-medium ml-1">Pantau statistik pendaftar, verifikasi berkas, dan kelola seleksi dalam satu panel terintegrasi.</p>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
    <!-- Total Pendaftar -->
    <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 relative overflow-hidden group">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:scale-110 transition-transform duration-500 text-blue-600">
            <i data-feather="users" class="w-24 h-24"></i>
        </div>
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                <i data-feather="user-plus" class="w-6 h-6"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 tracking-widest uppercase">Total</span>
        </div>
        <h3 class="text-4xl font-black text-slate-800 tracking-tight">{{ $totalPendaftar }}</h3>
        <p class="text-sm font-semibold text-slate-500 mt-1">Pendaftar Terdaftar</p>
    </div>

    <!-- Data Organisasi -->
    <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 relative overflow-hidden group">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:scale-110 transition-transform duration-500 text-green-600">
            <i data-feather="briefcase" class="w-24 h-24"></i>
        </div>
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600">
                <i data-feather="home" class="w-6 h-6"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 tracking-widest uppercase">Organisasi</span>
        </div>
        <h3 class="text-4xl font-black text-slate-800 tracking-tight">{{ $totalOrganisasi }}</h3>
        <p class="text-sm font-semibold text-slate-500 mt-1">Data Organisasi</p>
    </div>
</div>

<!-- Document Statistics Section -->
<div class="mb-10">
    <div class="flex items-center mb-8 ml-1">
        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white mr-4 shadow-lg shadow-blue-200">
            <i data-feather="file-text" class="w-5 h-5"></i>
        </div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Statistik Dokumen</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($documentStats as $key => $doc)
            <div class="bg-white rounded-[30px] p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="text-3xl mr-4 group-hover:scale-125 transition-transform duration-500">{{ $doc['icon'] }}</div>
                        <div>
                            <h3 class="font-black text-slate-800 text-sm leading-tight uppercase tracking-wide">{{ $doc['name'] }}</h3>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center bg-slate-50 p-3 rounded-2xl">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Lengkap</span>
                        <div class="flex items-center">
                            <span class="text-xl font-black text-green-600">{{ $doc['completed'] }}</span>
                            <span class="text-[10px] font-bold text-slate-400 ml-1 uppercase">Peserta</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center p-3">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Belum Lengkap</span>
                        <div class="flex items-center">
                            <span class="text-xl font-black text-orange-500">{{ $doc['pending'] }}</span>
                            <span class="text-[10px] font-bold text-slate-400 ml-1 uppercase">Peserta</span>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="pt-2">
                        @php
                            $total = $doc['completed'] + $doc['pending'];
                            $percentage = $total > 0 ? ($doc['completed'] / $total) * 100 : 0;
                        @endphp
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Progress</span>
                            <span class="text-sm font-black text-slate-800">{{ number_format($percentage, 0) }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden p-1">
                            <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-full rounded-full transition-all duration-1000" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Analitik Pendaftaran -->
    <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h3 class="text-xl font-black text-slate-800 tracking-tight">Analitik Pendaftaran</h3>
                <p class="text-[10px] font-bold text-slate-400 tracking-widest uppercase mt-1">Data 7 Hari Terakhir</p>
            </div>
            <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400">
                <i data-feather="activity" class="w-5 h-5"></i>
            </div>
        </div>
        <div class="h-64 flex items-end justify-between space-x-3 px-2">
            @foreach($analyticsData as $data)
                <div class="flex-1 flex flex-col items-center group">
                    <div class="relative w-full">
                        <div class="w-full bg-slate-50 rounded-2xl transition-all duration-500 overflow-hidden relative" style="height: 180px">
                            <div class="absolute bottom-0 w-full bg-gradient-to-t from-blue-700 to-blue-400 rounded-t-xl group-hover:from-blue-800 group-hover:to-blue-500 transition-all duration-500" style="height: {{ $data['height'] }}px">
                                <div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity bg-slate-800 text-white text-[10px] font-bold py-1 px-2 rounded-md whitespace-nowrap">
                                    {{ $data['total'] }} Peserta
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-slate-400 mt-4 uppercase tracking-tighter">{{ $data['date'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Log Aktivitas -->
    <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-xl font-black text-slate-800 tracking-tight">Log Aktivitas Terbaru</h3>
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500">
                <i data-feather="clock" class="w-5 h-5"></i>
            </div>
        </div>
        <div class="space-y-6">
            @forelse($recentOrganisasi as $org)
                <div class="flex items-start group">
                    <div class="relative mr-4">
                        <div class="w-10 h-10 bg-green-50 rounded-2xl flex items-center justify-center text-green-500 group-hover:bg-green-500 group-hover:text-white transition-all duration-300 shrink-0">
                            <i data-feather="home" class="w-5 h-5"></i>
                        </div>
                        @if(!$loop->last)
                            <div class="absolute top-10 left-1/2 -translate-x-1/2 w-[2px] h-6 bg-slate-100"></div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-black text-slate-800">Pendaftaran Organisasi</p>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest shrink-0 ml-4">{{ $org->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs font-bold text-slate-500 mt-1">{{ $org->nama_organisasi }}</p>
                        <p class="text-[10px] text-slate-400 uppercase tracking-wide mt-1">{{ $org->nama_sekolah }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-500 italic text-center py-10">Belum ada aktivitas</p>
            @endforelse
        </div>
        <div class="mt-8 pt-6 border-t border-slate-50 text-center">
            <a href="{{ route('sekolah.index') }}" class="text-[10px] font-black text-blue-500 uppercase tracking-widest hover:text-blue-600 transition-colors">Lihat Semua Organisasi</a>
        </div>
    </div>
</div>
@endsection
