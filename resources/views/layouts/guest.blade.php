<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Youth Generation') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
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
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .glass-premium {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .bg-pattern {
            background-color: #f8fafc;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23e11d48' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-blob {
            filter: blur(80px);
            opacity: 0.4;
            animation: move 20s infinite alternate;
        }

        @keyframes move {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(20px, 20px) scale(1.1); }
        }
    </style>
</head>

<body class="bg-pattern text-slate-900 selection:bg-rose-100 selection:text-rose-700">
    <!-- Animated Background Accents -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="hero-blob absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-rose-200 rounded-full"></div>
        <div class="hero-blob absolute bottom-[-10%] left-[-10%] w-[500px] h-[500px] bg-orange-200 rounded-full" style="animation-delay: -5s;"></div>
    </div>

    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative z-10">
        <!-- Premium Logo Header -->
        <div class="mb-8 transform hover:scale-105 transition-transform duration-500">
            <a href="/" class="block">
                <div class="h-32 sm:h-48 flex items-center justify-center">
                    <img src="{{ asset('icon/logo_collab.png') }}" alt="Logo" 
                        class="h-full w-auto object-contain drop-shadow-[0_10px_20px_rgba(225,29,72,0.2)]">
                </div>
            </a>
        </div>

        <!-- Auth Card -->
        <div class="w-full sm:max-w-md lg:max-w-lg glass-premium rounded-[40px] overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-rose-900/5">
            <div class="px-8 py-10 sm:px-12 sm:py-14">
                {{ $slot }}
            </div>
        </div>

        <!-- Minimalist Footer -->
        <div class="mt-12 text-center">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.4em] mb-2">Jakarta Youth Achievement Award</p>
            <div class="h-[1px] w-8 bg-rose-200 mx-auto rounded-full"></div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>