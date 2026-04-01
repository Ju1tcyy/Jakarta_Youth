<x-guest-layout>
    <div class="space-y-12 animate-fade-up">
        <div class="text-center space-y-6">
            <h1 class="text-4xl font-black text-primary tracking-tighter uppercase italic">
                Selamat <span class="text-accent underline decoration-4 underline-offset-8">Kembali.</span>
            </h1>
            <p class="text-slate-500 font-bold text-xs uppercase tracking-[0.3em]">Silakan masuk ke dashboard Anda</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-10">
            @csrf

            <!-- Email Address -->
            <div class="space-y-4 group">
                <label for="email" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] ml-1 group-focus-within:text-primary transition-colors">Email Akun</label>
                <div class="relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300" 
                        placeholder="nama@email.com">
                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                        <i data-feather="mail" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 ml-2" />
            </div>

            <!-- Password -->
            <div class="space-y-4 group">
                <div class="flex justify-between items-center px-1">
                    <label for="password" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.4em] group-focus-within:text-primary transition-colors">Kata Sandi</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[10px] font-black text-primary hover:text-accent uppercase tracking-widest transition-colors mb-0.5">Lupa Sandi?</a>
                    @endif
                </div>
                <div class="relative">
                    <input id="password" type="password" name="password" required 
                        class="w-full px-14 py-6 bg-slate-50 border-2 border-slate-100 rounded-3xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-sm font-black text-primary placeholder:text-slate-300" 
                        placeholder="••••••••">
                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">
                        <i data-feather="lock" class="w-5 h-5"></i>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 ml-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center ml-1">
                <input id="remember_me" type="checkbox" name="remember" class="w-5 h-5 rounded-lg border-2 border-slate-100 text-primary focus:ring-primary/10 transition-all">
                <label for="remember_me" class="ml-4 text-xs font-black text-slate-500 uppercase tracking-widest">Ingat Saya</label>
            </div>

            <button type="submit" class="group w-full bg-primary text-white py-6 rounded-3xl font-black text-sm uppercase tracking-[0.3em] hover:bg-slate-900 shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-4">
                Masuk Sekarang
                <i data-feather="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>

        <div class="pt-10 border-t border-slate-100 text-center animate-fade-up delay-200">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Belum memiliki akun? 
                <a href="{{ route('register') }}" class="text-primary hover:text-accent ml-2 font-black underline underline-offset-8 decoration-2 decoration-primary/10 hover:decoration-accent transition-all">Daftar</a>
            </p>
        </div>
    </div>
</x-guest-layout>
