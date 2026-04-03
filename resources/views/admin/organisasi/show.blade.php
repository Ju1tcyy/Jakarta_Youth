@extends('layouts.admin')

@section('title', 'Detail Organisasi')
@section('page-title', 'Profil Organisasi')

@section('content')
<div class="mb-8 flex items-center justify-between pt-6 relative z-10">
    <a href="{{ route('sekolah.index') }}" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-blue-500 transition-colors">
        <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
        Kembali ke Daftar
    </a>
    <div class="flex space-x-3">
        <form action="{{ route('sekolah.destroy', $organisasi->id) }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="button" id="delete-btn" class="inline-flex items-center px-4 py-2 bg-red-50 text-red-600 rounded-xl font-bold text-xs hover:bg-red-600 hover:text-white transition-all">
                <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>
                Hapus Data
            </button>
        </form>
        <a href="{{ route('sekolah.edit', $organisasi->id) }}" class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-xl font-bold text-xs shadow-lg shadow-blue-200 hover:scale-105 transition-all">
            <i data-feather="edit-3" class="w-4 h-4 mr-2"></i>
            {{ $organisasi->nilai ? 'Edit Penilaian' : 'Beri Penilaian' }}
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: Org Info -->
    <div class="lg:col-span-1 space-y-8">
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full-translate-x-10 -translate-y-10 opacity-50"></div>
            <div class="relative flex flex-col items-center">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-700 to-blue-500 rounded-[30px] flex items-center justify-center text-white text-4xl font-black shadow-xl mb-6">
                    {{ substr($organisasi->nama_organisasi, 0, 1) }}
                </div>
                <h3 class="text-xl font-black text-slate-800 text-center leading-tight">{{ $organisasi->nama_organisasi }}</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-2">{{ $organisasi->nama_sekolah }}</p>
                
                <div class="w-full h-[1px] bg-slate-50 my-6"></div>
                
                <div class="w-full space-y-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 mr-3">
                            <i data-feather="mail" class="w-4 h-4"></i>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email</p>
                            <p class="text-xs font-bold text-slate-700 truncate">{{ $organisasi->user->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 mr-3">
                            <i data-feather="phone" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nomor WhatsApp</p>
                            <p class="text-xs font-bold text-slate-700">{{ $organisasi->nomor_wa }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 mr-3">
                            <i data-feather="map-pin" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Alamat Sekolah</p>
                            <p class="text-xs font-bold text-slate-700">{{ $organisasi->alamat }}</p>
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
            @if($organisasi->nilai)
                <div class="flex items-baseline">
                    <span class="text-6xl font-black text-white tracking-tighter">{{ $organisasi->nilai }}</span>
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

    <!-- Right Column: Documents -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-[30px] p-8 shadow-sm border border-slate-100 h-full">
            <h3 class="text-lg font-black text-slate-800 mb-8 flex items-center border-b border-slate-50 pb-6">
                <i data-feather="file-text" class="w-5 h-5 mr-3 text-blue-500"></i>
                Berkas Pendukung Organisasi
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Surat Rekomendasi Sekolah -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 hover:border-blue-200 transition-all group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 mr-3 group-hover:bg-blue-500 group-hover:text-white transition-all">
                                <i data-feather="file-text" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-slate-800">Surat Rekomendasi Sekolah</h4>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dokumen PDF</p>
                            </div>
                        </div>
                        @if($organisasi->surat_rekomendasi)
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest">Tersedia</span>
                        @else
                            <span class="px-3 py-1 bg-slate-200 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-widest">Kosong</span>
                        @endif
                    </div>
                    @if($organisasi->surat_rekomendasi)
                        <a href="{{ Storage::url($organisasi->surat_rekomendasi) }}" target="_blank" class="inline-flex items-center text-xs font-bold text-blue-500 hover:text-blue-600 transition-colors">
                            <i data-feather="external-link" class="w-3 h-3 mr-1"></i>
                            Lihat Dokumen
                        </a>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum diupload</p>
                    @endif
                </div>

                <!-- Struktur Kepengurusan -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 hover:border-blue-200 transition-all group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 mr-3 group-hover:bg-blue-500 group-hover:text-white transition-all">
                                <i data-feather="file-text" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-slate-800">Struktur Kepengurusan</h4>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dokumen PDF</p>
                            </div>
                        </div>
                        @if($organisasi->struktur_kepengurusan)
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest">Tersedia</span>
                        @else
                            <span class="px-3 py-1 bg-slate-200 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-widest">Kosong</span>
                        @endif
                    </div>
                    @if($organisasi->struktur_kepengurusan)
                        <a href="{{ Storage::url($organisasi->struktur_kepengurusan) }}" target="_blank" class="inline-flex items-center text-xs font-bold text-blue-500 hover:text-blue-600 transition-colors">
                            <i data-feather="external-link" class="w-3 h-3 mr-1"></i>
                            Lihat Dokumen
                        </a>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum diupload</p>
                    @endif
                </div>

                <!-- Bukti Share IG Story -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 hover:border-blue-200 transition-all group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 mr-3 group-hover:bg-blue-500 group-hover:text-white transition-all">
                                <i data-feather="image" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-slate-800">Bukti Share IG Story</h4>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Screenshot</p>
                            </div>
                        </div>
                        @if($organisasi->buktishare)
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest">Tersedia</span>
                        @else
                            <span class="px-3 py-1 bg-slate-200 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-widest">Kosong</span>
                        @endif
                    </div>
                    @if($organisasi->buktishare)
                        <div class="flex flex-col gap-1">
                            @foreach($organisasi->buktishare as $index => $file)
                                <a href="{{ Storage::url($file) }}" target="_blank" class="inline-flex items-center text-xs font-bold text-blue-500 hover:text-blue-600 transition-colors">
                                    <i data-feather="external-link" class="w-3 h-3 mr-1"></i>
                                    Lihat Gambar #{{ $index + 1 }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum diupload</p>
                    @endif
                </div>

                <!-- Bukti Repost IG Feeds -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 hover:border-blue-200 transition-all group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 mr-3 group-hover:bg-blue-500 group-hover:text-white transition-all">
                                <i data-feather="image" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-slate-800">Bukti Repost IG Feeds</h4>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Screenshot</p>
                            </div>
                        </div>
                        @if($organisasi->buktirepost)
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest">Tersedia</span>
                        @else
                            <span class="px-3 py-1 bg-slate-200 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-widest">Kosong</span>
                        @endif
                    </div>
                    @if($organisasi->buktirepost)
                        <div class="flex flex-col gap-1">
                            @foreach($organisasi->buktirepost as $index => $file)
                                <a href="{{ Storage::url($file) }}" target="_blank" class="inline-flex items-center text-xs font-bold text-blue-500 hover:text-blue-600 transition-colors">
                                    <i data-feather="external-link" class="w-3 h-3 mr-1"></i>
                                    Lihat Gambar #{{ $index + 1 }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-400 italic">Belum diupload</p>
                    @endif
                </div>
            </div>
            
            <div class="mt-12 p-8 bg-slate-50 rounded-[30px] border border-dashed border-slate-200 text-center">
                <h4 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-2">Instruksi Verifikasi</h4>
                <p class="text-xs text-slate-500 leading-relaxed max-w-lg mx-auto font-medium">
                    Mohon periksa keaslian dokumen di atas sebelum memberikan skor. Isi form penilaian di bawah.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- PASSWORD RESET FORM --}}
<div class="mt-8 bg-white rounded-[30px] p-8 shadow-sm border border-slate-100">
    <h3 class="text-sm font-black text-slate-800 mb-6 flex items-center uppercase tracking-widest border-b border-slate-50 pb-4">
        <i data-feather="key" class="w-4 h-4 mr-3 text-red-500"></i>
        Ubah Password Peserta / Organisasi
    </h3>
    <form action="{{ route('sekolah.password', $organisasi->user->id) }}" method="POST" class="flex flex-col sm:flex-row gap-4">
        @csrf
        @method('PUT')
        <div class="flex-1 relative">
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"><i data-feather="lock" class="w-4 h-4"></i></div>
            <input type="text" name="password" placeholder="Ketik password baru..." class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-sm font-bold focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all" required minlength="8">
        </div>
        <button type="submit" class="px-6 py-3 bg-slate-900 text-white rounded-xl font-bold text-xs uppercase hover:bg-black transition-all flex items-center shadow-lg shadow-slate-200">
            Ganti Password
        </button>
    </form>
</div>

{{-- SCORING FORM --}}
<div class="mt-8">
    @php
        $penilaian = \App\Models\Penilaian::where('organisasi_id', $organisasi->id)
            ->where('juri_id', auth()->id())
            ->first();
    @endphp
    @include('juri._scoring_form', [
        'formAction' => route('sekolah.nilai', $organisasi->id),
        'backUrl'    => route('sekolah.show', $organisasi->id),
    ])
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
