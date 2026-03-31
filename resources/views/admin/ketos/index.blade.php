@extends('layouts.admin')

@section('title', 'Data Ketos')
@section('page-title', 'Pendaftaran Ketos')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-slate-500 font-medium ml-1">Kelola dan verifikasi semua pendaftar kategori Ketua OSIS Terbaik.</p>
</div>

<div class="bg-white rounded-[30px] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">No</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Peserta</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Kontak</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status Berkas</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Skor Akhir</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Tanggal</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($ketos as $index => $item)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4 text-sm font-bold text-slate-400">{{ $ketos->firstItem() + $index }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 font-black mr-3 shadow-sm">
                                    {{ substr($item->nama, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-slate-800 leading-tight">{{ $item->nama }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter mt-0.5">{{ $item->asal_sekolah }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-bold text-slate-600">{{ $item->email }}</p>
                            <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-widest">Official Email</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-1.5 mb-2">
                                @php
                                    $nominations = [
                                        ['title' => 'Innovation', 'icon' => '🏆', 'status' => ($item->portofolio_program_kerja && $item->google_form_kepuasan)],
                                        ['title' => 'Social', 'icon' => '🤝', 'status' => ($item->portofolio_kegiatan_sosial && $item->google_form_kepuasan_sosial)],
                                        ['title' => 'Media', 'icon' => '📱', 'status' => ($item->portofolio_sosial_media && $item->google_form_kepuasan_media)],
                                        ['title' => 'Reels', 'icon' => '🎬', 'status' => ($item->link_instagram_reels && $item->google_form_kepuasan_reels)],
                                        ['title' => 'President', 'icon' => '👑', 'status' => ($item->pas_foto_formal && $item->curriculum_vitae && $item->video_profil_jakarta)],
                                    ];
                                @endphp
                                @foreach($nominations as $nom)
                                    <div class="w-7 h-7 rounded-lg flex items-center justify-center text-xs {{ $nom['status'] ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-300' }}" title="{{ $nom['title'] }}">
                                        {{ $nom['icon'] }}
                                    </div>
                                @endforeach
                            </div>
                            @php
                                $count = collect([
                                    $item->portofolio_program_kerja && $item->google_form_kepuasan,
                                    $item->portofolio_kegiatan_sosial && $item->google_form_kepuasan_sosial,
                                    $item->portofolio_sosial_media && $item->google_form_kepuasan_media,
                                    $item->link_instagram_reels && $item->google_form_kepuasan_reels,
                                    $item->pas_foto_formal && $item->curriculum_vitae && $item->video_profil_jakarta && $item->portofolio_inovasi && $item->esai_solusi_kepemimpinan && $item->google_form_kepuasan_president && $item->surat_pernyataan_kedisiplinan
                                ])->filter()->count();
                            @endphp
                            <div class="flex items-center justify-center space-x-2">
                                <div class="w-16 bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="h-full {{ $count == 5 ? 'bg-green-500' : 'bg-blue-500' }}" style="width: {{ ($count/5)*100 }}%"></div>
                                </div>
                                <span class="text-[10px] font-black {{ $count == 5 ? 'text-green-600' : 'text-slate-400' }}">{{ $count }}/5</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->nilai)
                                <div class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-2xl">
                                    <i data-feather="bar-chart-2" class="w-3 h-3 mr-2"></i>
                                    <span class="text-sm font-black">{{ $item->nilai }}</span>
                                </div>
                            @else
                                <span class="text-[10px] font-bold text-slate-300 uppercase italic">Belum Dinilai</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-xs font-bold text-slate-600">{{ $item->created_at->format('d M') }}</span>
                            <p class="text-[10px] text-slate-400 mt-0.5">{{ $item->created_at->format('Y') }}</p>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('ketos.show', $item->id) }}" class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm" title="Lihat Detail">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('ketos.destroy', $item->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all delete-btn shadow-sm" title="Hapus">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-200 mb-4 border border-slate-100">
                                    <i data-feather="database" class="w-8 h-8"></i>
                                </div>
                                <p class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Belum ada data pendaftar</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($ketos->hasPages())
        <div class="px-6 py-6 border-t border-slate-50 bg-slate-50/30">
            {{ $ketos->links() }}
        </div>
    @endif
</div>

<script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus Data?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    title: 'font-outfit',
                    content: 'font-inter'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
