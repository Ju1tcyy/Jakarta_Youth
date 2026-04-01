<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Program Header -->
            <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b-2 border-slate-200 pb-10">
    <div class="space-y-12 animate-fade-up">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-1 bg-accent"></div>
                    <span class="text-primary font-black uppercase tracking-[0.4em] text-xs">Overview</span>
                </div>
                <h1 class="text-5xl font-black text-slate-900 tracking-tighter">
                    Dashboard <span class="text-primary italic">Portal.</span>
                </h1>
            </div>
            <div class="bg-white px-8 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="w-10 h-10 bg-primary/5 text-primary rounded-xl flex items-center justify-center">
                    <i data-feather="calendar" class="w-5 h-5"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Hari Ini</span>
                    <span class="text-sm font-black text-primary">{{ now()->translatedFormat('d F Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Quick Stats / Welcome -->
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 solid-card p-12 bg-primary bg-grid-navy text-white relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 w-64 h-64 bg-accent/20 rounded-full blur-3xl group-hover:bg-accent/30 transition-all duration-700"></div>
                <div class="relative z-10 space-y-8">
                    <h2 class="text-4xl font-black tracking-tight leading-tight">
                        Selamat Datang, <br>
                        <span class="text-accent">{{ Auth::user()->name }}</span>
                    </h2>
                    <p class="text-slate-300 text-lg max-w-xl font-medium leading-relaxed">
                        Anda telah masuk sebagai <span class="text-white font-black italic">{{ strtoupper(Auth::user()->role) }}</span>. Mulailah mengelola data dan berkas prestasi Anda untuk Jakarta Youth Achievement Award 2026.
                    </p>
                    <div class="pt-4 flex gap-4">
                        <a href="{{ route('profile.edit') }}" class="bg-accent text-primary px-8 py-4 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-white hover:scale-105 transition-all flex items-center gap-3">
                            <i data-feather="user"></i>
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>

            <div class="solid-card p-10 flex flex-col justify-between group hover:border-primary transition-all">
                <div class="space-y-6">
                    <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center group-hover:bg-primary group-hover:text-accent transition-all duration-500">
                        <i data-feather="award" class="w-8 h-8"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-slate-900 group-hover:text-primary transition-colors">Progress Berkas</h3>
                        <p class="text-sm font-bold text-slate-400 mt-2 uppercase tracking-widest">Silakan lengkapi profil</p>
                    </div>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-primary h-full w-[30%] transition-all duration-1000"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
