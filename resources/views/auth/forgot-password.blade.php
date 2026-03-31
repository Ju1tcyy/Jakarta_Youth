<x-guest-layout>
    <div class="text-center mb-10">
        <h1 class="text-3xl font-black text-slate-800 font-outfit tracking-tight text-balance">Reset Kata Sandi</h1>
        <p class="text-slate-400 font-medium text-sm mt-4 tracking-wide leading-relaxed">
            Lupa kata sandi? Masukkan email Anda dan kami akan mengirimkan tautan reset.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Alamat Email Terdaftar</label>
            <div class="relative group">
                <input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="w-full bg-slate-50 border-2 border-slate-50 rounded-2xl py-4 px-12 text-sm font-bold text-slate-700 focus:bg-white focus:border-blue-400 focus:ring-0 transition-all outline-none"
                    placeholder="user@example.com">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors">
                    <i data-feather="mail" class="w-5 h-5"></i>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-slate-900 text-white rounded-2xl py-5 font-black text-xs uppercase tracking-[0.3em] hover:bg-blue-700 hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-blue-900/10">
                Email Tautan Reset
            </button>
        </div>
    </form>

    <div class="mt-10 pt-8 border-t border-slate-50 text-center">
        <a href="{{ route('login') }}" class="text-xs font-black text-slate-400 uppercase tracking-widest hover:text-blue-600 transition-colors">Kembali ke Log in</a>
    </div>
</x-guest-layout>
