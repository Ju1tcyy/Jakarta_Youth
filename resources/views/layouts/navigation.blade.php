<nav x-data="{ open: false }" class="bg-white border-b border-slate-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <img src="{{ asset('icon/logo collab.png') }}" alt="Logo" class="h-24 w-auto group-hover:scale-105 transition-transform duration-300">
                        <div class="hidden md:block">
                            <span class="block text-sm font-black text-slate-800 leading-tight uppercase tracking-tighter">Jakarta Youth</span>
                            <span class="block text-[10px] font-bold text-blue-600 uppercase tracking-widest leading-none">Achievement Award</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative flex items-center space-x-6">
                    <!-- Nav Links -->
                    <div class="hidden space-x-8 sm:flex mr-8">
                        <a href="{{ route('dashboard') }}" class="text-xs font-black uppercase tracking-widest {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-slate-400 hover:text-blue-500' }} transition-colors">
                            Dashboard
                        </a>
                    </div>

                    <div class="h-8 w-px bg-slate-100"></div>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 bg-slate-50 border border-slate-100 text-xs font-black uppercase tracking-widest text-slate-600 rounded-xl hover:bg-white hover:shadow-sm transition-all duration-300">
                                <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-3 text-[10px]">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-2 opacity-40">
                                    <i data-feather="chevron-down" class="w-3 h-3"></i>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 border-b border-slate-50 mb-1">
                                <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest">Akun Saya</p>
                            </div>
                            <x-dropdown-link :href="route('profile.edit')" class="text-xs font-bold text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl mx-2">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="text-xs font-bold text-red-500 hover:bg-red-50 rounded-xl mx-2 mb-1"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Keluar') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">
                    <i data-feather="menu" x-show="!open" class="w-6 h-6"></i>
                    <i data-feather="x" x-show="open" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-50 bg-white">
        <div class="pt-4 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl text-xs font-black uppercase tracking-widest {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-slate-500' }}">
                Dashboard
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-6 border-t border-slate-50 px-4">
            <div class="flex items-center px-4 mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-black mr-4 uppercase">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="text-sm font-black text-slate-800 leading-none">{{ Auth::user()->name }}</div>
                    <div class="text-xs font-medium text-slate-400 mt-1">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-50">
                    Edit Profil
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-xs font-bold text-red-500 hover:bg-red-50">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
