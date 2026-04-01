@extends('layouts.admin')

@php
    $kategoriLabel = match($kategori) {
        'innovation'    => '🏆 Innovation Leaderboard',
        'social_impact' => '🤝 Social Impact Leaderboard',
        'media'         => '📱 Media Leaderboard',
        'video_reels'   => '🎬 Video Reels Leaderboard',
        'president'     => '👑 President Leaderboard',
        default         => 'Leaderboard',
    };
@endphp

@section('title', $kategoriLabel)
@section('page-title', $kategoriLabel)

@section('content')
<div class="mb-6">
    <p class="text-slate-500 font-medium">Peringkat ini dihitung berdasarkan rata-rata skor dari seluruh juri yang menilai kategori ini.</p>
</div>

<div class="bg-white rounded-[28px] shadow-sm border border-slate-100 overflow-hidden">
    @if($organisasis->isEmpty())
        <div class="py-24 text-center">
            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-feather="bar-chart-2" class="w-8 h-8 text-slate-300"></i>
            </div>
            <h3 class="text-lg font-black text-slate-800 mb-1">Belum Ada Penilaian</h3>
            <p class="text-slate-500 text-sm font-medium">Belum ada peserta yang dinilai oleh juri untuk kategori ini.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-widest w-24 text-center">Rank</th>
                        <th class="px-4 py-5 text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Organisasi & Sekolah</th>
                        <th class="px-8 py-5 text-center text-[11px] font-black text-slate-400 uppercase tracking-widest w-40">Rata-rata Skor</th>
                        <th class="px-8 py-5 text-center text-[11px] font-black text-slate-400 uppercase tracking-widest w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organisasis as $index => $org)
                    <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-6 text-center">
                            @if($index === 0)
                                <div class="w-10 h-10 mx-auto rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-black text-lg shadow-sm font-outfit border border-yellow-200">1</div>
                            @elseif($index === 1)
                                <div class="w-10 h-10 mx-auto rounded-full bg-slate-100 text-slate-500 flex items-center justify-center font-black text-lg shadow-sm font-outfit border border-slate-200">2</div>
                            @elseif($index === 2)
                                <div class="w-10 h-10 mx-auto rounded-full bg-orange-50 text-orange-600 flex items-center justify-center font-black text-lg shadow-sm font-outfit border border-orange-100">3</div>
                            @else
                                <div class="w-10 h-10 mx-auto rounded-full bg-slate-50 text-slate-400 flex items-center justify-center font-black text-lg font-outfit">{{ $index + 1 }}</div>
                            @endif
                        </td>
                        <td class="px-4 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-[14px] flex items-center justify-center text-white font-black text-lg shadow-md shrink-0">
                                    {{ substr($org->nama_organisasi, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-base mb-0.5">{{ $org->nama_organisasi }}</h4>
                                    <p class="text-xs text-slate-500 font-medium">{{ $org->nama_sekolah }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <div class="inline-flex items-baseline">
                                <span class="font-outfit font-black text-3xl text-indigo-600">{{ number_format($org->avg_skor, 2) }}</span>
                                <span class="text-sm font-bold text-slate-400 ml-1">/100</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <a href="{{ route('sekolah.show', $org->id) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-100 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                <i data-feather="eye" class="w-4 h-4"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
