<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Ketos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <a href="{{ route('ketos.index') }}" class="text-blue-600 hover:text-blue-900">← Kembali</a>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nama Lengkap:</label>
                            <p class="mt-1">{{ $ketos->nama }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Asal Sekolah:</label>
                            <p class="mt-1">{{ $ketos->asal_sekolah }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Email:</label>
                            <p class="mt-1">{{ $ketos->email }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Tempat, Tanggal Lahir:</label>
                            <p class="mt-1">{{ $ketos->tempat_lahir }}, {{ $ketos->tanggal_lahir->format('d F Y') }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nomor WhatsApp:</label>
                            <p class="mt-1">{{ $ketos->nomor_wa }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nilai Keseluruhan:</label>
                            <p class="mt-1">
                                @if($ketos->nilai)
                                    <span class="text-2xl font-bold text-blue-600">{{ $ketos->nilai }}</span>
                                @else
                                    <span class="text-gray-400">Belum ada nilai</span>
                                @endif
                            </p>
                        </div>

                        <!-- Individual Category Scores -->
                        <div class="border-t pt-4">
                            <label class="font-semibold text-gray-700 dark:text-gray-300 mb-3 block">Nilai Per Kategori:</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg">
                                    <div class="text-sm font-medium text-blue-800 dark:text-blue-200">🏆 Innovation</div>
                                    <div class="text-xl font-bold text-blue-600">
                                        {{ $ketos->nilai_innovation ?? '-' }}
                                    </div>
                                </div>
                                <div class="bg-green-50 dark:bg-green-900 p-3 rounded-lg">
                                    <div class="text-sm font-medium text-green-800 dark:text-green-200">🤝 Social Impact</div>
                                    <div class="text-xl font-bold text-green-600">
                                        {{ $ketos->nilai_social_impact ?? '-' }}
                                    </div>
                                </div>
                                <div class="bg-purple-50 dark:bg-purple-900 p-3 rounded-lg">
                                    <div class="text-sm font-medium text-purple-800 dark:text-purple-200">📱 Media</div>
                                    <div class="text-xl font-bold text-purple-600">
                                        {{ $ketos->nilai_media ?? '-' }}
                                    </div>
                                </div>
                                <div class="bg-red-50 dark:bg-red-900 p-3 rounded-lg">
                                    <div class="text-sm font-medium text-red-800 dark:text-red-200">🎬 Video Reels</div>
                                    <div class="text-xl font-bold text-red-600">
                                        {{ $ketos->nilai_video_reels ?? '-' }}
                                    </div>
                                </div>
                                <div class="bg-yellow-50 dark:bg-yellow-900 p-3 rounded-lg md:col-span-2 lg:col-span-1">
                                    <div class="text-sm font-medium text-yellow-800 dark:text-yellow-200">👑 President 2026</div>
                                    <div class="text-xl font-bold text-yellow-600">
                                        {{ $ketos->nilai_president ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Tanggal Pendaftaran:</label>
                            <p class="mt-1">{{ $ketos->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Nominations Section -->
                    <div class="mt-8 border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Status Nominasi</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nomination 1: Outstanding Student Council Innovation -->
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-600 mb-3">🏆 Outstanding Student Council Innovation</h4>
                                <div class="space-y-2 text-sm">
                                    <div>
                                        <span class="font-medium">Portofolio Program Kerja:</span>
                                        @if($ketos->portofolio_program_kerja)
                                            <a href="{{ asset('storage/' . $ketos->portofolio_program_kerja) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">Google Form Kepuasan:</span>
                                        @if($ketos->google_form_kepuasan)
                                            <a href="{{ $ketos->google_form_kepuasan }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Nomination 2: Leading Student Council Social Impact -->
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-600 mb-3">🤝 Leading Student Council Social Impact</h4>
                                <div class="space-y-2 text-sm">
                                    <div>
                                        <span class="font-medium">Portofolio Kegiatan Sosial:</span>
                                        @if($ketos->portofolio_kegiatan_sosial)
                                            <a href="{{ asset('storage/' . $ketos->portofolio_kegiatan_sosial) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">Google Form Kepuasan:</span>
                                        @if($ketos->google_form_kepuasan_sosial)
                                            <a href="{{ $ketos->google_form_kepuasan_sosial }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Nomination 3: Next-Level Student Council Media -->
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-600 mb-3">📱 Next-Level Student Council Media</h4>
                                <div class="space-y-2 text-sm">
                                    <div>
                                        <span class="font-medium">Portofolio Sosial Media:</span>
                                        @if($ketos->portofolio_sosial_media)
                                            <a href="{{ asset('storage/' . $ketos->portofolio_sosial_media) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">Google Form Kepuasan:</span>
                                        @if($ketos->google_form_kepuasan_media)
                                            <a href="{{ $ketos->google_form_kepuasan_media }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Nomination 4: Video IG Reels -->
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-600 mb-3">🎬 Video IG Reels</h4>
                                <div class="space-y-2 text-sm">
                                    <div>
                                        <span class="font-medium">Link Instagram Reels:</span>
                                        @if($ketos->link_instagram_reels)
                                            <a href="{{ $ketos->link_instagram_reels }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">Google Form Kepuasan:</span>
                                        @if($ketos->google_form_kepuasan_reels)
                                            <a href="{{ $ketos->google_form_kepuasan_reels }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                        @else
                                            <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Nomination 5: Student Council President of the Year 2026 -->
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg md:col-span-2">
                                <h4 class="font-semibold text-blue-600 mb-3">👑 Student Council President of the Year 2026</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div class="space-y-2">
                                        <div>
                                            <span class="font-medium">Pas Foto Formal:</span>
                                            @if($ketos->pas_foto_formal)
                                                <a href="{{ asset('storage/' . $ketos->pas_foto_formal) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-medium">Curriculum Vitae:</span>
                                            @if($ketos->curriculum_vitae)
                                                <a href="{{ asset('storage/' . $ketos->curriculum_vitae) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-medium">Fotokopi Rapor:</span>
                                            @if($ketos->fotokopi_rapor)
                                                <a href="{{ asset('storage/' . $ketos->fotokopi_rapor) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-medium">Video Profil Jakarta:</span>
                                            @if($ketos->video_profil_jakarta)
                                                <a href="{{ $ketos->video_profil_jakarta }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <div>
                                            <span class="font-medium">Portofolio Inovasi:</span>
                                            @if($ketos->portofolio_inovasi)
                                                <a href="{{ asset('storage/' . $ketos->portofolio_inovasi) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-medium">Esai Solusi Kepemimpinan:</span>
                                            @if($ketos->esai_solusi_kepemimpinan)
                                                <a href="{{ asset('storage/' . $ketos->esai_solusi_kepemimpinan) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-medium">Google Form Kepuasan:</span>
                                            @if($ketos->google_form_kepuasan_president)
                                                <a href="{{ $ketos->google_form_kepuasan_president }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="font-medium">Surat Kedisiplinan:</span>
                                            @if($ketos->surat_pernyataan_kedisiplinan)
                                                <a href="{{ asset('storage/' . $ketos->surat_pernyataan_kedisiplinan) }}" target="_blank" class="text-green-600 ml-2">✅ Tersedia</a>
                                            @else
                                                <span class="text-red-500 ml-2">❌ Belum Upload</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nomination Summary -->
                        <div class="mt-6 bg-blue-50 dark:bg-blue-900 p-4 rounded-lg">
                            <h5 class="font-semibold text-blue-800 dark:text-blue-200 mb-2">Ringkasan Status Nominasi</h5>
                            <div class="grid grid-cols-5 gap-2 text-sm">
                                <div class="text-center">
                                    <div class="text-2xl mb-1">
                                        @if($ketos->portofolio_program_kerja && $ketos->google_form_kepuasan)
                                            ✅
                                        @else
                                            ❌
                                        @endif
                                    </div>
                                    <div class="text-xs">Innovation</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">
                                        @if($ketos->portofolio_kegiatan_sosial && $ketos->google_form_kepuasan_sosial)
                                            ✅
                                        @else
                                            ❌
                                        @endif
                                    </div>
                                    <div class="text-xs">Social Impact</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">
                                        @if($ketos->portofolio_sosial_media && $ketos->google_form_kepuasan_media)
                                            ✅
                                        @else
                                            ❌
                                        @endif
                                    </div>
                                    <div class="text-xs">Media</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">
                                        @if($ketos->link_instagram_reels && $ketos->google_form_kepuasan_reels)
                                            ✅
                                        @else
                                            ❌
                                        @endif
                                    </div>
                                    <div class="text-xs">Video Reels</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl mb-1">
                                        @if($ketos->pas_foto_formal && $ketos->curriculum_vitae && $ketos->fotokopi_rapor && $ketos->video_profil_jakarta && $ketos->portofolio_inovasi && $ketos->esai_solusi_kepemimpinan && $ketos->google_form_kepuasan_president && $ketos->surat_pernyataan_kedisiplinan)
                                            ✅
                                        @else
                                            ❌
                                        @endif
                                    </div>
                                    <div class="text-xs">President 2026</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('ketos.edit', $ketos->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            {{ $ketos->nilai || $ketos->nilai_innovation || $ketos->nilai_social_impact || $ketos->nilai_media || $ketos->nilai_video_reels || $ketos->nilai_president ? 'Edit Penilaian' : 'Tambah Penilaian' }}
                        </a>
                        <form action="{{ route('ketos.destroy', $ketos->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded" onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
