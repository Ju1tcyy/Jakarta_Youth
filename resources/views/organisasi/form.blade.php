<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Seleksi Organisasi | Jakarta Youth Achievement Award 2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        :root {
            --primary: #e53e3e;
            --primary-light: #fee2e2;
            --secondary: #dd6b20;
            --dark: #0f172a;
        }
        body { font-family: 'Inter', sans-serif; background-color: #fcfcfc; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .bg-gradient-jyaa { background: linear-gradient(135deg, #e53e3e 0%, #dd6b20 100%); }
    </style>
</head>
<body class="text-slate-800 min-h-screen flex items-center justify-center p-6 relative overflow-x-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-red-100/50 rounded-full blur-[100px] -z-10 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-orange-100/50 rounded-full blur-[100px] -z-10 translate-x-1/2 translate-y-1/2"></div>

    <div class="w-full max-w-2xl">
        <!-- Header Info -->
        <div class="text-center mb-10">
            <a href="{{ route('home') }}" class="inline-flex items-center text-xs font-black text-slate-400 uppercase tracking-widest hover:text-red-600 transition-colors mb-8">
                <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i> Kembali ke Beranda
            </a>
            <div class="mb-2 mt-4 w-[95%] sm:w-full max-w-[800px] h-[60px] sm:h-[110px] flex justify-center items-center mx-auto overflow-hidden">
                <img src="{{ asset('icon/logo_fix.png') }}" alt="Logo JYAA" class="w-[120%] sm:w-full h-auto drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
            </div>
            <h1 class="text-3xl font-black text-slate-900 font-outfit uppercase tracking-tight italic">Registrasi Organisasi</h1>
            <p class="text-slate-500 mt-2 font-medium">Daftarkan ekstrakurikuler atau organisasi kepemudaan Anda.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[40px] p-8 lg:p-12 shadow-2xl shadow-red-900/5 border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1.5 h-full bg-gradient-jyaa"></div>

            <form action="{{ route('organisasi.store') }}" method="POST" id="registrationForm" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Sekolah -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Sekolah</label>
                        <div class="relative group">
                            <i data-feather="home" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 group-focus-within:text-red-500 transition-colors"></i>
                            <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah') }}" required placeholder="Contoh: SMA Negeri 1 Jakarta"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500/10 focus:border-red-500 transition-all font-medium text-sm">
                        </div>
                        @error('nama_sekolah') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nama Organisasi -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Organisasi</label>
                        <div class="relative group">
                            <i data-feather="award" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 group-focus-within:text-red-500 transition-colors"></i>
                            <input type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}" required placeholder="Contoh: OSIS SMAN 1"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500/10 focus:border-red-500 transition-all font-medium text-sm">
                        </div>
                        @error('nama_organisasi') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Resmi Organisasi</label>
                        <div class="relative group">
                            <i data-feather="mail" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 group-focus-within:text-red-500 transition-colors"></i>
                            <input type="email" name="email_organisasi" value="{{ old('email_organisasi') }}" required placeholder="osis@sekolah.sch.id"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500/10 focus:border-red-500 transition-all font-medium text-sm">
                        </div>
                        @error('email_organisasi') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password Dashboard</label>
                        <div class="relative group">
                            <i data-feather="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 group-focus-within:text-red-500 transition-colors"></i>
                            <input type="password" name="password" required placeholder="Min. 8 karakter"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500/10 focus:border-red-500 transition-all font-medium text-sm">
                        </div>
                        @error('password') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nomor WA -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nomor WA Narahubung</label>
                        <div class="relative group">
                            <i data-feather="phone" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 group-focus-within:text-red-500 transition-colors"></i>
                            <input type="text" name="nomor_wa" value="{{ old('nomor_wa') }}" required placeholder="08xxxxxxxxxx"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500/10 focus:border-red-500 transition-all font-medium text-sm">
                        </div>
                        @error('nomor_wa') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Lengkap Sekolah</label>
                        <div class="relative group">
                            <i data-feather="map-pin" class="absolute left-4 top-6 -translate-y-1/2 w-4 h-4 text-slate-400 group-focus-within:text-red-500 transition-colors"></i>
                            <textarea name="alamat" required placeholder="Masukkan alamat lengkap dengan kecamatan dan kota"
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500/10 focus:border-red-500 transition-all font-medium text-sm min-h-[120px]">{{ old('alamat') }}</textarea>
                        </div>
                        @error('alamat') <p class="text-[10px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- reCAPTCHA -->
                <div class="flex flex-col items-center pt-4 gap-2">
                    <div id="recaptcha-container"></div>
                    @if($errors->has('g-recaptcha-response'))
                        <p class="text-[10px] text-red-500 font-bold text-center">{{ $errors->first('g-recaptcha-response') }}</p>
                    @endif
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-gradient-jyaa text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] shadow-xl shadow-red-200 hover:scale-[1.02] transition-all flex items-center justify-center">
                        <i data-feather="check-circle" class="w-4 h-4 mr-2"></i> Selesaikan Pendaftaran
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer Info -->
        <p class="text-center text-xs font-bold text-slate-400 mt-10 uppercase tracking-widest">
            Jakarta Youth Achievement Award © 2026
        </p>
    </div>

    <script>
        feather.replace();
        
        let recaptchaWidgetId;
        
        function onRecaptchaLoad() {
            console.log('reCAPTCHA loaded successfully');
            const container = document.getElementById('recaptcha-container');
            if (container && typeof grecaptcha !== 'undefined') {
                recaptchaWidgetId = grecaptcha.render('recaptcha-container', {
                    'sitekey': '{{ config('recaptcha.site_key') }}',
                    'theme': 'light'
                });
                console.log('reCAPTCHA widget rendered');
            }
        }
        
        // Try to load reCAPTCHA when page loads
        if (typeof grecaptcha !== 'undefined' && grecaptcha.render) {
            onRecaptchaLoad();
        } else {
            // Wait for grecaptcha to load
            let attempts = 0;
            const checkInterval = setInterval(function() {
                attempts++;
                if (typeof grecaptcha !== 'undefined' && grecaptcha.render) {
                    clearInterval(checkInterval);
                    onRecaptchaLoad();
                } else if (attempts > 50) {
                    clearInterval(checkInterval);
                    console.error('reCAPTCHA failed to load');
                }
            }, 100);
        }

        // Form validation for reCAPTCHA
        const form = document.getElementById('registrationForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (typeof grecaptcha === 'undefined') {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'reCAPTCHA Error',
                        text: 'reCAPTCHA belum dimuat. Silakan refresh halaman.',
                        confirmButtonColor: '#e53e3e'
                    });
                    return false;
                }
                
                const recaptchaResponse = grecaptcha.getResponse(recaptchaWidgetId);
                if (!recaptchaResponse) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Verifikasi Diperlukan',
                        text: 'Mohon selesaikan verifikasi reCAPTCHA terlebih dahulu.',
                        confirmButtonColor: '#e53e3e'
                    });
                    return false;
                }
            });
        }

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Data Belum Lengkap',
                text: 'Mohon periksa kembali isian formulir Anda.',
                confirmButtonColor: '#e53e3e'
            });
        @endif
    </script>
</body>
</html>
