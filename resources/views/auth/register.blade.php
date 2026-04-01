<x-guest-layout>
    <div class="text-center mb-12">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-[28px] bg-gradient-to-br from-orange-50 to-white text-orange-600 mb-8 shadow-xl shadow-orange-900/5 border border-orange-100/50">
            <i data-feather="user-plus" class="w-10 h-10 stroke-[1.5]"></i>
        </div>
        <h1 class="text-3xl font-black text-slate-900 font-outfit tracking-tight leading-tight uppercase italic">
            Mulai <span class="text-orange-600">Perjalanan.</span>
        </h1>
        <p class="text-slate-500 font-medium text-sm mt-4 tracking-wide uppercase">Daftarkan diri atau organisasi Anda.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-8" id="registrationForm">
        @csrf

        <!-- Role Selection (Hidden) -->
        <input type="hidden" name="role" id="role_input" value="{{ request('role', old('role', 'ketos')) }}">
        
        <!-- Credential Section -->
        <div class="space-y-6">
            <div class="flex items-center gap-4 mb-2">
                <div class="h-px flex-1 bg-slate-100"></div>
                <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">Kredensial Akun</span>
                <div class="h-px flex-1 bg-slate-100"></div>
            </div>

            <div class="group">
                <label for="email" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Alamat Email</label>
                <div class="relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                        placeholder="nama@email.com">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                        <i data-feather="mail" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 ml-2" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="group">
                    <label for="password" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Kata Sandi</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="••••••••">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="lock" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 ml-2" />
                </div>

                <div class="group">
                    <label for="password_confirmation" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Konfirmasi</label>
                    <div class="relative">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="••••••••">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="check-circle" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>
            </div>
            <p id="password_error" class="text-[10px] font-bold text-rose-500 mt-2 ml-2 hidden">Kata sandi tidak cocok!</p>
        </div>

        <!-- Dynamic Content Section -->
        <div id="dynamic_fields_container" class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
            <div class="flex items-center gap-4 mb-2">
                <div class="h-px flex-1 bg-slate-100"></div>
                <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">Informasi Profil</span>
                <div class="h-px flex-1 bg-slate-100"></div>
            </div>

            <!-- Ketos Fields -->
            <div id="ketos_fields" class="space-y-6 hidden">
                <div class="group">
                    <label for="name" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Nama Lengkap</label>
                    <div class="relative">
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="Contoh: Budi Santoso">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="user" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 ml-2" />
                </div>

                <div class="group">
                    <label for="asal_sekolah_ketos" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Asal Sekolah</label>
                    <div class="relative">
                        <input id="asal_sekolah_ketos" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="Contoh: SMAN 1 Jakarta">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="map-pin" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="tempat_lahir" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Tempat Lahir</label>
                        <input id="tempat_lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-6 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 outline-none shadow-sm"
                            placeholder="Jakarta">
                    </div>
                    <div class="group">
                        <label for="tanggal_lahir" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Tgl Lahir</label>
                        <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-6 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 outline-none shadow-sm">
                    </div>
                </div>

                <div class="group">
                    <label for="nomor_wa_ketos" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Nomor WhatsApp</label>
                    <div class="relative">
                        <input id="nomor_wa_ketos" type="text" name="nomor_wa" value="{{ old('nomor_wa') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="08123456789">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="phone" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Organisasi Fields -->
            <div id="organisasi_fields" class="space-y-6 hidden">
                <div class="group">
                    <label for="asal_sekolah_org" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Nama Sekolah</label>
                    <div class="relative">
                        <input id="asal_sekolah_org" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="Contoh: SMKN 2 Jakarta">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="map-pin" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <label for="nama_organisasi" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Nama Organisasi</label>
                    <div class="relative">
                        <input id="nama_organisasi" type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="Contoh: OSIS / MPK">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="users" class="w-5 h-5"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('nama_organisasi')" class="mt-2 ml-2" />
                </div>

                <div class="group">
                    <label for="alamat" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Alamat Lengkap</label>
                    <div class="relative">
                        <textarea id="alamat" name="alamat" rows="3"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="Alamat sekolah atau domisili organisasi">{{ old('alamat') }}</textarea>
                        <div class="absolute left-5 top-6 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="map" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <label for="nomor_wa_org" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">WhatsApp Admin</label>
                    <div class="relative">
                        <input id="nomor_wa_org" type="text" name="nomor_wa" value="{{ old('nomor_wa') }}"
                            class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                            placeholder="08123456789">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                            <i data-feather="phone" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6" id="submit_container" style="display: none;">
            <button type="submit" id="submit_btn" class="group relative w-full bg-slate-900 text-white rounded-3xl py-6 font-black text-xs uppercase tracking-[0.3em] overflow-hidden transition-all hover:bg-rose-600 hover:shadow-2xl hover:shadow-rose-900/40 active:scale-95">
                <span class="relative z-10 flex items-center justify-center gap-3">
                    Lanjutkan Pendaftaran
                    <i data-feather="check" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                </span>
            </button>
        </div>
    </form>

    <div class="mt-12 pt-10 border-t border-slate-100 text-center">
        <p class="text-xs font-bold text-slate-400">Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="text-rose-600 hover:text-rose-800 ml-1 font-black underline underline-offset-4 decoration-2 decoration-rose-100 hover:decoration-rose-500 transition-all">Masuk Sekarang</a>
        </p>
    </div>

    <script>
        function toggleFields() {
            const role = document.getElementById('role_input').value;
            const ketosFields = document.getElementById('ketos_fields');
            const organisasiFields = document.getElementById('organisasi_fields');
            const submitContainer = document.getElementById('submit_container');

            const ketosInputs = ketosFields.querySelectorAll('input, select, textarea');
            const orgInputs = organisasiFields.querySelectorAll('input, select, textarea');

            if (role === 'ketos') {
                ketosFields.classList.remove('hidden');
                organisasiFields.classList.add('hidden');
                ketosInputs.forEach(input => input.disabled = false);
                orgInputs.forEach(input => input.disabled = true);
            } else if (role === 'organisasi') {
                ketosFields.classList.add('hidden');
                organisasiFields.classList.remove('hidden');
                ketosInputs.forEach(input => input.disabled = true);
                orgInputs.forEach(input => input.disabled = false);
            }
            
            submitContainer.style.display = 'block';
            feather.replace();
        }

        window.addEventListener('DOMContentLoaded', () => {
            toggleFields();
            
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const errorEl = document.getElementById('password_error');
            const submitBtn = document.getElementById('submit_btn');
            
            function validatePassword() {
                if (confirmPassword.value && password.value !== confirmPassword.value) {
                    errorEl.classList.remove('hidden');
                    confirmPassword.classList.add('border-rose-500');
                    confirmPassword.classList.remove('border-slate-100');
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    return false;
                } else {
                    errorEl.classList.add('hidden');
                    confirmPassword.classList.remove('border-rose-500');
                    confirmPassword.classList.add('border-slate-100');
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    return true;
                }
            }
            
            password.addEventListener('input', validatePassword);
            confirmPassword.addEventListener('input', validatePassword);

            const form = document.getElementById('registrationForm');
            form.addEventListener('submit', function(e) {
                if (!validatePassword() || password.value !== confirmPassword.value) {
                    e.preventDefault();
                    errorEl.classList.remove('hidden');
                    errorEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        });
    </script>
</x-guest-layout>
