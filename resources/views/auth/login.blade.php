<x-guest-layout>
    <div class="text-center mb-10">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 text-red-600 mb-6 drop-shadow-md">
            <i data-feather="user" class="w-8 h-8"></i>
        </div>
        <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-500 font-outfit tracking-tight">Portal Masuk</h1>
        <p class="text-slate-500 font-medium text-sm mt-3 tracking-wide">Selamat datang kembali! Silakan masuk untuk melanjutkan.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Alamat Email</label>
            <div class="relative group">
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                    placeholder="user@example.com">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                    <i data-feather="mail" class="w-5 h-5"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex justify-between items-center mb-3 ml-1">
                <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kata Sandi</label>
            </div>
            <div class="relative group">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-red-500 focus:ring-0 transition-all outline-none"
                    placeholder="••••••••">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-red-500 transition-colors">
                    <i data-feather="lock" class="w-5 h-5"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between px-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-red-600 shadow-sm focus:ring-red-500 transition-all" name="remember">
                <span class="ms-3 text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-slate-600 transition-colors">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-orange-500 text-white rounded-2xl py-5 font-black text-xs uppercase tracking-[0.3em] hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-red-900/20">
                Masuk Sekarang
            </button>
        </div>
    </form>

    <!-- Registration hidden for Admin -->
</x-guest-layout>
