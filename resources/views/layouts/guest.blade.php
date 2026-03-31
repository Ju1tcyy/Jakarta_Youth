<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Youth Generation') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .bg-mnc {
            background-color: #00529b;
        }

        .text-mnc {
            color: #00529b;
        }

        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-slate-50 relative overflow-x-hidden min-h-screen">
    <!-- Background Accents -->
    <div
        class="absolute top-[-10%] right-[-10%] w-[50%] h-[50%] bg-red-100 rounded-full blur-[120px] opacity-70 z-0 pointer-events-none">
    </div>
    <div
        class="absolute bottom-[-10%] left-[-10%] w-[50%] h-[50%] bg-orange-100 rounded-full blur-[120px] opacity-70 z-0 pointer-events-none">
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pb-10 relative z-10 w-full overflow-hidden">
        <!-- Flawless Cropped Logo Container -->
        <div class="mb-2 mt-8 w-[95%] sm:w-full max-w-[800px] h-[60px] sm:h-[110px] flex justify-center items-center overflow-hidden mx-auto">
            <img src="{{ asset('icon/logo_collab.png') }}" alt="Logo" class="w-[120%] sm:w-full h-auto drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-10 py-12 glass shadow-2xl shadow-blue-900/10 overflow-hidden sm:rounded-[40px] border border-white">
            {{ $slot }}
        </div>

        <div class="mt-12 text-center">
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">© {{ date('Y') }} Jakarta Youth
                Achievement Award</p>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>