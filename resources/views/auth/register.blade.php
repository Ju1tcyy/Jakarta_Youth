<x-guest-layout>
    <div class="text-center mb-10">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 text-red-600 mb-6 drop-shadow-md">
            <i data-feather="user-plus" class="w-8 h-8"></i>
        </div>
        <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-500 font-outfit tracking-tight">
            {{ request('role', old('role')) === 'organisasi' ? 'Registrasi Organisasi' : 'Registrasi Ketua OSIS' }}
        </h1>
        <p class="text-slate-500 font-medium text-sm mt-3 tracking-wide">Lengkapi data pendaftaran di bawah untuk membuat akun Anda.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registrationForm">
        @csrf

        <!-- Role Selection (Hidden) -->
        <input type="hidden" name="role" id="role_input" value="{{ request('role', old('role', 'ketos')) }}">
        <x-input-error :messages="$errors->get('role')" class="mt-2 text-center" />

        <!-- Common Fields (Email & Password) -->
        <div class="space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Alamat Email</label>
                <div class="relative group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="user@example.com">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="mail" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Kata Sandi</label>
                <div class="relative group">
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="••••••••">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="lock" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Konfirmasi Sandi</label>
                <div class="relative group">
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="••••••••">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="check-circle" class="w-5 h-5"></i>
                    </div>
                </div>
                <p id="password_error" class="text-[10px] font-bold text-red-500 mt-2 ml-1 hidden">Kata sandi dan konfirmasi sandi tidak cocok!</p>
            </div>
        </div>

        <div id="ketos_fields" class="space-y-6 hidden pt-6 border-t border-slate-50">
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nama Lengkap</label>
                <div class="relative group">
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="Contoh: Budi Santoso">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="user" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 ml-1" />
            </div>

            <!-- Asal Sekolah -->
            <div>
                <label for="asal_sekolah_ketos" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Asal Sekolah</label>
                <div class="relative group">
                    <input id="asal_sekolah_ketos" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="Contoh: SMAN 1 Jakarta">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="map-pin" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('asal_sekolah')" class="mt-2 ml-1" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="tempat_lahir" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Tempat Lahir</label>
                    <input id="tempat_lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="Jakarta">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Tgl Lahir</label>
                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none">
                </div>
            </div>

            <!-- Nomor WA -->
            <div>
                <label for="nomor_wa_ketos" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nomor WhatsApp</label>
                <div class="relative group">
                    <input id="nomor_wa_ketos" type="text" name="nomor_wa" value="{{ old('nomor_wa') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="08123456789">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="phone" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="organisasi_fields" class="space-y-6 hidden pt-6 border-t border-slate-50">
            <!-- Nama Sekolah -->
            <div>
                <label for="asal_sekolah_org" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nama Sekolah</label>
                <div class="relative group">
                    <input id="asal_sekolah_org" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="Contoh: SMKN 2 Jakarta">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="map-pin" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>

            <!-- Nama Organisasi -->
            <div>
                <label for="nama_organisasi" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nama Organisasi</label>
                <div class="relative group">
                    <input id="nama_organisasi" type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="Contoh: OSIS / MPK">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="users" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('nama_organisasi')" class="mt-2 ml-1" />
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Alamat Lengkap</label>
                <div class="relative group">
                    <textarea id="alamat" name="alamat" rows="3"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="Masukkan alamat sekolah atau domisili organisasi">{{ old('alamat') }}</textarea>
                    <div class="absolute left-4 top-6 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="map" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2 ml-1" />
            </div>

            <!-- Nomor WA -->
            <div>
                <label for="nomor_wa_org" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Nomor WhatsApp Admin</label>
                <div class="relative group">
                    <input id="nomor_wa_org" type="text" name="nomor_wa" value="{{ old('nomor_wa') }}"
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                        placeholder="08123456789">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                        <i data-feather="phone" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6" id="submit_container" style="display: none;">
            <button type="submit" id="submit_btn" class="w-full bg-gradient-to-r from-red-600 to-orange-500 text-white rounded-2xl py-5 font-black text-xs uppercase tracking-[0.3em] hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-red-900/20">
                Lanjutkan Pendaftaran
            </button>
        </div>
    </form>

    <div class="mt-10 pt-8 border-t border-slate-50 text-center">
        <p class="text-xs font-bold text-slate-400">Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-red-600 hover:text-red-800 ml-1">Masuk sekarang</a>
        </p>
    </div>

    <script>
        function toggleFields() {
            const role = document.getElementById('role_input').value;
            const ketosFields = document.getElementById('ketos_fields');
            const organisasiFields = document.getElementById('organisasi_fields');
            const submitContainer = document.getElementById('submit_container');

            // Disable all inputs in both sections first
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

        // Initialize on load
        window.addEventListener('DOMContentLoaded', () => {
            toggleFields();
            
            // Real-time password confirmation validation
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const errorEl = document.getElementById('password_error');
            const submitBtn = document.getElementById('submit_btn');
            
            function validatePassword() {
                if (confirmPassword.value && password.value !== confirmPassword.value) {
                    errorEl.classList.remove('hidden');
                    confirmPassword.classList.add('border-red-500');
                    confirmPassword.classList.remove('border-slate-100');
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    return false;
                } else {
                    errorEl.classList.add('hidden');
                    confirmPassword.classList.remove('border-red-500');
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
