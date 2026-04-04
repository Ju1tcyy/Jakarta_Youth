<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Jakarta Youth Achievement Award') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #00529b; /* MNC Blue */
            --secondary: #003d73;
            --accent: #38bdf8;
            --dark: #0f172a;
            --light: #f8fafc;
            --white: #ffffff;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.4);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--light);
            color: #334155;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
        }

        .sidebar-item-active {
            background: linear-gradient(90deg, rgba(79,70,229,0.1) 0%, rgba(255,255,255,0) 100%);
            color: #4f46e5;
            border-left: 4px solid #4f46e5;
            font-weight: 700;
        }

        .gradient-header {
            background: linear-gradient(-45deg, #00529b, #1e3a8a, #003d73, #312e81);
            background-size: 400% 400%;
            animation: gradientAnim 15s ease infinite;
        }

        @keyframes gradientAnim {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .btn-primary {
            background: linear-gradient(135deg, #00529b, #1e3a8a);
            color: white;
            box-shadow: 0 4px 15px rgba(0,82,155,0.3);
            transition: all 0.3s;
        }
        .btn-primary:hover {
            opacity: 0.95;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,82,155,0.4);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        @media (max-width: 768px) {
            .mobile-sidebar {
                position: fixed;
                bottom: 0; left: 0; right: 0;
                height: 70px; width: 100% !important;
                z-index: 100; flex-direction: row !important;
                box-shadow: 0 -4px 20px rgba(0,0,0,0.1);
            }
            .mobile-sidebar-header { display: none; }
            .mobile-nav { 
                flex-direction: row !important; padding: 0 !important;
                justify-content: space-around; width: 100%;
            }
            .mobile-nav a { flex-direction: column; font-size: 10px; padding: 10px !important; }
            .mobile-nav i { margin-right: 0 !important; margin-bottom: 4px; }
            .mobile-user-profile { display: none !important; }
            main { padding-bottom: 80px; }
        }
    </style>
</head>
<body class="bg-slate-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-xl flex flex-col h-screen z-50 mobile-sidebar border-r border-slate-100">
            <div class="p-8 border-b flex-shrink-0 mobile-sidebar-header">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('icon/logo_fix.png') }}" alt="Logo JYAA" class="h-20 w-auto max-w-full object-contain">
                </div>
                <div class="mt-4">
                    <h1 class="text-xs font-black text-slate-400 tracking-[0.2em] uppercase text-center">Management</h1>
                </div>
            </div>
            
            <nav class="p-4 flex-1 overflow-y-auto mobile-nav flex flex-col">
                <div class="mb-6 mobile-nav-group">
                    <p class="text-[10px] font-black text-slate-300 mb-3 px-4 tracking-widest uppercase mobile-sidebar-header">Utama</p>
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('juri.dashboard') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('*.dashboard') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="grid" class="w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                @if(Auth::user()->role === 'admin')
                <div class="mb-6 mobile-nav-group">
                    <p class="text-[10px] font-black text-slate-300 mb-3 px-4 tracking-widest uppercase mobile-sidebar-header">Database</p>
                    <a href="{{ route('sekolah.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('sekolah.*') ? 'sidebar-item-active border-indigo-600 bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="award" class="w-5 h-5 mr-3"></i>
                        <span>Data Pendaftar</span>
                    </a>

                    <!-- Dropdown Leaderboard Penilaian -->
                    <div class="mb-2">
                        <button onclick="toggleLeaderboard()" class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.leaderboard.*') ? 'sidebar-item-active bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50' }}">
                            <div class="flex items-center">
                                <i data-feather="bar-chart-2" class="w-5 h-5 mr-3"></i>
                                <span>Leaderboard</span>
                            </div>
                            <i data-feather="chevron-down" id="lb-chevron" class="w-4 h-4 transition-transform duration-200 {{ request()->routeIs('admin.leaderboard.*') ? 'rotate-180' : '' }}"></i>
                        </button>
                        <div id="lb-menu" class="pl-12 pr-4 pt-2 pb-2 space-y-1 {{ request()->routeIs('admin.leaderboard.*') ? 'block' : 'hidden' }}">
                            <a href="{{ route('admin.leaderboard', 'innovation') }}" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('admin/leaderboard/innovation') ? 'text-indigo-600 font-bold bg-white' : 'text-slate-500 hover:text-indigo-600 hover:bg-white' }}">
                                Innovation
                            </a>
                            <a href="{{ route('admin.leaderboard', 'social_impact') }}" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('admin/leaderboard/social_impact') ? 'text-indigo-600 font-bold bg-white' : 'text-slate-500 hover:text-indigo-600 hover:bg-white' }}">
                                Social Impact
                            </a>
                            <a href="{{ route('admin.leaderboard', 'media') }}" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('admin/leaderboard/media') ? 'text-indigo-600 font-bold bg-white' : 'text-slate-500 hover:text-indigo-600 hover:bg-white' }}">
                                Media
                            </a>
                            <a href="{{ route('admin.leaderboard', 'video_reels') }}" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('admin/leaderboard/video_reels') ? 'text-indigo-600 font-bold bg-white' : 'text-slate-500 hover:text-indigo-600 hover:bg-white' }}">
                                Video Reels
                            </a>
                            <a href="{{ route('admin.leaderboard', 'president') }}" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('admin/leaderboard/president') ? 'text-indigo-600 font-bold bg-white' : 'text-slate-500 hover:text-indigo-600 hover:bg-white' }}">
                                President
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mb-6 mobile-nav-group">
                    <p class="text-[10px] font-black text-slate-300 mb-3 px-4 tracking-widest uppercase mobile-sidebar-header">Pengaturan</p>
                    <a href="{{ route('admin.juri.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.juri.*') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="users" class="w-5 h-5 mr-3"></i>
                        <span>Manajemen Juri</span>
                    </a>
                    <a href="{{ route('admin.panitia.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.panitia.*') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="shield" class="w-5 h-5 mr-3"></i>
                        <span>Manajemen Panitia</span>
                    </a>
                </div>
                @endif
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t flex-shrink-0 mobile-user-profile">
                <div class="bg-slate-50 rounded-2xl p-4 flex items-center justify-between border border-slate-100">
                    <div class="flex items-center overflow-hidden">
                        <div class="w-10 h-10 gradient-header rounded-xl flex items-center justify-center text-white font-black mr-3 shrink-0">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-xs font-black text-slate-800 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[9px] font-bold text-slate-400 truncate uppercase tracking-tighter">Authorized Admin</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}" class="shrink-0 ml-2">
                        @csrf
                        <button type="submit" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all duration-200" title="Log Out">
                            <i data-feather="log-out" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto relative">
            <!-- Header -->
            <header class="gradient-header sticky top-0 z-40">
                <div class="px-10 py-8 flex justify-between items-center text-white">
                    <div>
                        <div class="flex items-center space-x-2 mb-1">
                            <span class="flex h-2 w-2 rounded-full bg-cyan-400 shadow-lg shadow-cyan-400/50"></span>
                            <span class="text-[10px] font-black tracking-widest uppercase opacity-70">Jakarta Youth Achievement Award</span>
                        </div>
                        <h2 class="text-3xl font-black tracking-tight">@yield('page-title', 'Overview')</h2>
                    </div>
                    <div class="text-right hidden sm:block border-l border-white/10 pl-8">
                        <p class="text-[10px] font-black tracking-widest uppercase opacity-60 mb-1">Server Status</p>
                        <div class="flex items-center justify-end">
                            <span class="text-xl font-black mr-1">{{ now()->format('H:i') }}</span>
                            <span class="text-[10px] font-bold bg-white/20 px-1.5 py-0.5 rounded uppercase">{{ now()->format('T') }}</span>
                        </div>
                    </div>
                </div>
                <!-- Wave/Curve Effect -->
                <div class="h-6 bg-slate-50 rounded-t-[40px] -mt-1 shadow-[0_-10px_20px_rgba(0,0,0,0.05)]"></div>
            </header>

            <!-- Content Container -->
            <div class="px-10 pb-16 -mt-6">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Toggle Menu Script -->
    <script>
        function toggleLeaderboard() {
            const menu = document.getElementById('lb-menu');
            const chevron = document.getElementById('lb-chevron');
            if(menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                menu.classList.add('block');
                chevron.classList.add('rotate-180');
            } else {
                menu.classList.add('hidden');
                menu.classList.remove('block');
                chevron.classList.remove('rotate-180');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            feather.replace({ 'width': 18, 'height': 18 });
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#00529b',
                background: '#ffffff',
                customClass: {
                    title: 'font-outfit',
                    container: 'font-inter'
                }
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonColor: '#00529b'
            });
        @endif
    </script>
</body>
</html>
