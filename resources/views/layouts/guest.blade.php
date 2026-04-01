<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Youth Generation') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Satisfy&display=swap" rel="stylesheet">

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
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            500: '#012B6E',
                            600: '#012052',
                            700: '#011638',
                        },
                        secondary: {
                            50: '#fffbeb',
                            500: '#FFD700',
                            600: '#e6c200',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --primary: #012B6E;
            --accent: #FFD700;
        }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc; 
            -webkit-font-smoothing: antialiased; 
        }
    </style>
</head>

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