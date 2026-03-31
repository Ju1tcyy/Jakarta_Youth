@extends('layouts.admin')

@section('title', 'Penilaian Organisasi')
@section('page-title', 'Form Penilaian')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <a href="{{ route('sekolah.show', $organisasi->id) }}" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-orange-500 transition-colors">
        <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
        Kembali ke Detail
    </a>
</div>

<div class="max-w-3xl mx-auto">
    <form action="{{ route('sekolah.update', $organisasi->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Profile Header -->
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 flex items-center">
            <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 font-black text-2xl mr-6 shrink-0">
                {{ substr($organisasi->nama_organisasi, 0, 1) }}
            </div>
            <div>
                <h3 class="text-xl font-black text-slate-800 leading-tight uppercase tracking-tight">{{ $organisasi->nama_organisasi }}</h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $organisasi->nama_sekolah }}</p>
            </div>
        </div>

        <!-- Input Section -->
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
            <h3 class="text-lg font-black text-slate-800 mb-8 flex items-center">
                <i data-feather="star" class="w-5 h-5 mr-3 text-orange-500"></i>
                Input Skor Akhir
            </h3>

            <div class="space-y-8">
                <div>
                    <label for="nilai" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 text-center">Evaluasi Kelengkapan & Kualitas Berkas</label>
                    <div class="relative max-w-sm mx-auto">
                        <input 
                            type="number" 
                            id="nilai" 
                            name="nilai" 
                            min="0" 
                            max="100"
                            value="{{ old('nilai', $organisasi->nilai) }}"
                            class="w-full bg-slate-50 border-2 border-slate-50 rounded-[40px] p-8 text-6xl font-black text-slate-800 focus:bg-white focus:border-green-400 focus:ring-0 transition-all outline-none text-center shadow-inner"
                            placeholder="0"
                            required
                        >
                        <div class="absolute right-8 top-1/2 -translate-y-1/2 text-slate-300 font-black text-2xl uppercase tracking-tighter">/100</div>
                    </div>
                    @error('nilai')
                        <p class="text-red-500 text-[10px] font-bold mt-4 text-center uppercase tracking-wide">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-slate-50 rounded-[20px] p-6 border border-dashed border-slate-200 text-center">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-relaxed">
                        Evaluasi meliputi: Surat Rekomendasi, Struktur Kepengurusan, dan Aktivitas Media Sosial (Repost & Story).
                    </p>
                </div>

                <div class="pt-8 flex items-center justify-center space-x-4">
                    <a href="{{ route('sekolah.show', $organisasi->id) }}" class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Batal</a>
                    <button type="submit" class="px-12 py-5 bg-slate-900 text-white rounded-[25px] font-black text-xs uppercase tracking-widest hover:bg-black hover:scale-105 transition-all shadow-2xl shadow-slate-200">
                        Simpan Skor Akhir
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
