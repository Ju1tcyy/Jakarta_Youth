<x-guest-layout>
    <div class="space-y-12 animate-fade-up">
        <div class="text-center space-y-10">
            <div class="space-y-4">
                <h1 class="text-4xl font-black text-primary tracking-tighter uppercase italic">
                    Mulai <span class="text-accent underline decoration-4 underline-offset-8">Perjalanan.</span>
                </h1>
                <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.3em]">Pilih kategori pendaftaran Anda:</p>
            </div>

            <!-- Role Switcher -->
            <div class="bg-slate-50 p-2 rounded-3xl flex items-center max-w-sm mx-auto border-2 border-slate-100 shadow-sm relative overflow-hidden" 
                x-data="{ 
                    currentRole: new URLSearchParams(window.location.search).get('role') || '{{ old('role', 'ketos') }}',
                    init() {
                        document.getElementById('role_input').value = this.currentRole;
                        toggleFields();
                    }
                }">
                <button type="button" 
                    @click="currentRole = 'ketos'; document.getElementById('role_input').value = 'ketos'; toggleFields()" 
                    class="flex-1 py-4 px-6 rounded-2xl text-xs font-black uppercase tracking-widest transition-all relative z-10"
                    :class="currentRole === 'ketos' ? 'text-primary' : 'text-slate-400 hover:text-slate-600'">
                    Ketua OSIS
                </button>
                <button type="button" 
                    @click="currentRole = 'organisasi'; document.getElementById('role_input').value = 'organisasi'; toggleFields()" 
                    class="flex-1 py-4 px-6 rounded-2xl text-xs font-black uppercase tracking-widest transition-all relative z-10"
                    :class="currentRole === 'organisasi' ? 'text-primary' : 'text-slate-400 hover:text-slate-600'">
                    Organisasi
                </button>
                
                <!-- Background Slider -->
                <div class="absolute inset-y-2 rounded-2xl bg-white shadow-xl border border-slate-100 transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
                    :style="currentRole === 'ketos' ? 'left: 8px; width: calc(50% - 12px);' : 'left: calc(50% + 4px); width: calc(50% - 12px);'">
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-10" id="registrationForm">
            @csrf

            <!-- Role Selection (Hidden, set via URL or default) -->
            <input type="hidden" name="role" id="role_input" value="{{ request('role', old('role', 'ketos')) }}">
            
            <!-- Account Credentials -->
            <div class="space-y-8">
                <div class="flex items-center gap-4">
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em] whitespace-nowrap">Kredensial Akun</span>
                    <div class="h-px w-full bg-slate-100"></div>
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
            <div id="dynamic_fields_container" class="space-y-8 animate-fade-up delay-100">
                <div class="flex items-center gap-4">
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em] whitespace-nowrap">Informasi Profil</span>
                    <div class="h-px w-full bg-slate-100"></div>
                </div>

                <!-- Ketos Fields -->
                <div id="ketos_fields" class="space-y-8 hidden">
                    <div class="group space-y-4">
                        <label for="name" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Nama Lengkap</label>
                        <div class="relative">
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                                placeholder="Budi Santoso">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                <i data-feather="user" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group space-y-4">
                        <label for="asal_sekolah_ketos" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Asal Sekolah</label>
                        <div class="relative">
                            <input id="asal_sekolah_ketos" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                                class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                                placeholder="SMAN 1 Jakarta">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                <i data-feather="map-pin" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Organisasi Fields -->
                <div id="organisasi_fields" class="space-y-8 hidden">
                    <div class="group space-y-4">
                        <label for="nama_organisasi" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Nama Organisasi</label>
                        <div class="relative">
                            <input id="nama_organisasi" type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}"
                                class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                                placeholder="OSIS / MPK / Komunitas">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                <i data-feather="users" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group space-y-4">
                        <label for="asal_sekolah_org" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Asal Sekolah</label>
                        <div class="relative">
                            <input id="asal_sekolah_org" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                                class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300"
                                placeholder="SMKN 1 Jakarta">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                                <i data-feather="map-pin" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="group w-full bg-primary text-white py-6 rounded-3xl font-black text-sm uppercase tracking-[0.3em] hover:bg-slate-900 shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-4">
                Daftar Sekarang
                <i data-feather="check" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
            </button>
        </form>

        <div class="pt-10 border-t border-slate-100 text-center">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="text-primary hover:text-accent ml-2 font-black underline underline-offset-8 decoration-2 decoration-primary/10 hover:decoration-accent transition-all">Masuk</a>
            </p>
        </div>
    </div>

    <script>
        function toggleFields() {
            const role = document.getElementById('role_input').value;
            const ketosFields = document.getElementById('ketos_fields');
            const organisasiFields = document.getElementById('organisasi_fields');

            if (role === 'ketos') {
                ketosFields.classList.remove('hidden');
                organisasiFields.classList.add('hidden');
            } else {
                ketosFields.classList.add('hidden');
                organisasiFields.classList.remove('hidden');
            }
            feather.replace();
        }
        window.addEventListener('DOMContentLoaded', toggleFields);
    </script>
</x-guest-layout>
