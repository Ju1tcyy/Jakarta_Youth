@extends('layouts.admin')

@section('title', 'Data Organisasi')
@section('page-title', 'Pendaftaran Organisasi')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-slate-500 font-medium ml-1">Kelola dan verifikasi semua pendaftar kategori Organisasi Sekolah Terbaik.</p>
</div>

<div class="bg-white rounded-[30px] shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">No</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Informasi Organisasi</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Kontak</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Skor Akhir</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Tanggal</th>
                    <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($organisasi as $index => $item)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4 text-sm font-bold text-slate-400">{{ $organisasi->firstItem() + $index }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 font-black mr-3 shadow-sm">
                                    {{ substr($item->nama_organisasi, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-slate-800 leading-tight">{{ $item->nama_organisasi }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter mt-0.5">{{ $item->nama_sekolah }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-bold text-slate-600 leading-tight">{{ $item->email_organisasi }}</p>
                            <div class="flex items-center mt-1 text-slate-400">
                                <i data-feather="phone" class="w-3 h-3 mr-1"></i>
                                <span class="text-[10px] font-bold">{{ $item->nomor_wa }}</span>
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
                            <p class="text-[10px] text-slate-400 mt-0.5 tracking-tighter">{{ $item->created_at->format('Y') }}</p>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('sekolah.show', $item->id) }}" class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm" title="Lihat Detail">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('sekolah.destroy', $item->id) }}" method="POST" class="delete-form">
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
                        <td colspan="6" class="px-6 py-20 text-center">
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
    
    @if($organisasi->hasPages())
        <div class="px-6 py-6 border-t border-slate-50 bg-slate-50/30">
            {{ $organisasi->links() }}
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
