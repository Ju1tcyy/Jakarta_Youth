<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Youth Generation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
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
            background: rgba(0, 82, 155, 0.08); /* Light MNC Blue */
            color: var(--primary);
            border-left: 4px solid var(--primary);
            font-weight: 600;
        }

        .gradient-header {
            background: linear-gradient(135deg, #00529b 0%, #003d73 100%);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-1px);
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
                <div class="flex items-center">
                    <img src="{{ asset('icon/logo collab.png') }}" alt="Logo" class="h-10 w-auto max-w-[150px] object-contain">
                </div>
                <div class="mt-4">
                    <h1 class="text-xs font-black text-slate-400 tracking-[0.2em] uppercase">Management</h1>
                </div>
            </div>
            
            <nav class="p-4 flex-1 overflow-y-auto mobile-nav flex flex-col">
                <div class="mb-6 mobile-nav-group">
                    <p class="text-[10px] font-black text-slate-300 mb-3 px-4 tracking-widest uppercase mobile-sidebar-header">Utama</p>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="grid" class="w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <div class="mb-6 mobile-nav-group">
                    <p class="text-[10px] font-black text-slate-300 mb-3 px-4 tracking-widest uppercase mobile-sidebar-header">Database</p>
                    <a href="{{ route('ketos.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('ketos.*') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="users" class="w-5 h-5 mr-3"></i>
                        <span>Selection Peserta</span>
                    </a>
                    <a href="{{ route('sekolah.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-200 {{ request()->routeIs('sekolah.*') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50' }}">
                        <i data-feather="award" class="w-5 h-5 mr-3"></i>
                        <span>Selection Sekolah</span>
                    </a>
                </div>
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
                    
                    <form method="POST" action="{{ route('admin.logout') }}" class="shrink-0 ml-2">
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

    <script>
        feather.replace();

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
