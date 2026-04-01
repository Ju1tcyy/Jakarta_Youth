<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Youth Achievement Award 2026</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        outfit: ['Outfit', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            500: '#e11d48',
                            600: '#be123c',
                            700: '#9f1239',
                        },
                        secondary: {
                            50: '#fff7ed',
                            500: '#f97316',
                            600: '#ea580c',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-subtle': 'pulse-subtle 4s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'pulse-subtle': {
                            '0%, 100%': { opacity: '0.4', transform: 'scale(1)' },
                            '50%': { opacity: '0.8', transform: 'scale(1.05)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        .heading-fluid {
            font-size: clamp(2.5rem, 8vw, 5rem);
            line-height: 1;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .premium-shadow {
            box-shadow: 0 20px 50px -12px rgba(225, 29, 72, 0.1);
        }

        .editorial-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1rem;
        }

        .timeline-gradient {
            background: linear-gradient(180deg, #e11d48 0%, #f97316 100%);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
</head>

<body class="bg-[#fafafa] selection:bg-rose-100 selection:text-rose-700" x-data="{ scrolled: false, mobileMenu: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">
    
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500" :class="scrolled ? 'py-4 glass-nav' : 'py-8'">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <a href="#" class="flex items-center gap-4 group">
                <div class="h-24 overflow-hidden transition-all duration-500" :class="scrolled ? 'h-16' : 'h-28'">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="JYAA Logo" class="h-full w-auto object-contain drop-shadow-md group-hover:scale-105 transition-transform">
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-10">
                <div class="flex items-center gap-8">
                    <a href="#about" class="text-sm font-bold text-slate-500 hover:text-rose-600 transition-colors tracking-wide uppercase">Tentang</a>
                    <a href="#timeline" class="text-sm font-bold text-slate-500 hover:text-rose-600 transition-colors tracking-wide uppercase">Timeline</a>
                </div>
                <a href="#registration" class="bg-slate-900 text-white px-8 py-3.5 rounded-2xl text-xs font-black uppercase tracking-[0.2em] hover:bg-rose-600 hover:shadow-xl hover:shadow-rose-900/20 transition-all active:scale-95">Daftar Sekarang</a>
            </div>

            <!-- Mobile Toggle -->
            <button class="lg:hidden text-slate-900" @click="mobileMenu = true">
                <i data-feather="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-cloak x-show="mobileMenu" class="fixed inset-0 z-[200] bg-white p-6 flex flex-col items-center justify-center text-center space-y-8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
        <button class="absolute top-8 right-8 text-slate-900" @click="mobileMenu = false">
            <i data-feather="x" class="w-8 h-8"></i>
        </button>
        <a href="#about" class="text-2xl font-black text-slate-900 font-outfit" @click="mobileMenu = false">Tentang</a>
        <a href="#timeline" class="text-2xl font-black text-slate-900 font-outfit" @click="mobileMenu = false">Timeline</a>
        <div class="w-12 h-1 bg-rose-500 rounded-full"></div>
        <a href="#registration" class="bg-slate-900 text-white w-full py-6 rounded-3xl text-sm font-black uppercase tracking-[0.3em]" @click="mobileMenu = false">Mulai Registrasi</a>
    </div>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-32 pb-20 overflow-hidden">
        <!-- Background Assets -->
        <div class="absolute top-[-10%] right-[-10%] w-[60%] h-[60%] bg-rose-100/50 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[50%] h-[50%] bg-orange-100/50 rounded-full blur-[120px] pointer-events-none"></div>
        
        <!-- Element Stars -->
        <img src="{{ asset('icon/element2.png') }}" class="absolute top-1/4 right-[5%] w-24 opacity-20 animate-pulse-subtle pointer-events-none hidden lg:block" alt="">
        <img src="{{ asset('icon/element2.png') }}" class="absolute bottom-1/4 left-[5%] w-20 opacity-10 animate-float pointer-events-none" alt="">

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-[1200px] mx-auto grid lg:grid-cols-2 gap-16 items-center">
                <div class="text-center lg:text-left space-y-10">
                    <div class="inline-flex items-center gap-3 bg-rose-50 border border-rose-100 px-4 py-2 rounded-full">
                        <span class="flex h-2 w-2 rounded-full bg-rose-600 animate-ping"></span>
                        <span class="text-[10px] font-black text-rose-600 uppercase tracking-widest leading-none">Registrasi 2026 Dibuka</span>
                    </div>

                    <h1 class="heading-fluid font-outfit font-black text-slate-900 leading-none tracking-tighter">
                        Apresiasi Pemuda <span class="text-rose-600">Jakarta</span> Masa Depan.
                    </h1>

                    <p class="text-lg text-slate-500 font-medium max-w-xl mx-auto lg:mx-0 leading-relaxed italic">
                        "Wujudkan transformasi kepemimpinan di tingkat sekolah dan organisasi kepemudaan DKI Jakarta."
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-6">
                        <a href="#registration" class="group bg-slate-900 text-white px-10 py-5 rounded-[2rem] text-sm font-black uppercase tracking-[0.2em] hover:bg-rose-600 hover:shadow-2xl hover:shadow-rose-900/40 transition-all active:scale-95 flex items-center gap-3">
                            Mulai Registrasi
                            <i data-feather="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <div class="flex items-center -space-x-3">
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200"></div>
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-300"></div>
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-400"></div>
                            <span class="ml-6 text-[10px] font-bold text-slate-400 uppercase tracking-widest tracking-tighter italic">+500 Pendaftar</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-500/10 to-orange-500/10 rounded-[3rem] blur-3xl transform rotate-6 scale-95 pointer-events-none"></div>
                    <div class="relative bg-white p-4 rounded-[3rem] shadow-2xl animate-float">
                        <img src="{{ asset('icon/hero_jyaa.png') }}" alt="Hero image" class="w-full rounded-[2.5rem] object-cover h-[400px] sm:h-[550px]">
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-8 -right-8 bg-white p-6 rounded-3xl shadow-xl border border-slate-50 flex items-center gap-4">
                            <div class="bg-rose-100 text-rose-600 p-3 rounded-2xl">
                                <i data-feather="award" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Penghargaan Berkelas</p>
                                <p class="text-lg font-black text-slate-900 font-outfit">Awarding 2026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-32 relative bg-white overflow-hidden">
        <!-- Ondel-ondel (element1) Decoration -->
        <img src="{{ asset('icon/element1.png') }}" class="absolute bottom-[-100px] left-[-150px] w-[500px] opacity-10 lg:opacity-30 pointer-events-none transform -rotate-12" alt="">
        
        <div class="container mx-auto px-6">
            <div class="max-w-[900px] mx-auto text-center space-y-12 relative z-10">
                <div class="inline-block px-4 py-2 bg-rose-50 text-rose-600 rounded-lg text-[10px] font-black uppercase tracking-[0.3em]">Tentang Penghargaan</div>
                
                <h2 class="text-4xl sm:text-5xl font-black text-slate-900 font-outfit tracking-tight leading-tight">
                    Membangun Generasi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-600 to-orange-500 italic">Berintegritas & Berdampak.</span>
                </h2>

                <div class="logo-jyaa-wrap py-10">
                    <img src="{{ asset('icon/logo jyaa.png') }}" alt="Logo JYAA" class="h-40 sm:h-64 mx-auto animate-pulse-subtle">
                </div>

                <div class="grid sm:grid-cols-2 gap-12 text-left">
                    <p class="text-slate-500 font-medium leading-relaxed">
                        Jakarta Youth Achievement Award (JYAA) merupakan ajang apresiasi bergengsi bagi para pemimpin muda di lingkungan OSIS SMA/SMK sederajat dan organisasi kepemudaan di seluruh DKI Jakarta.
                    </p>
                    <p class="text-slate-500 font-medium leading-relaxed">
                        Kami merayakan kemajuan dalam inovasi, dedikasi, serta kontribusi nyata yang diberikan oleh penggerak muda Jakarta demi ekosistem sekolah yang lebih baik dan inklusif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-20 items-start">
                <div class="lg:w-1/3 lg:sticky lg:top-32 space-y-8">
                    <div class="text-[10px] font-black text-rose-600 uppercase tracking-[0.3em]">Agenda Utama</div>
                    <h2 class="text-5xl font-black text-slate-900 font-outfit tracking-tight">Timeline <br> Kegiatan.</h2>
                    <p class="text-slate-500 font-medium italic">Simpan jadwal penting pendaftaran hingga malam puncak penganugerahan.</p>
                </div>

                <div class="flex-1 space-y-12">
                    <!-- Timeline Card 1 -->
                    <div class="relative group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border border-slate-100 flex gap-8">
                        <div class="hidden sm:block text-2xl font-black font-outfit text-slate-200">01</div>
                        <div class="space-y-4">
                            <div class="inline-block px-3 py-1 bg-rose-50 text-rose-600 rounded-md text-[10px] font-black tracking-widest">APRIL 2026</div>
                            <h3 class="text-2xl font-black text-slate-900 font-outfit">Pembukaan Nominasi</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Pendaftaran resmi dibuka untuk seluruh kategori. Segera lengkapi berkas.</p>
                        </div>
                    </div>
                    <!-- Timeline Card 2 -->
                    <div class="relative group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border border-slate-100 flex gap-8">
                        <div class="hidden sm:block text-2xl font-black font-outfit text-slate-200">02</div>
                        <div class="space-y-4">
                            <div class="inline-block px-3 py-1 bg-orange-50 text-orange-600 rounded-md text-[10px] font-black tracking-widest">30 APRIL 2026</div>
                            <h3 class="text-2xl font-black text-slate-900 font-outfit">Penutupan Akses</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Batas akhir pengunggahan berkas portofolio digital tepat pukul 23:59 WIB.</p>
                        </div>
                    </div>
                    <!-- Timeline Card 3 -->
                    <div class="relative group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border border-slate-100 flex gap-8">
                        <div class="hidden sm:block text-2xl font-black font-outfit text-slate-200">03</div>
                        <div class="space-y-4">
                            <div class="inline-block px-3 py-1 bg-rose-50 text-rose-600 rounded-md text-[10px] font-black tracking-widest">MEI 2026</div>
                            <h3 class="text-2xl font-black text-slate-900 font-outfit">Seleksi & Penjurian</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Kurasi data oleh dewan juri ahli untuk menentukan kandidat terbaik.</p>
                        </div>
                    </div>
                    <!-- Timeline Card 4 -->
                    <div class="relative group bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border border-slate-100 flex gap-8">
                        <div class="hidden sm:block text-2xl font-black font-outfit text-slate-200">04</div>
                        <div class="space-y-4">
                            <div class="inline-block px-3 py-1 bg-slate-900 text-white rounded-md text-[10px] font-black tracking-widest">22 MEI 2026</div>
                            <h3 class="text-2xl font-black text-slate-900 font-outfit italic">Awarding Night</h3>
                            <p class="text-slate-500 text-sm leading-relaxed italic">Malam puncak kejayaan bagi pemimpin muda terbaik Jakarta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="py-32 relative bg-slate-900 overflow-hidden">
        <!-- Asset Ondel-ondel Right -->
        <img src="{{ asset('icon/element1.png') }}" class="absolute top-[-50px] right-[-100px] w-[500px] opacity-10 pointer-events-none transform scale-x-[-1] rotate-12" alt="">
        
        <div class="container mx-auto px-6 relative z-10 text-center space-y-16">
            <div class="max-w-2xl mx-auto space-y-8">
                <div class="inline-block px-4 py-2 bg-rose-500/10 text-rose-400 rounded-lg text-[10px] font-black uppercase tracking-[0.3em]">Registrasi Portal</div>
                <h2 class="text-4xl sm:text-6xl font-black text-white font-outfit tracking-tight">Siap Memimpin?</h2>
                <p class="text-slate-400 text-lg">Pilih kategori pendaftaran Anda dan mulailah perjalanan prestasi hari ini.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-10 max-w-[1000px] mx-auto">
                <!-- Org Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-12 rounded-[3.5rem] flex flex-col items-center group hover:bg-white/10 transition-all hover:scale-[1.02] duration-500">
                    <div class="w-20 h-20 bg-rose-500 rounded-[2rem] flex items-center justify-center text-white mb-10 shadow-2xl shadow-rose-900/40 group-hover:rotate-12 transition-transform">
                        <i data-feather="users" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-3xl font-black text-white font-outfit mb-4">Organisasi</h3>
                    <p class="text-slate-400 mb-10 h-[60px]">Bagi OSIS, MPK, atau Organisasi Kepemudaan Inspiratif di sekolah Anda.</p>
                    <div class="w-full space-y-4">
                        <a href="{{ route('register') }}?role=organisasi" class="block w-full bg-rose-600 text-white font-black text-xs uppercase tracking-[0.2em] py-5 rounded-2xl hover:bg-rose-500 transition-colors">Daftar Sekarang</a>
                        <a href="{{ route('login') }}" class="block w-full text-slate-400 font-bold text-[10px] uppercase tracking-widest hover:text-white transition-colors">Login Dashboard</a>
                    </div>
                </div>

                <!-- Ketos Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-12 rounded-[3.5rem] flex flex-col items-center group hover:bg-white/10 transition-all hover:scale-[1.02] duration-500">
                    <div class="w-20 h-20 bg-orange-500 rounded-[2rem] flex items-center justify-center text-white mb-10 shadow-2xl shadow-orange-900/40 group-hover:-rotate-12 transition-transform">
                        <i data-feather="user" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-3xl font-black text-white font-outfit mb-4">Ketua OSIS</h3>
                    <p class="text-slate-400 mb-10 h-[60px]">Apresiasi individu bagi pemimpin tertinggi di instansi sekolah.</p>
                    <div class="w-full space-y-4">
                        <a href="{{ route('register') }}?role=ketos" class="block w-full bg-orange-600 text-white font-black text-xs uppercase tracking-[0.2em] py-5 rounded-2xl hover:bg-orange-500 transition-colors">Daftar Sekarang</a>
                        <a href="{{ route('login') }}" class="block w-full text-slate-400 font-bold text-[10px] uppercase tracking-widest hover:text-white transition-colors">Login Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 pt-32 pb-16 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-start">
                <div class="lg:col-span-5 space-y-10">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="Logo" class="h-16 w-auto drop-shadow-sm">
                    <p class="text-slate-500 font-medium text-lg leading-relaxed italic max-w-sm">"Menjadi wadah sinergi dan apresiasi tak terbatas bagi pemimpin muda ibu kota."</p>
                    <div class="flex items-center gap-6">
                        <a href="#" class="p-3 bg-slate-50 text-slate-400 rounded-full hover:bg-rose-50 hover:text-rose-600 transition-all"><i data-feather="instagram" class="w-5 h-5"></i></a>
                        <a href="#" class="p-3 bg-slate-50 text-slate-400 rounded-full hover:bg-rose-50 hover:text-rose-600 transition-all"><i data-feather="twitter" class="w-5 h-5"></i></a>
                        <a href="#" class="p-3 bg-slate-50 text-slate-400 rounded-full hover:bg-rose-50 hover:text-rose-600 transition-all"><i data-feather="mail" class="w-5 h-5"></i></a>
                    </div>
                </div>
                
                <div class="lg:col-span-7 grid sm:grid-cols-3 gap-12">
                    <div class="space-y-8">
                        <h5 class="text-xs font-black text-slate-900 uppercase tracking-widest">Navigasi</h5>
                        <ul class="space-y-4 text-slate-500 font-bold text-sm">
                            <li><a href="#" class="hover:text-rose-600 transition-colors">Beranda</a></li>
                            <li><a href="#about" class="hover:text-rose-600 transition-colors">Tentang Kami</a></li>
                            <li><a href="#timeline" class="hover:text-rose-600 transition-colors">Timeline</a></li>
                        </ul>
                    </div>
                    <div class="space-y-8">
                        <h5 class="text-xs font-black text-slate-900 uppercase tracking-widest">Portal</h5>
                        <ul class="space-y-4 text-slate-500 font-bold text-sm">
                            <li><a href="{{ route('login') }}" class="hover:text-rose-600 transition-colors">Login Admin</a></li>
                            <li><a href="{{ route('register') }}?role=ketos" class="hover:text-rose-600 transition-colors">Daftar Ketos</a></li>
                            <li><a href="{{ route('register') }}?role=organisasi" class="hover:text-rose-600 transition-colors">Daftar Organisasi</a></li>
                        </ul>
                    </div>
                    <div class="space-y-8">
                        <h5 class="text-xs font-black text-slate-900 uppercase tracking-widest">Legalitas</h5>
                        <ul class="space-y-4 text-slate-500 font-bold text-sm">
                            <li><a href="#" class="hover:text-rose-600 transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-rose-600 transition-colors">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-32 pt-10 border-t border-slate-100 flex flex-col md:row items-center justify-between gap-8">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest italic">&copy; 2026 Jakarta Youth Achievement Award. All rights reserved.</p>
                <div class="text-[10px] font-bold text-slate-400 bg-slate-50 px-6 py-3 rounded-full italic tracking-tighter shadow-sm border border-slate-100 group transition-all hover:bg-white hover:shadow-md">
                    Professional Portal for Jakarta Youth
                </div>
            </div>
        </div>
    </footer>

    <script>
        feather.replace();
    </script>
</body>

</html>