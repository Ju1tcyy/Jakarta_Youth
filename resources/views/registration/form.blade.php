<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - Jakarta Youth Achievement Award</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #00529b; /* MNC Blue */
            --secondary: #003d73;
        }
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(0, 82, 155, 0.05), transparent),
                        radial-gradient(circle at bottom left, rgba(56, 189, 248, 0.05), transparent);
        }
    </style>
</head>
<body class="hero-gradient min-h-screen flex items-center justify-center p-6">
    <div class="max-w-xl w-full">
        <!-- Logo Section -->
        <div class="text-center mb-10">
            <a href="/">
                <img src="{{ asset('icon/logo collab.png') }}" alt="Logo" class="h-16 w-auto mx-auto drop-shadow-xl hover:scale-105 transition-transform duration-500">
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[40px] p-10 shadow-2xl shadow-blue-900/10 border border-white relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 opacity-5 text-blue-600 pointer-events-none">
                <i data-feather="edit-3" class="w-24 h-24"></i>
            </div>

            <div class="relative z-10">
                <div class="mb-10">
                    <h1 class="text-3xl font-black text-slate-800 font-outfit uppercase tracking-tight">Form Pendaftaran</h1>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">Daftarkan instansi dan organisasi Anda sekarang.</p>
                </div>

                <form action="{{ route('registration.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Nama Sekolah -->
                    <div>
                        <label for="nama_sekolah" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nama Sekolah / Instansi</label>
                        <div class="relative group">
                            <input type="text" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}" required
                                class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-blue-400 focus:ring-0 transition-all outline-none"
                                placeholder="Contoh: SMA Negeri 01 Jakarta">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors">
                                <i data-feather="home" class="w-5 h-5"></i>
                            </div>
                        </div>
                        @error('nama_sekolah')
                            <p class="text-[10px] font-bold text-red-500 mt-2 ml-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Organisasi -->
                    <div>
                        <label for="nama_organisasi" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nama Organisasi / OSIS</label>
                        <div class="relative group">
                            <input type="text" id="nama_organisasi" name="nama_organisasi" value="{{ old('nama_organisasi') }}" required
                                class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-blue-400 focus:ring-0 transition-all outline-none"
                                placeholder="Contoh: OSIS GARUDA">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors">
                                <i data-feather="shield" class="w-5 h-5"></i>
                            </div>
                        </div>
                        @error('nama_organisasi')
                            <p class="text-[10px] font-bold text-red-500 mt-2 ml-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Organisasi -->
                    <div>
                        <label for="email_organisasi" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Email Resmi Organisasi</label>
                        <div class="relative group">
                            <input type="email" id="email_organisasi" name="email_organisasi" value="{{ old('email_organisasi') }}" required
                                class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-blue-400 focus:ring-0 transition-all outline-none"
                                placeholder="osis@sekolah.sch.id">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors">
                                <i data-feather="mail" class="w-5 h-5"></i>
                            </div>
                        </div>
                        @error('email_organisasi')
                            <p class="text-[10px] font-bold text-red-500 mt-2 ml-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit" class="w-full bg-blue-600 text-white rounded-3xl py-5 font-black text-xs uppercase tracking-[0.3em] hover:bg-black hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-blue-200">
                            Ajukan Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">© 2026 Jakarta Youth Achievement Award</p>
        </div>
    </div>

    <script>
        feather.replace();

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#00529b',
                confirmButtonText: 'Kembali ke Beranda',
                background: '#ffffff',
                customClass: {
                    title: 'font-outfit',
                    container: 'font-inter'
                }
            });
        @endif
    </script>
</body>
</html>
