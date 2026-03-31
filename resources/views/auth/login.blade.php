<x-guest-layout>
    <div class="text-center mb-10">
        <h1 class="text-3xl font-black text-slate-800 font-outfit tracking-tight">Portal Masuk</h1>
        <p class="text-slate-400 font-medium text-sm mt-2 tracking-wide">Silakan masuk ke akun Anda.</p>
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
                    class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-blue-400 focus:ring-0 transition-all outline-none"
                    placeholder="user@example.com">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors">
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
                    class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-blue-400 focus:ring-0 transition-all outline-none"
                    placeholder="••••••••">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors">
                    <i data-feather="lock" class="w-5 h-5"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between px-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-blue-600 shadow-sm focus:ring-blue-500 transition-all" name="remember">
                <span class="ms-3 text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-slate-600 transition-colors">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-slate-900 text-white rounded-2xl py-5 font-black text-xs uppercase tracking-[0.3em] hover:bg-blue-700 hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-blue-900/10">
                Masuk Sekarang
            </button>
        </div>
    </form>

    <!-- Registration hidden for Admin -->
</x-guest-layout>
