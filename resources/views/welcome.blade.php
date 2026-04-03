<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Youth Achievement Award 2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        :root {
            --primary: #00529b; /* MNC Blue */
            --secondary: #003d73;
            --accent: #38bdf8;
        }
        body { font-family: 'Inter', sans-serif; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .bg-mnc { background-color: var(--primary); }
        .text-mnc { color: var(--primary); }
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(0, 82, 155, 0.1), transparent),
                        radial-gradient(circle at bottom left, rgba(56, 189, 248, 0.05), transparent);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-white text-slate-800 overflow-x-hidden min-h-screen hero-gradient">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 px-6 py-6 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-white/70 backdrop-blur-md px-8 py-4 rounded-[30px] border border-white/50 shadow-xl shadow-blue-900/5">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('icon/logo collab.png') }}" alt="Logo" class="h-10 w-auto">
                <div class="hidden sm:block">
                    <span class="block text-sm font-black text-slate-800 uppercase tracking-tighter">Jakarta Youth</span>
                    <span class="block text-[10px] font-bold text-blue-600 uppercase tracking-widest leading-none">Achievement Award</span>
                </div>
            </div>
            <div class="flex items-center space-x-6">
                @if (Route::has('login'))
                    <nav class="flex items-center space-x-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-xs font-black uppercase tracking-widest text-slate-600 hover:text-blue-600 transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-xs font-black uppercase tracking-widest text-slate-600 hover:text-blue-600 transition-colors">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-blue-700 hover:scale-105 transition-all shadow-lg shadow-blue-200">Daftar Sekarang</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="pt-40 pb-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div class="relative z-10 text-center lg:text-left">
                <div class="inline-flex items-center space-x-3 bg-blue-50 px-4 py-2 rounded-full mb-8 border border-blue-100">
                    <span class="flex h-2 w-2 rounded-full bg-blue-600 animate-pulse"></span>
                    <span class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em]">Pendaftaran Dibuka 2026</span>
                </div>
                
                <h1 class="text-5xl lg:text-7xl font-black text-slate-900 font-outfit leading-tight mb-8 tracking-tighter uppercase">
                    Mencetak <br> <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent italic">Pemimpin</span> <br> Masa Depan.
                </h1>
                
                <p class="text-lg text-slate-500 font-medium mb-12 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    Jakarta Youth Achievement Award adalah wadah apresiasi bagi generasi muda berprestasi di Jakarta. Tunjukkan kontribusimu, raih impianmu.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto bg-blue-600 text-white px-10 py-5 rounded-3xl font-black text-xs uppercase tracking-[0.3em] hover:bg-black hover:scale-105 transition-all shadow-2xl shadow-blue-200">Mulai Pendaftaran</a>
                    <a href="#about" class="w-full sm:w-auto flex items-center justify-center px-10 py-5 text-xs font-black text-slate-400 uppercase tracking-widest hover:text-blue-600 transition-colors">Pelajari Lebih Lanjut <i data-feather="arrow-right" class="w-4 h-4 ml-2"></i></a>
                </div>

                <div class="mt-16 grid grid-cols-3 gap-8 max-w-sm mx-auto lg:mx-0 border-t border-slate-100 pt-8 grayscale opacity-50">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/d/d4/MNC_Group_2015_logo.svg/1200px-MNC_Group_2015_logo.svg.png" alt="MNC Group" class="h-6 w-auto object-contain">
                    <p class="text-[10px] font-black uppercase self-center tracking-tighter">Jakarta Youth 2026</p>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Emirates_Logo.svg/1200px-Emirates_Logo.svg.png" alt="Sponsor" class="h-6 w-auto object-contain">
                </div>
            </div>

            <!-- Right Visual -->
            <div class="relative hidden lg:block">
                <div class="absolute inset-0 bg-blue-200 rounded-full blur-[150px] opacity-20 animate-pulse"></div>
                <div class="relative z-10 bg-white p-12 rounded-[60px] shadow-2xl border border-white/50 glass animate-float">
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="text-[10px] font-black text-slate-300 uppercase tracking-widest">Portal Pendaftaran</div>
                    </div>
                    
                    <div class="space-y-8">
                        <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                            <h4 class="text-sm font-black text-slate-800 uppercase tracking-wide mb-3">Nominasi Ketua OSIS</h4>
                            <p class="text-xs text-slate-500 font-medium leading-relaxed">Kategori pendaftaran untuk Ketua/Wakil Ketua OSIS aktif (SMA/SMK Se-Jakarta).</p>
                        </div>
                        <div class="bg-blue-600 p-6 rounded-3xl text-white shadow-xl shadow-blue-200">
                            <h4 class="text-sm font-black uppercase tracking-wide mb-3">Nominasi Organisasi</h4>
                            <p class="text-xs opacity-80 font-medium leading-relaxed">Kategori pendaftaran untuk Organisasi/Komunitas Kepemudaan Se-Jakarta.</p>
                        </div>
                    </div>

                    <div class="mt-10 flex items-center justify-between pt-8 border-t border-slate-100">
                        <div class="flex -space-x-3">
                            @for($i=0; $i<4; $i++)
                                <div class="w-10 h-10 rounded-full border-4 border-white bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">{{ $i + 1 }}</div>
                            @endfor
                        </div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">1,240+ Pendaftar Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Stat Section -->
    <div class="max-w-7xl mx-auto px-6 mb-20">
        <div class="bg-slate-900 rounded-[50px] p-12 grid grid-cols-1 md:grid-cols-3 gap-12 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-blue-600 opacity-10 pointer-events-none"></div>
            <div>
                <p class="text-blue-400 font-black text-4xl mb-2 font-outfit uppercase tracking-tighter">120+</p>
                <p class="text-[10px] text-white opacity-40 font-black uppercase tracking-[0.3em]">Sekolah Terlibat</p>
            </div>
            <div class="border-y md:border-y-0 md:border-x border-white/10 py-8 md:py-0">
                <p class="text-blue-400 font-black text-4xl mb-2 font-outfit uppercase tracking-tighter">5 Nominasi</p>
                <p class="text-[10px] text-white opacity-40 font-black uppercase tracking-[0.3em]">Bidang Penghargaan</p>
            </div>
            <div>
                <p class="text-blue-400 font-black text-4xl mb-2 font-outfit uppercase tracking-tighter">Jakarta</p>
                <p class="text-[10px] text-white opacity-40 font-black uppercase tracking-[0.3em]">Pusat Kepemimpinan</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-3 mb-8 md:mb-0">
                <img src="{{ asset('icon/logo collab.png') }}" alt="Logo" class="h-8 w-auto">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">© 2026 Jakarta Youth Achievement Award</span>
            </div>
            <div class="flex space-x-8">
                <a href="#" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-blue-600">Instagram</a>
                <a href="#" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-blue-600">Tiktok</a>
                <a href="#" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-blue-600">Youtube</a>
            </div>
        </div>
    </footer>

    <script>
        feather.replace({ 'width': 18, 'height': 18 });
    </script>
</body>
</html>
