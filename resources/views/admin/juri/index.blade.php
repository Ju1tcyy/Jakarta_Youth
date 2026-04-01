@extends('layouts.admin')
@section('title', 'Manajemen Juri')
@section('page-title', 'Manajemen Juri')

@section('content')

@if(session('success'))
<div id="juri-success-alert" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-2xl flex items-center justify-between transition-all duration-500">
    <div class="flex items-center gap-3 text-green-700 font-bold text-sm">
        <i data-feather="check-circle" class="w-5 h-5"></i>
        {{ session('success') }}
    </div>
    <button onclick="document.getElementById('juri-success-alert').style.display = 'none'" class="text-green-400 hover:text-green-600"><i data-feather="x" class="w-4 h-4"></i></button>
</div>
<script>
    setTimeout(() => {
        const el = document.getElementById('juri-success-alert');
        if(el) { el.style.opacity = '0'; setTimeout(() => el.style.display = 'none', 500); }
    }, 4000);
</script>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    {{-- Add Juri Form --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-[28px] p-8 shadow-sm border border-slate-100">
            <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-3">
                <span class="w-8 h-8 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500">
                    <i data-feather="user-plus" class="w-4 h-4"></i>
                </span>
                Tambah Akun Juri
            </h3>
            <form action="{{ route('admin.juri.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Nama Juri</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-50 transition-all"
                        placeholder="Dr. Ahmad Sudirman">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-50 transition-all"
                        placeholder="juri@example.com">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-50 transition-all"
                        placeholder="Min. 8 karakter">
                    @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-indigo-600 to-violet-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-100 hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                    <i data-feather="plus" class="w-4 h-4"></i> Buat Akun Juri
                </button>
            </form>
        </div>
    </div>

    {{-- Juri List --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-[28px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-lg font-black text-slate-800 flex items-center gap-3">
                    <span class="w-8 h-8 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500">
                        <i data-feather="users" class="w-4 h-4"></i>
                    </span>
                    Daftar Juri ({{ $juris->count() }})
                </h3>
            </div>
            @if($juris->isEmpty())
            <div class="py-20 text-center">
                <i data-feather="user-x" class="w-10 h-10 text-slate-200 mx-auto mb-4"></i>
                <p class="text-slate-400 text-sm font-medium">Belum ada akun juri. Tambahkan melalui form di kiri.</p>
            </div>
            @else
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-8 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Bergabung</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($juris as $juri)
                    <tr class="border-t border-slate-50 hover:bg-slate-50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-xl flex items-center justify-center text-white font-black text-sm">
                                    {{ substr($juri->name, 0, 1) }}
                                </div>
                                <span class="font-bold text-slate-800 text-sm">{{ $juri->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm text-slate-500">{{ $juri->email }}</td>
                        <td class="px-8 py-5 text-xs text-slate-400 font-medium">{{ $juri->created_at->format('d M Y') }}</td>
                        <td class="px-8 py-5">
                            <form action="{{ route('admin.juri.destroy', $juri->id) }}" method="POST" onsubmit="return confirm('Hapus akun juri ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-2 bg-red-50 text-red-500 rounded-lg text-xs font-bold hover:bg-red-500 hover:text-white transition-all">
                                    <i data-feather="trash-2" class="w-3 h-3"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</div>
@endsection
