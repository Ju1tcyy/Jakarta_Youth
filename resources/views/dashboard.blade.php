<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Program Header -->
            <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b-2 border-slate-200 pb-10">
                <div class="space-y-4">
                    <span class="human-accent text-2xl tracking-wide">Selamat Datang di Portal</span>
                    <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight flex items-center gap-4">
                        Jakarta Youth Award <span class="text-xs bg-primary text-white border-2 border-accent px-4 py-1.5 rounded-full uppercase tracking-widest leading-none">Nominasi 2026</span>
                    </h1>
                </div>
                <div class="text-slate-400 text-xs font-bold uppercase tracking-[0.2em] italic">
                    Deadline: 30 April 2026
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Card Ketos -->
                <a href="{{ route('ketos.index') }}" class="group block">
                    <div class="solid-card p-10 flex flex-col items-center text-center group-hover:border-primary transition-all">
                        <div class="w-24 h-24 bg-primary text-accent rounded-full flex items-center justify-center mb-8 shadow-xl group-hover:scale-110 transition-transform">
                            <i data-feather="user" class="w-12 h-12"></i>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 tracking-tight">Ketua OSIS</h3>
                        <p class="text-slate-500 font-medium mb-10 leading-relaxed">Kelola data nominasi untuk kategori individu Ketua OSIS terbaik Se-Jakarta.</p>
                        <div class="w-full bg-slate-50 py-4 rounded-xl text-xs font-black uppercase tracking-[0.2em] text-slate-400 group-hover:bg-primary group-hover:text-white transition-all">
                            Kelola Nominasi
                        </div>
                    </div>
                </a>

                <!-- Card Organisasi -->
                <a href="{{ route('organisasi.index') }}" class="group block">
                    <div class="solid-card p-10 flex flex-col items-center text-center group-hover:border-accent transition-all">
                        <div class="w-24 h-24 bg-accent text-primary rounded-full flex items-center justify-center mb-8 shadow-xl group-hover:scale-110 transition-transform">
                            <i data-feather="users" class="w-12 h-12"></i>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3 tracking-tight">Organisasi</h3>
                        <p class="text-slate-500 font-medium mb-10 leading-relaxed">Apresiasi bagi OSIS, MPK, atau Organisasi Kepemudaan paling progresif.</p>
                        <div class="w-full bg-slate-50 py-4 rounded-xl text-xs font-black uppercase tracking-[0.2em] text-slate-400 group-hover:bg-accent group-hover:text-primary transition-all">
                            Kelola Program
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
