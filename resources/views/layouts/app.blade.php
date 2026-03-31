<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jakarta Youth') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #00529b; /* MNC Blue */
            --secondary: #003d73;
            --accent: #38bdf8;
            --dark: #0f172a;
            --light: #f8fafc;
        }
        body { font-family: 'Inter', sans-serif; background-color: var(--light); color: #334155; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #00529b 0%, #003d73 100%); }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white border-b border-slate-100 shadow-sm relative z-20">
                <div class="max-w-7xl mx-auto py-8 px-6 lg:px-8">
                    <h2 class="text-3xl font-black text-slate-800 font-outfit uppercase tracking-tight">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="py-12 relative z-10 px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
