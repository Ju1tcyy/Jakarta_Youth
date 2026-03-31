<div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl flex items-center justify-between group-hover:border-orange-200 transition-all">
    <div class="overflow-hidden">
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">{{ $label }}</p>
        @if(isset($file) && $file)
            <a href="{{ asset('storage/' . $file) }}" target="_blank" class="text-xs font-black text-blue-600 flex items-center hover:text-blue-800 transition-colors">
                <i data-feather="file" class="w-3 h-3 mr-1.5"></i>
                <span class="truncate">LIHAT PDF/DOC</span>
            </a>
        @elseif(isset($url) && $url)
            <a href="{{ (strpos($url, 'http') === 0) ? $url : 'https://' . $url }}" target="_blank" class="text-xs font-black text-orange-600 flex items-center hover:text-orange-800 transition-colors">
                <i data-feather="external-link" class="w-3 h-3 mr-1.5"></i>
                <span class="truncate">BUKA TAUTAN</span>
            </a>
        @else
            <span class="text-[10px] font-bold text-slate-300 uppercase italic">Kosong</span>
        @endif
    </div>
    @if((isset($file) && $file) || (isset($url) && $url))
        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-green-500 shadow-sm border border-green-50 px-2">
            <i data-feather="check" class="w-4 h-4"></i>
        </div>
    @else
        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-slate-200 shadow-sm border border-slate-50 px-2">
            <i data-feather="x" class="w-4 h-4"></i>
        </div>
    @endif
</div>
