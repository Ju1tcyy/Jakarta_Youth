<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Youth Generation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6 border-b">
                <div class="flex items-center">
                    <img src="{{ asset('icon/logo jyaa.png') }}" alt="Youth Generation Logo" class="h-8 w-8 mr-3">
                    <div>
                        <h1 class="text-xl font-bold text-orange-500">Youth Generation</h1>
                        <p class="text-xs text-gray-500">MANAGEMENT PANEL</p>
                    </div>
                </div>
            </div>
            
            <nav class="p-4">
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

                <div class="border-t pt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center px-3 py-2 text-red-600 hover:bg-red-50 rounded w-full">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                            </svg>
                            Keluar Sistem
                        </button>
                    </form>
                </div>
            </nav>

            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-orange-50 rounded-lg p-3 flex items-center">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="px-8 py-4 flex justify-between items-center">
                    <div>
                        <span class="text-xs text-orange-500 font-semibold">● LIVE DASHBOARD</span>
                        <h2 class="text-2xl font-bold text-gray-800 mt-1">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-500">HARI INI</p>
                        <p class="text-2xl font-bold text-gray-800">{{ now()->format('d') }}</p>
                        <p class="text-xs text-gray-500">{{ now()->format('F Y') }}</p>
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
