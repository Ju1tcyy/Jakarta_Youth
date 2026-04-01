<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Youth Achievement Award 2026</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Satisfy&display=swap"
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
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        script: ['Satisfy', 'cursive'],
                    },
                    colors: {
                        primary: {
                            DEFAULT: '#012B6E', // Navy
                            50: '#f0f4f9',
                            100: '#e1e9f2',
                            600: '#01245a',
                            700: '#011d47',
                        },
                        accent: {
                            DEFAULT: '#FFD700', // Yellow
                            500: '#FFD700',
                            600: '#E6C200',
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
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fff;
            color: #1a1a1a;
            -webkit-font-smoothing: antialiased;
        }

        .heading-solid {
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.04em;
        }

        /* Premium Grid Texture */
        .bg-grid-navy {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
        }

        /* Selection Color */
        ::selection {
            background-color: #FFD700;
            color: #012B6E;
        }

        /* Deep Layered Shadow */
        .premium-shadow {
            box-shadow: 
                0 4px 6px -1px rgba(1, 43, 110, 0.05),
                0 10px 15px -3px rgba(1, 43, 110, 0.08),
                0 20px 25px -5px rgba(1, 43, 110, 0.03);
        }

        .solid-card {
            background: #fff;
            border: 1px solid #f1f5f9;
            border-radius: 2rem;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .solid-card:hover {
            border-color: #012B6E;
            box-shadow: 
                0 25px 50px -12px rgba(1, 43, 110, 0.15);
            transform: translateY(-8px) scale(1.01);
        }

        .human-accent {
            font-family: 'Satisfy', cursive;
            color: #FFD700;
        }

        /* Staggered Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-500 { animation-delay: 500ms; }

        /* Scroll Progress */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: #FFD700;
            z-index: 1000;
            transition: width 0.1s ease-out;
        }
    </style>
</head>

<body class="bg-white selection:bg-accent selection:text-primary" x-data="{ scrolled: false, mobileMenu: false, scrollWidth: 0 }" 
    @scroll.window="scrolled = (window.pageYOffset > 50); scrollWidth = (window.pageYOffset / (document.documentElement.scrollHeight - window.innerHeight)) * 100">
    
    <!-- Scroll Progress Bar -->
    <div id="scroll-progress" :style="'width: ' + scrollWidth + '%'"></div>

    <!-- Mobile Nav Overlay -->
    <div x-show="mobileMenu" x-cloak class="fixed inset-0 z-[200] bg-primary/95 backdrop-blur-xl transition-all" x-transition>
        <div class="p-10 flex flex-col h-full">
            <div class="flex justify-between items-center mb-16">
                <img src="{{ asset('icon/logo_collab.png') }}" class="h-12 brightness-0 invert" alt="">
                <button @click="mobileMenu = false" class="text-white"><i data-feather="x" class="w-8 h-8"></i></button>
            </div>
            <div class="space-y-10">
                <a @click="mobileMenu = false" href="#about" class="block text-4xl font-black text-white italic">Tentang</a>
                <a @click="mobileMenu = false" href="#timeline" class="block text-4xl font-black text-white italic">Timeline</a>
                <a @click="mobileMenu = false" href="#registration" class="block text-4xl font-black text-accent italic underline decoration-4 underline-offset-8">Daftar</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500" 
        :class="scrolled ? 'py-4 translate-y-4 mx-6 rounded-2xl bg-white shadow-[0_10px_40px_-15px_rgba(1,43,110,0.2)]' : 'py-8 bg-transparent translate-y-0'">
        <div class="container mx-auto px-10 flex items-center justify-between">
            <a href="#" class="flex items-center gap-4">
                <div class="overflow-hidden transition-all duration-500" :class="scrolled ? 'h-10' : 'h-20'">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="JYAA Logo" class="h-full w-auto object-contain" :class="!scrolled && 'brightness-0 invert'">
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-10">
                <div class="flex items-center gap-10">
                    <a href="#about" class="text-sm font-bold transition-colors tracking-wide uppercase" :class="scrolled ? 'text-slate-600' : 'text-slate-200'">Tentang</a>
                    <a href="#timeline" class="text-sm font-bold transition-colors tracking-wide uppercase" :class="scrolled ? 'text-slate-600' : 'text-slate-200'">Timeline</a>
                </div>
                <a href="#registration" class="bg-accent hover:bg-accent-600 text-primary-600 px-8 py-3 rounded-full text-xs font-black uppercase tracking-widest transition-all">Daftar Sekarang</a>
            </div>

            <!-- Mobile Toggle -->
            <button class="lg:hidden" :class="scrolled ? 'text-slate-900' : 'text-white'" @click="mobileMenu = true">
                <i data-feather="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-32 pb-20 bg-primary bg-grid-navy overflow-hidden">
        <!-- Floating Decoration -->
        <div class="absolute top-0 right-0 w-3/4 h-full bg-slate-900/20 pointer-events-none transform -skew-x-12 translate-x-1/2"></div>
        
        <div class="container mx-auto px-10 relative z-10">
            <div class="max-w-[1300px] mx-auto grid lg:grid-cols-2 gap-24 items-center">
                <div class="text-center lg:text-left space-y-12">
                    <div class="space-y-6">
                        <span class="human-accent text-3xl tracking-wide animate-fade-up">Selamat Datang di</span>
                        <h1 class="heading-solid text-white animate-fade-up delay-100">
                            Jakarta Youth <br>
                            Achievement <span class="text-accent underline decoration-8 underline-offset-[12px] italic">Award 26.</span>
                        </h1>
                    </div>

                    <p class="text-xl text-slate-300 font-medium max-w-xl mx-auto lg:mx-0 leading-relaxed animate-fade-up delay-200">
                        "Wujudkan transformasi kepemimpinan bagi pemimpin muda di tingkat sekolah dan organisasi kepemudaan DKI Jakarta."
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-10 animate-fade-up delay-300">
                        <a href="#registration" class="group bg-accent text-primary px-14 py-6 rounded-full text-base font-black uppercase tracking-widest hover:bg-white hover:scale-105 transition-all shadow-[0_20px_50px_-15px_rgba(255,215,0,0.3)] flex items-center gap-4">
                            Mulai Registrasi
                            <i data-feather="arrow-right" class="w-6 h-6 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <div class="flex items-center gap-6">
                            <div class="w-12 h-[2px] bg-accent/30 hidden sm:block"></div>
                            <div class="flex flex-col text-slate-400 text-xs font-black uppercase tracking-[0.3em]">
                                <span>Deadline Pendaftaran</span>
                                <span class="text-white mt-1">30 April 2026</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative hidden lg:block animate-fade-up delay-500">
                    <div class="absolute -inset-4 bg-accent/20 rounded-[3rem] blur-3xl"></div>
                    <img src="{{ asset('icon/hero_jyaa.png') }}" alt="Hero image" class="relative z-10 w-full h-auto rounded-[3rem] shadow-2xl border border-white/10 grayscale-[0.2] hover:grayscale-0 transition-all duration-700">
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-10 -left-10 bg-white p-8 rounded-3xl shadow-2xl z-20 animate-float">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-accent">
                                <i data-feather="users" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Leaders Registered</p>
                                <p class="text-xl font-black text-primary leading-none">1,240+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-40 relative bg-white overflow-hidden">
        <!-- Watermark -->
        <div class="absolute -right-20 top-40 text-[15rem] font-black text-slate-50 pointer-events-none uppercase tracking-tighter select-none">
            Excellence
        </div>
        
        <div class="container mx-auto px-10">
            <div class="max-w-[1100px] mx-auto grid lg:grid-cols-2 gap-24 items-center">
                <div class="space-y-12 relative z-10 animate-fade-up">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-0.5 bg-primary"></div>
                            <span class="text-primary font-black uppercase tracking-[0.4em] text-xs">Siapa Kami?</span>
                        </div>
                        <h2 class="text-5xl sm:text-6xl font-black text-slate-900 leading-tight">
                            Menciptakan <br>
                            <span class="text-primary italic">Legacy Nyata</span> <br>
                            Bagi Jakarta.
                        </h2>
                    </div>

                    <div class="space-y-8 text-slate-500 text-lg leading-relaxed font-medium">
                        <p>
                            Jakarta Youth Achievement Award (JYAA) bukanlah sekadar ajang penghargaan. Ini adalah wadah bagi Anda, pemimpin muda yang berani mengambil tanggung jawab lebih besar.
                        </p>
                        <p>
                            Kami mengapresiasi dedikasi, inovasi, dan kerja keras yang telah Anda berikan untuk lingkungan sekolah dan komunitas di DKI Jakarta.
                        </p>
                    </div>

                    <div class="flex items-center gap-8 pt-6">
                        <div class="flex items-center gap-4 bg-slate-50 px-8 py-5 rounded-2xl border border-slate-100 premium-shadow">
                            <div class="w-10 h-10 bg-primary text-accent rounded-full flex items-center justify-center">
                                <i data-feather="award" class="w-6 h-6"></i>
                            </div>
                            <span class="text-sm font-black uppercase tracking-widest text-primary">Awarding 2026</span>
                        </div>
                    </div>
                </div>

                <div class="relative animate-fade-up delay-200">
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-accent/20 rounded-full blur-[100px]"></div>
                    <div class="solid-card p-6 relative z-10 bg-white rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('icon/logo jyaa.png') }}" alt="Logo JYAA" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-40 bg-slate-50 relative overflow-hidden">
        <div class="container mx-auto px-10">
            <div class="max-w-4xl mx-auto">
                <div class="mb-24 space-y-6 animate-fade-up">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-0.5 bg-accent"></div>
                        <span class="text-primary font-black uppercase tracking-[0.4em] text-xs">Jadwal & Tahapan</span>
                    </div>
                    <h2 class="text-5xl font-black text-slate-900 leading-tight">Timeline Kegiatan 2026.</h2>
                </div>

                <div class="relative">
                    <!-- Vertical Line -->
                    <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-accent"></div>

                    <div class="space-y-16">
                        <!-- Step 1 -->
                        <div class="relative pl-16 group">
                            <!-- Dot -->
                            <div class="absolute left-[13px] top-4 w-2.5 h-2.5 bg-accent rounded-full border-4 border-white shadow-[0_0_0_4px_rgba(255,215,0,0.2)]"></div>
                            
                            <div class="solid-card p-10 relative">
                                <div class="absolute -top-4 left-10">
                                    <span class="bg-accent text-primary text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg shadow-accent/20">Sedang Berlangsung</span>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <h3 class="text-2xl font-black text-primary">Pembukaan Nominasi</h3>
                                    <span class="text-sm font-bold text-slate-400 bg-slate-50 px-4 py-1 rounded-lg uppercase tracking-widest">April 2026</span>
                                </div>
                                <p class="text-slate-500 font-medium leading-relaxed">Pendaftaran resmi dibuka untuk kategori Ketua OSIS dan Organisasi Kepemudaan di seluruh DKI Jakarta.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative pl-16 group">
                            <!-- Dot -->
                            <div class="absolute left-[13px] top-4 w-2.5 h-2.5 bg-accent rounded-full border-4 border-white"></div>
                            
                            <div class="solid-card p-10">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <h3 class="text-2xl font-black text-primary">Penutupan Akses</h3>
                                    <span class="text-sm font-bold text-slate-400 bg-slate-50 px-4 py-1 rounded-lg uppercase tracking-widest">30 April 2026</span>
                                </div>
                                <p class="text-slate-500 font-medium leading-relaxed">Batas akhir pengunggahan berkas portofolio prestasi digital tepat pukul 23:59 WIB.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative pl-16 group">
                            <!-- Dot -->
                            <div class="absolute left-[13px] top-4 w-2.5 h-2.5 bg-accent rounded-full border-4 border-white"></div>
                            
                            <div class="solid-card p-10">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <h3 class="text-2xl font-black text-primary">Seleksi & Penjurian</h3>
                                    <span class="text-sm font-bold text-slate-400 bg-slate-50 px-4 py-1 rounded-lg uppercase tracking-widest">Mei 2026</span>
                                </div>
                                <p class="text-slate-500 font-medium leading-relaxed">Proses kurasi dan verifikasi data oleh dewan juri ahli untuk menentukan kandidat terbaik.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="relative pl-16 group">
                            <!-- Dot -->
                            <div class="absolute left-[13px] top-4 w-2.5 h-2.5 bg-accent rounded-full border-4 border-white"></div>
                            
                            <div class="solid-card p-10 bg-primary border-none shadow-2xl shadow-primary/20">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <h3 class="text-2xl font-black text-white italic">Awarding Night</h3>
                                    <span class="text-sm font-black text-primary bg-accent px-4 py-1 rounded-lg uppercase tracking-widest">22 Mei 2026</span>
                                </div>
                                <p class="text-slate-300 font-medium leading-relaxed">Malam puncak penganugerahan dan apresiasi bagi pemimpin muda terbaik Jakarta.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="py-40 relative bg-primary bg-grid-navy overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-white to-transparent"></div>
        
        <div class="container mx-auto px-10 relative z-10 text-center space-y-24">
            <div class="max-w-3xl mx-auto space-y-8 animate-fade-up">
                <span class="text-accent font-black uppercase tracking-[0.4em] text-xs">Pendaftaran</span>
                <h2 class="text-5xl sm:text-6xl font-black text-white">Siap Memimpin?</h2>
                <p class="text-slate-300 text-xl max-w-2xl mx-auto leading-relaxed">Pilih kategori pendaftaran dan mulailah jejak prestasi Anda hari ini di panggung kepemimpinan Jakarta.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 max-w-[1100px] mx-auto">
                <!-- Org Card -->
                <div class="bg-white p-16 rounded-[3rem] flex flex-col items-center group transition-all hover:translate-y-[-10px] premium-shadow animate-fade-up delay-100">
                    <div class="w-24 h-24 bg-primary text-accent rounded-full flex items-center justify-center mb-12 shadow-2xl group-hover:scale-110 transition-transform">
                        <i data-feather="users" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-4xl font-black text-primary mb-6">Organisasi</h3>
                    <p class="text-slate-500 mb-12 h-[60px] text-lg font-medium">Bagi OSIS, MPK, atau Organisasi Kepemudaan Inspiratif di sekolah Anda.</p>
                    <div class="w-full space-y-6">
                        <a href="{{ route('register') }}?role=organisasi" class="block w-full bg-primary text-white font-black text-sm uppercase tracking-widest py-6 rounded-full hover:bg-slate-900 transition-all shadow-xl shadow-primary/20">Daftar Sekarang</a>
                        <a href="{{ route('login') }}" class="block w-full text-slate-400 font-black text-xs uppercase tracking-[0.3em] hover:text-primary transition-colors">Login Dashboard</a>
                    </div>
                </div>

                <!-- Ketos Card -->
                <div class="bg-white p-16 rounded-[3rem] flex flex-col items-center group transition-all hover:translate-y-[-10px] premium-shadow animate-fade-up delay-200">
                    <div class="w-24 h-24 bg-accent text-primary rounded-full flex items-center justify-center mb-12 shadow-2xl group-hover:scale-110 transition-transform">
                        <i data-feather="user" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-4xl font-black text-primary mb-6">Ketua OSIS</h3>
                    <p class="text-slate-500 mb-12 h-[60px] text-lg font-medium">Apresiasi individu bagi pemimpin tertinggi di instansi sekolah.</p>
                    <div class="w-full space-y-6">
                        <a href="{{ route('register') }}?role=ketos" class="block w-full bg-accent text-primary font-black text-sm uppercase tracking-widest py-6 rounded-full hover:bg-yellow-400 transition-all shadow-xl shadow-accent/20">Daftar Sekarang</a>
                        <a href="{{ route('login') }}" class="block w-full text-slate-400 font-black text-xs uppercase tracking-[0.3em] hover:text-primary transition-colors">Login Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-16 items-start">
                <div class="lg:col-span-5 space-y-10">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="Logo" class="h-20 w-auto brightness-0 invert">
                    <div class="space-y-6">
                        <h4 class="human-accent text-3xl">Hubungi Kami</h4>
                        <div class="space-y-4">
                            <a href="mailto:info@beasiswamncu.com" class="flex items-center gap-4 text-slate-300 hover:text-accent transition-colors group">
                                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-accent group-hover:text-primary transition-all">
                                    <i data-feather="mail" class="w-5 h-5"></i>
                                </div>
                                <span class="font-bold tracking-wide">info@beasiswamncu.com</span>
                            </a>
                            <a href="https://wa.me/6285880059189" target="_blank" class="flex items-center gap-4 text-slate-300 hover:text-accent transition-colors group">
                                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-accent group-hover:text-primary transition-all">
                                    <i data-feather="phone" class="w-5 h-5"></i>
                                </div>
                                <span class="font-bold tracking-wide">+62 858-8005-9189</span>
                            </a>
                            <a href="https://instagram.com/beasiswamncu" target="_blank" class="flex items-center gap-4 text-slate-300 hover:text-accent transition-colors group">
                                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-accent group-hover:text-primary transition-all">
                                    <i data-feather="instagram" class="w-5 h-5"></i>
                                </div>
                                <span class="font-bold tracking-wide">@beasiswamncu</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="lg:col-span-7 grid sm:grid-cols-3 gap-12 pt-10 lg:pt-0">
                    <div class="space-y-8">
                        <h5 class="text-xs font-black text-accent uppercase tracking-[0.3em]">Program</h5>
                        <ul class="space-y-4 text-slate-400 font-bold text-sm">
                            <li><a href="#about" class="hover:text-accent transition-colors">Tentang JYAA</a></li>
                            <li><a href="#timeline" class="hover:text-accent transition-colors">Agenda</a></li>
                            <li><a href="#registration" class="hover:text-accent transition-colors">Pendaftaran</a></li>
                        </ul>
                    </div>
                    <div class="space-y-8">
                        <h5 class="text-xs font-black text-accent uppercase tracking-[0.3em]">Portal Akses</h5>
                        <ul class="space-y-4 text-slate-400 font-bold text-sm">
                            <li><a href="{{ route('login') }}" class="hover:text-accent transition-colors">Dashboard Login</a></li>
                            <li><a href="{{ route('register') }}?role=ketos" class="hover:text-accent transition-colors">Registrasi Ketos</a></li>
                            <li><a href="{{ route('register') }}?role=organisasi" class="hover:text-accent transition-colors">Registrasi Sekolah</a></li>
                        </ul>
                    </div>
                    <div class="space-y-8">
                        <h5 class="text-xs font-black text-accent uppercase tracking-[0.3em]">Informasi</h5>
                        <ul class="space-y-4 text-slate-400 font-bold text-sm">
                            <li><a href="#" class="hover:text-accent transition-colors">Panduan Nominasi</a></li>
                            <li><a href="#" class="hover:text-accent transition-colors">Syarat & Ketentuan</a></li>
                            <li><a href="#" class="hover:text-accent transition-colors">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-24 pt-10 border-t border-white/10 flex flex-col md:row items-center justify-between gap-8">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">&copy; 2026 Jakarta Youth Achievement Award. Professional Excellence.</p>
                <div class="text-[10px] font-bold text-slate-400 bg-white/5 px-6 py-3 rounded-full italic tracking-tighter">
                    Managed by MNCU Team
                </div>
            </div>
        </div>
    </footer>

    <script>
        feather.replace();
    </script>
</body>

</html>