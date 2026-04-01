<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Card Ketos -->
                <a href="{{ route('ketos.index') }}" class="group block">
                    <div class="glass-card overflow-hidden shadow-sm sm:rounded-[32px] hover:shadow-2xl hover:shadow-rose-900/10 transition-all duration-500 hover:-translate-y-2">
                        <div class="p-10">
                            <div class="flex items-center gap-6">
                                <div class="flex-shrink-0 bg-rose-500 text-white rounded-2xl p-5 shadow-lg shadow-rose-900/20 group-hover:rotate-12 transition-transform">
                                    <i data-feather="user" class="w-8 h-8"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-slate-900 font-outfit uppercase tracking-tight italic">Registrasi Ketos</h3>
                                    <p class="text-slate-500 font-medium text-sm mt-1 uppercase tracking-widest">Portal Pendaftaran Ketua OSIS</p>
                                </div>
                            </div>
                            <div class="mt-8 flex items-center justify-end">
                                <div class="p-3 bg-slate-50 rounded-full group-hover:bg-rose-50 group-hover:text-rose-600 transition-colors">
                                    <i data-feather="arrow-right" class="w-5 h-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card Organisasi -->
                <a href="{{ route('sekolah.index') }}" class="group block">
                    <div class="glass-card overflow-hidden shadow-sm sm:rounded-[32px] hover:shadow-2xl hover:shadow-orange-900/10 transition-all duration-500 hover:-translate-y-2">
                        <div class="p-10">
                            <div class="flex items-center gap-6">
                                <div class="flex-shrink-0 bg-orange-500 text-white rounded-2xl p-5 shadow-lg shadow-orange-900/20 group-hover:-rotate-12 transition-transform">
                                    <i data-feather="users" class="w-8 h-8"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-slate-900 font-outfit uppercase tracking-tight italic">Registrasi Sekolah</h3>
                                    <p class="text-slate-500 font-medium text-sm mt-1 uppercase tracking-widest">Portal Organisasi & Sekolah</p>
                                </div>
                            </div>
                            <div class="mt-8 flex items-center justify-end">
                                <div class="p-3 bg-slate-50 rounded-full group-hover:bg-orange-50 group-hover:text-orange-600 transition-colors">
                                    <i data-feather="arrow-right" class="w-5 h-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
