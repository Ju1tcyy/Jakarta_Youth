<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jakarta Youth Achievement Award') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Satisfy&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #012B6E; /* Navy */
            --primary-dark: #011d47;
            --accent: #FFD700; /* Yellow */
            --dark: #1e293b;
            --light: #fff;
        }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc; 
            color: #1e293b; 
            -webkit-font-smoothing: antialiased; 
        }

        /* Selection */
        ::selection { background-color: var(--accent); color: var(--primary); }

        .human-accent { font-family: 'Satisfy', cursive; color: var(--accent); }
        .solid-card { 
            background: #fff; 
            border: 1px solid #f1f5f9; 
            border-radius: 1.5rem; 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .solid-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(1, 43, 110, 0.12);
            border-color: var(--primary);
        }

        /* Premium Grid Texture */
        .bg-grid-navy {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
        }

        /* Staggered Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }

        .btn-primary { background: var(--primary); color: #fff; border-radius: 0.75rem; transition: all 0.2s; }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
        .btn-accent { background: var(--accent); color: var(--primary); border-radius: 0.75rem; font-weight: 800; transition: all 0.2s; }
        .btn-accent:hover { background: #E6C200; transform: translateY(-1px); }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white border-b border-slate-200 relative z-20">
                <div class="max-w-7xl mx-auto py-8 px-6 lg:px-8">
                    <h2 class="text-2xl font-extrabold text-slate-800 uppercase tracking-tight">
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
        feather.replace({ 'width': 18, 'height': 18 });
    </script>
</body>
</html>
