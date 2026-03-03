<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Nilai - {{ $ketos->nama }}
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
                                Nilai (0-100):
                            </label>
                            <input 
                                type="number" 
                                id="nilai" 
                                name="nilai" 
                                min="0" 
                                max="100"
                                value="{{ old('nilai', $ketos->nilai) }}"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                required
                            >
                            @error('nilai')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                                Simpan Nilai
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
