<x-guest-layout>
    <div class="space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-black text-[#012B6E] tracking-tight">Selamat Datang Kembali</h1>
            <p class="text-slate-500 mt-2 font-medium">Silakan masuk ke dashboard Anda</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <label for="email" class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Email Sekolah / Personal</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-[#012B6E] focus:ring-0 transition-all text-slate-700 font-bold" 
                    placeholder="nama@sekolah.sch.id">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <div class="flex justify-between items-center ml-1">
                    <label for="password" class="text-xs font-black text-slate-400 uppercase tracking-widest">Kata Sandi</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-[#012B6E] hover:text-[#FFD700] uppercase tracking-widest">Lupa Sandi?</a>
                    @endif
                </div>
                <input id="password" type="password" name="password" required 
                    class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-[#012B6E] focus:ring-0 transition-all text-slate-700 font-bold" 
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center ml-1">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-[#012B6E] focus:ring-[#012B6E]">
                <label for="remember_me" class="ml-3 text-sm font-bold text-slate-500">Ingat Saya</label>
            </div>

            <button type="submit" class="w-full bg-[#012B6E] text-white py-5 rounded-2xl font-black text-sm uppercase tracking-[0.2em] hover:bg-[#FFD700] hover:text-[#012B6E] transition-all shadow-lg shadow-[#012B6E]/20">
                Masuk Sekarang
            </button>
    </div>
</x-guest-layout>
