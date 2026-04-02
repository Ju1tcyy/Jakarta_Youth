<x-guest-layout>
    <div class="space-y-12 animate-fade-up">
        <div class="text-center space-y-10">
            <div class="space-y-4">
                <h1 class="text-4xl font-black text-primary tracking-tighter uppercase italic">
                    Pendaftaran <span class="text-accent underline decoration-4 underline-offset-8">Organisasi.</span>
                </h1>
                <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.3em]">Lengkapi formulir di bawah ini untuk mendaftar</p>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-10" id="registrationForm">
            @csrf

            <!-- Account Credentials -->
            <div class="space-y-8">
                <div class="flex items-center gap-4">
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em] whitespace-nowrap">Kredensial Akun</span>
                    <div class="h-px w-full bg-slate-100"></div>
                </div>

                <div class="group space-y-4">
                    <label for="name" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Nama Lengkap Pendaftar</label>
                    <div class="relative">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                            placeholder="Nama Lengkap Anda">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                            <i data-feather="user" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 ml-2" />
                </div>

                <div class="space-y-4 group">
                    <label for="email" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Alamat Email</label>
                    <div class="relative">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                            class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                            placeholder="nama@email.com">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                            <i data-feather="mail" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 ml-2" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="space-y-4 group">
                        <label for="password" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Kata Sandi</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                                placeholder="••••••••">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                <i data-feather="lock" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 ml-2" />
                    </div>

                    <div class="space-y-4 group">
                        <label for="password_confirmation" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Konfirmasi</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                                placeholder="••••••••">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                <i data-feather="check-circle" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div class="space-y-8 animate-fade-up delay-100">
                <div class="flex items-center gap-4">
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em] whitespace-nowrap">Informasi Organisasi</span>
                    <div class="h-px w-full bg-slate-100"></div>
                </div>

                <div class="group space-y-4">
                    <label for="nama_organisasi" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Nama Organisasi</label>
                    <div class="relative">
                        <input id="nama_organisasi" type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}" required
                            class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                            placeholder="OSIS / MPK / Komunitas">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                            <i data-feather="users" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('nama_organisasi')" class="mt-2 ml-2" />
                </div>

                <div class="group space-y-4">
                    <label for="nama_sekolah" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Asal Sekolah</label>
                    <div class="relative">
                        <input id="nama_sekolah" type="text" name="nama_sekolah" value="{{ old('nama_sekolah') }}" required
                            class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                            placeholder="SMKN 1 Jakarta">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                            <i data-feather="map-pin" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('nama_sekolah')" class="mt-2 ml-2" />
                </div>

                <div class="group space-y-4">
                    <label for="nomor_wa" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Nomor WhatsApp</label>
                    <div class="relative">
                        <input id="nomor_wa" type="text" name="nomor_wa" value="{{ old('nomor_wa') }}" required
                            class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                            placeholder="0812XXXXXXXX">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                            <i data-feather="phone" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('nomor_wa')" class="mt-2 ml-2" />
                </div>

                <div class="group space-y-4">
                    <label for="alamat" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Alamat Lengkap</label>
                    <div class="relative">
                        <textarea id="alamat" name="alamat" required rows="3"
                            class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                            placeholder="Jl. Raya No. 1, Jakarta...">{{ old('alamat') }}</textarea>
                        <div class="absolute left-6 top-4 text-slate-400 group-focus-within:text-primary transition-colors">
                            <i data-feather="home" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2 ml-2" />
                </div>
            </div>

            <!-- reCAPTCHA -->
            <div class="flex flex-col items-center pt-4 gap-2">
                <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}"></div>
                @if($errors->has('g-recaptcha-response'))
                    <p class="text-xs font-bold text-red-500 text-center">{{ $errors->first('g-recaptcha-response') }}</p>
                @endif
            </div>

            <button type="submit"
                class="group w-full bg-primary text-white py-6 rounded-3xl font-black text-sm uppercase tracking-[0.3em] hover:bg-slate-900 shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-4">
                Daftar Sekarang
                <i data-feather="check" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
            </button>
        </form>

        <div class="pt-10 border-t border-slate-100 text-center">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sudah memiliki akun?
                <a href="{{ route('login') }}"
                    class="text-primary hover:text-accent ml-2 font-black underline underline-offset-8 decoration-2 decoration-primary/10 hover:decoration-accent transition-all">Masuk</a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
            
            // Form validation for reCAPTCHA
            const form = document.getElementById('registrationForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const recaptchaResponse = grecaptcha.getResponse();
                    if (!recaptchaResponse) {
                        e.preventDefault();
                        alert('Mohon selesaikan verifikasi reCAPTCHA terlebih dahulu.');
                        return false;
                    }
                });
            }
        });
    </script>
</x-guest-layout>
