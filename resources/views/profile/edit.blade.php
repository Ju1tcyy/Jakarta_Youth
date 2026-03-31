<x-app-layout>
    <x-slot name="header">
        {{ __('Profil Akun') }}
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-10 pb-20">
        <!-- Profile Info Card -->
        <div class="bg-white rounded-[40px] p-10 shadow-sm border border-slate-100 group hover:shadow-xl transition-all duration-500">
            <div class="flex items-center mb-10">
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mr-5">
                    <i data-feather="user" class="w-6 h-6"></i>
                </div>
                <div>
                    <h3 class="text-xl font-black text-slate-800 font-outfit uppercase tracking-tight">Informasi Profil</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Perbarui data diri dan email Anda.</p>
                </div>
            </div>
            
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Password Card -->
        <div class="bg-white rounded-[40px] p-10 shadow-sm border border-slate-100 group hover:shadow-xl transition-all duration-500">
            <div class="flex items-center mb-10">
                <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mr-5">
                    <i data-feather="lock" class="w-6 h-6"></i>
                </div>
                <div>
                    <h3 class="text-xl font-black text-slate-800 font-outfit uppercase tracking-tight">Ubah Kata Sandi</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Gunakan kata sandi yang kuat untuk keamanan.</p>
                </div>
            </div>

            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete Card (Subtle) -->
        <div class="bg-red-50/30 rounded-[40px] p-10 border border-red-100/50">
            <div class="flex items-center mb-10">
                <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mr-5">
                    <i data-feather="alert-triangle" class="w-6 h-6"></i>
                </div>
                <div>
                    <h3 class="text-xl font-black text-red-800 font-outfit uppercase tracking-tight">Hapus Akun</h3>
                    <p class="text-[10px] font-bold text-red-400 uppercase tracking-widest mt-1">Tindakan ini permanen dan tidak dapat dibatalkan.</p>
                </div>
            </div>

            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
