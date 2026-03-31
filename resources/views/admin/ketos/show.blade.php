@extends('layouts.admin')

@section('title', 'Detail Ketos')
@section('page-title', 'Profil Pendaftar')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <a href="{{ route('ketos.index') }}" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-blue-500 transition-colors">
        <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
        Kembali ke Daftar
    </a>
    <div class="flex space-x-3">
        <form action="{{ route('ketos.destroy', $ketos->id) }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="button" id="delete-btn" class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-xl font-bold text-xs hover:bg-red-600 hover:text-white transition-all">
                <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>
                Hapus Data
            </button>
        </form>
        <a href="{{ route('ketos.edit', $ketos->id) }}" class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-xl font-bold text-xs shadow-lg shadow-blue-200 hover:scale-105 transition-all">
            <i data-feather="edit-3" class="w-4 h-4 mr-2"></i>
            {{ $ketos->nilai ? 'Edit Penilaian' : 'Beri Penilaian' }}
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: Personal Info -->
    <div class="lg:col-span-1 space-y-8">
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full-translate-x-10 -translate-y-10 opacity-50"></div>
            <div class="relative flex flex-col items-center">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-700 to-blue-500 rounded-[30px] flex items-center justify-center text-white text-4xl font-black shadow-xl mb-6">
                    {{ substr($item->nama ?? $ketos->nama, 0, 1) }}
                </div>
                <h3 class="text-xl font-black text-slate-800 text-center leading-tight">{{ $ketos->nama }}</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-2">{{ $ketos->asal_sekolah }}</p>
                
                <div class="w-full h-[1px] bg-slate-50 my-6"></div>
                
                <div class="w-full space-y-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 mr-3">
                            <i data-feather="mail" class="w-4 h-4"></i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email</p>
                            <p class="text-xs font-bold text-slate-700 truncate">{{ $ketos->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 mr-3">
                            <i data-feather="phone" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">WhatsApp</p>
                            <p class="text-xs font-bold text-slate-700">{{ $ketos->nomor_wa }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 mr-3">
                            <i data-feather="calendar" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">TTL</p>
                            <p class="text-xs font-bold text-slate-700">{{ $ketos->tempat_lahir }}, {{ $ketos->tanggal_lahir->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overall Score Card -->
        <div class="bg-slate-900 rounded-[30px] p-8 shadow-2xl relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:scale-110 transition-transform duration-700">
                <i data-feather="award" class="w-32 h-32 text-blue-500"></i>
            </div>
            <h4 class="text-[10px] font-black text-blue-400 uppercase tracking-[0.2em] mb-2">Skor Kumulatif</h4>
            @if($ketos->nilai)
                <div class="flex items-baseline">
                    <span class="text-6xl font-black text-white tracking-tighter">{{ $ketos->nilai }}</span>
                    <span class="text-xl font-bold text-slate-500 ml-2">/100</span>
                </div>
            @else
                <p class="text-xl font-black text-slate-500 italic mt-2">Belum Dinilai</p>
            @endif
            <div class="mt-6 flex items-center text-xs font-bold">
                <span class="text-slate-400">Status Seleksi:</span>
                <span class="ml-2 text-green-400 uppercase tracking-widest">Aktif</span>
            </div>
        </div>
    </div>

    <!-- Right Column: Scores and Nominations -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Sub-Scores -->
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
            <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center">
                <i data-feather="bar-chart" class="w-5 h-5 mr-3 text-blue-500"></i>
                Detail Penilaian Kategori
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    $scores = [
                        ['name' => 'Innovation', 'val' => $ketos->nilai_innovation, 'icon' => '🏆', 'color' => 'blue'],
                        ['name' => 'Social Impact', 'val' => $ketos->nilai_social_impact, 'icon' => '🤝', 'color' => 'green'],
                        ['name' => 'Media', 'val' => $ketos->nilai_media, 'icon' => '📱', 'color' => 'purple'],
                        ['name' => 'Video Reels', 'val' => $ketos->nilai_video_reels, 'icon' => '🎬', 'color' => 'red'],
                        ['name' => 'President', 'val' => $ketos->nilai_president, 'icon' => '👑', 'color' => 'yellow'],
                    ];
                @endphp

                @foreach($scores as $s)
                    <div class="bg-{{ $s['color'] }}-50/50 border border-{{ $s['color'] }}-100 p-4 rounded-2xl flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-2xl mr-3">{{ $s['icon'] }}</span>
                            <span class="text-xs font-black text-slate-600 uppercase tracking-wider">{{ $s['name'] }}</span>
                        </div>
                        <span class="text-xl font-black text-{{ $s['color'] }}-600">{{ $s['val'] ?? '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Documents -->
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
            <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center">
                <i data-feather="file-text" class="w-5 h-5 mr-3 text-blue-500"></i>
                Berkas & Portofolio
            </h3>
            
            <div class="space-y-6">
                <!-- Group 1: Innovation -->
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Nominasi Innovation</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @include('admin.ketos.partials.doc-item', ['label' => 'Portofolio Program Kerja', 'file' => $ketos->portofolio_program_kerja])
                        @include('admin.ketos.partials.doc-item', ['label' => 'Link Google Form Kepuasan', 'url' => $ketos->google_form_kepuasan])
                    </div>
                </div>

                <!-- Group 2: Social -->
                <div class="pt-4 border-t border-slate-50">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Nominasi Social Impact</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @include('admin.ketos.partials.doc-item', ['label' => 'Portofolio Kegiatan Sosial', 'file' => $ketos->portofolio_kegiatan_sosial])
                        @include('admin.ketos.partials.doc-item', ['label' => 'Link Google Form Kepuasan', 'url' => $ketos->google_form_kepuasan_sosial])
                    </div>
                </div>

                <!-- Group 3: Media -->
                <div class="pt-4 border-t border-slate-50">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Nominasi Media & Reels</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @include('admin.ketos.partials.doc-item', ['label' => 'Portofolio Sosial Media', 'file' => $ketos->portofolio_sosial_media])
                        @include('admin.ketos.partials.doc-item', ['label' => 'Instagram Reels (Link)', 'url' => $ketos->link_instagram_reels])
                    </div>
                </div>

                <!-- Group 4: President -->
                <div class="pt-4 border-t border-slate-50">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Nominasi President Level</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @include('admin.ketos.partials.doc-item', ['label' => 'Pas Foto Formal', 'file' => $ketos->pas_foto_formal])
                        @include('admin.ketos.partials.doc-item', ['label' => 'Curriculum Vitae', 'file' => $ketos->curriculum_vitae])
                        @include('admin.ketos.partials.doc-item', ['label' => 'Fotokopi Rapor', 'file' => $ketos->fotokopi_rapor])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('delete-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Hapus Peserta?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e53e3e',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        })
    });
</script>
@endsection
