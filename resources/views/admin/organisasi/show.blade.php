<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Organisasi
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
                        <a href="{{ route('sekolah.index') }}" class="text-blue-600 hover:text-blue-900">← Kembali</a>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nama Sekolah:</label>
                            <p class="mt-1">{{ $organisasi->nama_sekolah }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nama Organisasi:</label>
                            <p class="mt-1">{{ $organisasi->nama_organisasi }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Email Organisasi:</label>
                            <p class="mt-1">{{ $organisasi->email_organisasi }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nomor WhatsApp:</label>
                            <p class="mt-1">{{ $organisasi->nomor_wa }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Alamat:</label>
                            <p class="mt-1">{{ $organisasi->alamat }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Nilai:</label>
                            <p class="mt-1">
                                @if($organisasi->nilai)
                                    <span class="text-2xl font-bold text-blue-600">{{ $organisasi->nilai }}</span>
                                @else
                                    <span class="text-gray-400">Belum ada nilai</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-700 dark:text-gray-300">Tanggal Pendaftaran:</label>
                            <p class="mt-1">{{ $organisasi->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('sekolah.edit', $organisasi->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            {{ $organisasi->nilai ? 'Edit Nilai' : 'Tambah Nilai' }}
                        </a>
                        <form action="{{ route('sekolah.destroy', $organisasi->id) }}" method="POST">
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
