@extends('layouts.admin')

@section('title', 'Penilaian Ketos')
@section('page-title', 'Form Penilaian')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <a href="{{ route('ketos.show', $ketos->id) }}" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-orange-500 transition-colors">
        <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
        Kembali ke Detail
    </a>
</div>

<div class="max-w-4xl mx-auto">
    <form action="{{ route('ketos.update', $ketos->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Header Info Card -->
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 flex items-center">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 font-black text-2xl mr-6 shrink-0">
                {{ substr($ketos->nama, 0, 1) }}
            </div>
            <div>
                <h3 class="text-xl font-black text-slate-800 leading-tight uppercase tracking-tight">{{ $ketos->nama }}</h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $ketos->asal_sekolah }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Score -->
            <div class="lg:col-span-1">
                <div class="bg-slate-900 rounded-[30px] p-8 shadow-xl sticky top-24">
                    <h4 class="text-[10px] font-black text-orange-400 uppercase tracking-[0.2em] mb-6">Skor Akhir (Auto)</h4>
                    <div class="space-y-6">
                        <div>
                            <label for="nilai" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Total Akumulasi</label>
                            <input 
                                type="number" 
                                id="nilai" 
                                name="nilai" 
                                min="0" 
                                max="100"
                                value="{{ old('nilai', $ketos->nilai) }}"
                                class="w-full bg-slate-800 border-none rounded-2xl p-6 text-4xl font-black text-white focus:ring-2 focus:ring-orange-500 transition-all text-center"
                                placeholder="0"
                            >
                            @error('nilai')
                                <p class="text-red-400 text-[10px] font-bold mt-2 uppercase tracking-wide">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="text-[10px] text-slate-500 font-medium leading-relaxed italic text-center">
                            *Masukkan nilai akumulasi akhir atau biarkan sistem menghitung rata-ratanya nanti.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category Scores -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
                    <h3 class="text-lg font-black text-slate-800 mb-8 flex items-center px-2">
                        <i data-feather="edit-3" class="w-5 h-5 mr-3 text-orange-500"></i>
                        Input Nilai Per Kategori
                    </h3>

                    <div class="space-y-6">
                        @php
                            $fields = [
                                ['id' => 'nilai_innovation', 'label' => 'Outstanding Innovation', 'icon' => '🏆', 'color' => 'blue'],
                                ['id' => 'nilai_social_impact', 'label' => 'Social Impact', 'icon' => '🤝', 'color' => 'green'],
                                ['id' => 'nilai_media', 'label' => 'Next-Level Media', 'icon' => '📱', 'color' => 'purple'],
                                ['id' => 'nilai_video_reels', 'label' => 'Video Reels', 'icon' => '🎬', 'color' => 'red'],
                                ['id' => 'nilai_president', 'label' => 'President 2026', 'icon' => '👑', 'color' => 'yellow'],
                            ];
                        @endphp

                        @foreach($fields as $f)
                            <div class="group">
                                <label for="{{ $f['id'] }}" class="flex items-center text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-2 group-hover:text-{{ $f['color'] }}-600 transition-colors">
                                    <span class="mr-2">{{ $f['icon'] }}</span>
                                    {{ $f['label'] }}
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="{{ $f['id'] }}" 
                                        name="{{ $f['id'] }}" 
                                        min="0" 
                                        max="100"
                                        value="{{ old($f['id'], $ketos->{$f['id']}) }}"
                                        class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl p-4 text-xl font-black text-slate-800 focus:bg-white focus:border-{{ $f['color'] }}-400 focus:ring-0 transition-all outline-none pl-12"
                                        placeholder="0"
                                    >
                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 font-black text-lg">#</div>
                                </div>
                                @error($f['id'])
                                    <p class="text-red-500 text-[10px] font-bold mt-1.5 ml-2 uppercase tracking-wide">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10 pt-8 border-t border-slate-50 flex items-center justify-end space-x-4">
                        <a href="{{ route('ketos.show', $ketos->id) }}" class="px-6 py-3 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Batal</a>
                        <button type="submit" class="px-10 py-4 bg-slate-900 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-black hover:scale-105 transition-all shadow-xl shadow-slate-200">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
