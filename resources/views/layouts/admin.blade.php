<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Youth Generation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
        }
        .sidebar-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .flex {
                flex-direction: column;
            }
            
            aside {
                width: 100% !important;
                order: 2;
            }
            
            main {
                order: 1;
            }
            
            header {
                padding: 15px 20px !important;
                flex-direction: column;
                text-align: center;
            }
            
            header > div:first-child {
                margin-bottom: 10px;
            }
            
            header h2 {
                font-size: 1.5rem !important;
            }
            
            .p-8 {
                padding: 15px !important;
            }
            
            .p-6 {
                padding: 20px !important;
            }
            
            .grid {
                grid-template-columns: 1fr !important;
                gap: 15px !important;
            }
            
            .px-6 {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }
            
            .py-3 {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
            
            .text-2xl {
                font-size: 1.25rem !important;
            }
            
            .text-3xl {
                font-size: 1.5rem !important;
            }
            
            .h-16 {
                height: 3rem !important;
            }
            
            .w-16 {
                width: 3rem !important;
            }
        }
        
        @media (max-width: 480px) {
            .p-8 {
                padding: 10px !important;
            }
            
            .p-6 {
                padding: 15px !important;
            }
            
            header {
                padding: 10px 15px !important;
            }
            
            .px-6 {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }
            
            .py-4 {
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }
            
            .text-xs {
                font-size: 0.65rem !important;
            }
            
            .text-sm {
                font-size: 0.75rem !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex flex-col h-screen">
            <div class="p-6 border-b flex-shrink-0">
                <div class="flex items-center">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="Youth Generation Logo" class="h-16 w-16 mr-4">
                    <div>
                        <h1 class="text-xl font-bold text-orange-500">Youth Generation</h1>
                        <p class="text-xs text-gray-500">MANAGEMENT PANEL</p>
                    </div>
                </div>
            </div>
            
            <nav class="p-4 flex-1 overflow-y-auto">
                <div class="mb-6">
                    <p class="text-xs font-semibold text-gray-400 mb-2 px-3">MAIN MENU</p>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 mb-1 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-orange-50 text-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                </div>

                <div class="mb-6">
                    <p class="text-xs font-semibold text-gray-400 mb-2 px-3">MASTER DATA</p>
                    <a href="{{ route('ketos.index') }}" class="flex items-center px-3 py-2 mb-1 rounded {{ request()->routeIs('ketos.*') ? 'bg-orange-50 text-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                        </svg>
                        Data Ketos
                    </a>
                    <a href="{{ route('sekolah.index') }}" class="flex items-center px-3 py-2 mb-1 rounded {{ request()->routeIs('sekolah.*') ? 'bg-orange-50 text-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Data Organisasi
                    </a>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="p-4 flex-shrink-0">
                <div class="bg-orange-50 rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Keluar Sistem">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-gradient-to-r from-red-500 to-orange-500 shadow-sm">
                <div class="px-8 py-4 flex justify-between items-center">
                    <div>
                        <span class="text-xs text-white font-semibold opacity-90">● LIVE DASHBOARD</span>
                        <h2 class="text-2xl font-bold text-white mt-1">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-white opacity-75">HARI INI</p>
                        <p class="text-2xl font-bold text-white">{{ now()->format('d') }}</p>
                        <p class="text-xs text-white opacity-75">{{ now()->format('F Y') }}</p>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
