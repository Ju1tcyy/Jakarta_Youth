@extends('layouts.admin')

@section('title', 'Data Ketos')
@section('page-title', 'Data Pendaftaran Ketos')

@section('content')
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Asal Sekolah</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status Nominasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nilai</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Daftar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($ketos as $index => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $ketos->firstItem() + $index }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->nama }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->asal_sekolah }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex space-x-1">
                                                <!-- Innovation -->
                                                <span title="Outstanding Innovation" class="text-lg">
                                                    @if($item->portofolio_program_kerja && $item->google_form_kepuasan)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </span>
                                                <!-- Social Impact -->
                                                <span title="Social Impact" class="text-lg">
                                                    @if($item->portofolio_kegiatan_sosial && $item->google_form_kepuasan_sosial)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </span>
                                                <!-- Media -->
                                                <span title="Media" class="text-lg">
                                                    @if($item->portofolio_sosial_media && $item->google_form_kepuasan_media)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </span>
                                                <!-- Video Reels -->
                                                <span title="Video Reels" class="text-lg">
                                                    @if($item->link_instagram_reels && $item->google_form_kepuasan_reels)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </span>
                                                <!-- President 2026 -->
                                                <span title="President 2026" class="text-lg">
                                                    @if($item->pas_foto_formal && $item->curriculum_vitae && $item->fotokopi_rapor && $item->video_profil_jakarta && $item->portofolio_inovasi && $item->esai_solusi_kepemimpinan && $item->google_form_kepuasan_president && $item->surat_pernyataan_kedisiplinan)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1">
                                                {{ 
                                                    collect([
                                                        $item->portofolio_program_kerja && $item->google_form_kepuasan,
                                                        $item->portofolio_kegiatan_sosial && $item->google_form_kepuasan_sosial,
                                                        $item->portofolio_sosial_media && $item->google_form_kepuasan_media,
                                                        $item->link_instagram_reels && $item->google_form_kepuasan_reels,
                                                        $item->pas_foto_formal && $item->curriculum_vitae && $item->fotokopi_rapor && $item->video_profil_jakarta && $item->portofolio_inovasi && $item->esai_solusi_kepemimpinan && $item->google_form_kepuasan_president && $item->surat_pernyataan_kedisiplinan
                                                    ])->filter()->count() 
                                                }}/5 Lengkap
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="space-y-1">
                                                @if($item->nilai)
                                                    <div class="font-bold text-blue-600">Keseluruhan: {{ $item->nilai }}</div>
                                                @endif
                                                <div class="flex space-x-2 text-xs">
                                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded" title="Innovation">
                                                        🏆 {{ $item->nilai_innovation ?? '-' }}
                                                    </span>
                                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded" title="Social Impact">
                                                        🤝 {{ $item->nilai_social_impact ?? '-' }}
                                                    </span>
                                                </div>
                                                <div class="flex space-x-2 text-xs">
                                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded" title="Media">
                                                        📱 {{ $item->nilai_media ?? '-' }}
                                                    </span>
                                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded" title="Video Reels">
                                                        🎬 {{ $item->nilai_video_reels ?? '-' }}
                                                    </span>
                                                </div>
                                                <div class="flex space-x-2 text-xs">
                                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded" title="President 2026">
                                                        👑 {{ $item->nilai_president ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('ketos.show', $item->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>
                                            <form action="{{ route('ketos.destroy', $item->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data pendaftaran</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $ketos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
