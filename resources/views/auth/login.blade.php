<x-guest-layout>
    <div class="text-center mb-12">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-[28px] bg-gradient-to-br from-rose-50 to-white text-rose-600 mb-8 shadow-xl shadow-rose-900/5 border border-rose-100/50">
            <i data-feather="lock" class="w-10 h-10 stroke-[1.5]"></i>
        </div>
        <h1 class="text-3xl font-black text-slate-900 font-outfit tracking-tight leading-tight uppercase italic">
            Akses <br> <span class="text-rose-600">Dashboard.</span>
        </h1>
        <p class="text-slate-500 font-medium text-sm mt-4 tracking-wide uppercase">Silakan masuk ke akun Anda.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-8" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div class="group">
            <label for="email" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-rose-500 transition-colors">Alamat Email</label>
            <div class="relative">
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                    placeholder="nama@email.com">
                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                    <i data-feather="mail" class="w-5 h-5"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-2" />
        </div>

        <!-- Password -->
        <div class="group">
            <div class="flex justify-between items-center mb-4">
                <label for="password" class="block text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1 group-focus-within:text-rose-500 transition-colors">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-rose-500 uppercase tracking-widest hover:text-rose-700 transition-colors">Lupa Sandi?</a>
                @endif
            </div>
            <div class="relative">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full bg-white/50 border-2 border-slate-100 rounded-3xl py-4 px-14 text-sm font-bold text-slate-700 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all outline-none placeholder:text-slate-300 shadow-sm"
                    placeholder="••••••••">
                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-rose-500 transition-colors">
                    <i data-feather="lock" class="w-5 h-5"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between px-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative flex items-center">
                    <input id="remember_me" type="checkbox" class="peer h-5 w-5 cursor-pointer appearance-none rounded-lg border-2 border-slate-200 transition-all checked:bg-rose-500 checked:border-rose-500 focus:ring-rose-500/20" name="remember">
                    <div class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white opacity-0 peer-checked:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <span class="ms-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest group-hover:text-slate-600 transition-colors">Ingat Saya</span>
            </label>
        </div>

        <div class="pt-6">
            <button type="submit" class="group relative w-full bg-slate-900 text-white rounded-3xl py-6 font-black text-xs uppercase tracking-[0.3em] overflow-hidden transition-all hover:bg-rose-600 hover:shadow-2xl hover:shadow-rose-900/40 active:scale-95">
                <span class="relative z-10 flex items-center justify-center gap-3">
                    Masuk Sekarang
                    <i data-feather="chevron-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </span>
            </button>
        </div>
    </form>

    <div class="mt-16 text-center border-t border-slate-100 pt-10">
        <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest mb-6">Belum memiliki akun?</p>
        <div class="grid grid-cols-2 gap-6">
            <a href="{{ route('register') }}?role=ketos" class="block p-4 border-2 border-slate-900 hover:bg-rose-50 hover:text-rose-600 transition-all text-center">
                <span class="text-[10px] font-black uppercase tracking-widest leading-none">Daftar Ketos</span>
            </a>
            <a href="{{ route('register') }}?role=organisasi" class="block p-4 border-2 border-slate-900 hover:bg-orange-50 hover:text-orange-600 transition-all text-center">
                <span class="text-[10px] font-black uppercase tracking-widest leading-none">Daftar Tim</span>
            </a>
        </div>
    </div>
</x-guest-layout>
