<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Penilaian Ketos - {{ $ketos->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <a href="{{ route('ketos.show', $ketos->id) }}" class="text-blue-600 hover:text-blue-900">← Kembali</a>
                    </div>

                    <form action="{{ route('ketos.update', $ketos->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama:</label>
                            <p class="text-gray-600 dark:text-gray-400">{{ $ketos->nama }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">Asal Sekolah:</label>
                            <p class="text-gray-600 dark:text-gray-400">{{ $ketos->asal_sekolah }}</p>
                        </div>

                        <div class="mb-6">
                            <label for="nilai" class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Nilai Keseluruhan (0-100):
                            </label>
                            <input 
                                type="number" 
                                id="nilai" 
                                name="nilai" 
                                min="0" 
                                max="100"
                                value="{{ old('nilai', $ketos->nilai) }}"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                            >
                            @error('nilai')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Individual Category Scores -->
                        <div class="mb-6 border-t pt-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Nilai Per Kategori Nominasi</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Outstanding Student Council Innovation -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <label for="nilai_innovation" class="block font-semibold text-blue-600 mb-2">
                                        🏆 Outstanding Student Council Innovation
                                    </label>
                                    <input 
                                        type="number" 
                                        id="nilai_innovation" 
                                        name="nilai_innovation" 
                                        min="0" 
                                        max="100"
                                        value="{{ old('nilai_innovation', $ketos->nilai_innovation) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"
                                        placeholder="0-100"
                                    >
                                    @error('nilai_innovation')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Leading Student Council Social Impact -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <label for="nilai_social_impact" class="block font-semibold text-blue-600 mb-2">
                                        🤝 Leading Student Council Social Impact
                                    </label>
                                    <input 
                                        type="number" 
                                        id="nilai_social_impact" 
                                        name="nilai_social_impact" 
                                        min="0" 
                                        max="100"
                                        value="{{ old('nilai_social_impact', $ketos->nilai_social_impact) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"
                                        placeholder="0-100"
                                    >
                                    @error('nilai_social_impact')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Next-Level Student Council Media -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <label for="nilai_media" class="block font-semibold text-blue-600 mb-2">
                                        📱 Next-Level Student Council Media
                                    </label>
                                    <input 
                                        type="number" 
                                        id="nilai_media" 
                                        name="nilai_media" 
                                        min="0" 
                                        max="100"
                                        value="{{ old('nilai_media', $ketos->nilai_media) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"
                                        placeholder="0-100"
                                    >
                                    @error('nilai_media')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Video IG Reels -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <label for="nilai_video_reels" class="block font-semibold text-blue-600 mb-2">
                                        🎬 Video IG Reels
                                    </label>
                                    <input 
                                        type="number" 
                                        id="nilai_video_reels" 
                                        name="nilai_video_reels" 
                                        min="0" 
                                        max="100"
                                        value="{{ old('nilai_video_reels', $ketos->nilai_video_reels) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"
                                        placeholder="0-100"
                                    >
                                    @error('nilai_video_reels')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Student Council President of the Year 2026 -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg md:col-span-2">
                                    <label for="nilai_president" class="block font-semibold text-blue-600 mb-2">
                                        👑 Student Council President of the Year 2026
                                    </label>
                                    <input 
                                        type="number" 
                                        id="nilai_president" 
                                        name="nilai_president" 
                                        min="0" 
                                        max="100"
                                        value="{{ old('nilai_president', $ketos->nilai_president) }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white"
                                        placeholder="0-100"
                                    >
                                    @error('nilai_president')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                                Simpan Penilaian
                            </button>
                            <a href="{{ route('ketos.show', $ketos->id) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
