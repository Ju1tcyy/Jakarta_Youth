<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

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
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
                            DEFAULT: '#012B6E',
                            600: '#01245a',
                        },
                        accent: {
                            DEFAULT: '#FFD700',
                            600: '#E6C200',
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
            -webkit-font-smoothing: antialiased;
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

        .animate-fade-up {
            animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }

        /* Premium Card */
        .solid-card {
            background: #fff;
            border: 1px solid #f1f5f9;
            border-radius: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(1, 43, 110, 0.15);
        }
    </style>
</head>

<body class="bg-primary bg-grid-navy min-h-screen flex flex-col font-sans selection:bg-accent selection:text-primary overflow-x-hidden">
    
    <!-- Branding Header -->
    <div class="mb-2 flex justify-center animate-fade-up">
        <a href="/">
            <img src="{{ asset('icon/logo_fix.png') }}" class="h-44 w-auto object-contain" alt="JYAA Logo">
        </a>
    </div>

    <!-- Main Auth Content -->
    <div class="flex-1 flex items-center justify-center p-6 pt-4 pb-20 relative">
        <!-- Floating Decoration Assets -->
        <div class="absolute top-20 right-[5%] w-64 h-auto opacity-40 pointer-events-none animate-float hidden lg:block">
            <img src="{{ asset('icon/element1.png') }}" alt="Ondel-ondel">
        </div>
        <div class="absolute bottom-20 left-[5%] w-32 h-auto opacity-20 pointer-events-none animate-pulse-subtle">
            <img src="{{ asset('icon/element2.png') }}" alt="Star">
        </div>
        
        <div class="w-full max-w-lg lg:max-w-2xl relative z-10 animate-fade-up delay-100">
            <div class="solid-card overflow-hidden">
                <div class="px-8 py-12 sm:px-16 sm:py-16">
                    {{ $slot }}
                </div>
            </div>

            <!-- Portal Footer -->
            <div class="mt-12 text-center animate-fade-up delay-200">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em] mb-4">Jakarta Youth Achievement Award</p>
                <div class="h-[1px] w-12 bg-white/10 mx-auto rounded-full"></div>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>
