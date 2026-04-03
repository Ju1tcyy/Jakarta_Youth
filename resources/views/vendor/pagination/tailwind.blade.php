@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" style="display:flex;align-items:center;justify-content:space-between;padding:4px 0;">
        {{-- Mobile --}}
        <div style="display:flex;justify-content:space-between;flex:1;">
            @if ($paginator->onFirstPage())
                <span style="padding:6px 14px;font-size:0.8rem;color:#94a3b8;border:1px solid #e2e8f0;border-radius:8px;background:#f8fafc;">
                    &laquo; {{ __('pagination.previous') }}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" style="padding:6px 14px;font-size:0.8rem;color:#4f46e5;border:1px solid #e2e8f0;border-radius:8px;background:#fff;text-decoration:none;">
                    &laquo; {{ __('pagination.previous') }}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" style="padding:6px 14px;font-size:0.8rem;color:#4f46e5;border:1px solid #e2e8f0;border-radius:8px;background:#fff;text-decoration:none;margin-left:8px;">
                    {{ __('pagination.next') }} &raquo;
                </a>
            @else
                <span style="padding:6px 14px;font-size:0.8rem;color:#94a3b8;border:1px solid #e2e8f0;border-radius:8px;background:#f8fafc;margin-left:8px;">
                    {{ __('pagination.next') }} &raquo;
                </span>
            @endif
        </div>

        <div style="display:flex;align-items:center;gap:8px;margin-left:16px;">
            <p style="font-size:0.8rem;color:#64748b;">
                Showing
                @if ($paginator->firstItem())
                    <strong>{{ $paginator->firstItem() }}</strong> to <strong>{{ $paginator->lastItem() }}</strong>
                @else
                    {{ $paginator->count() }}
                @endif
                of <strong>{{ $paginator->total() }}</strong> results
            </p>

            <div style="display:flex;gap:4px;">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;color:#94a3b8;border:1px solid #e2e8f0;border-radius:6px;background:#f8fafc;cursor:default;">&lsaquo;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;color:#4f46e5;border:1px solid #e2e8f0;border-radius:6px;background:#fff;text-decoration:none;" aria-label="{{ __('pagination.previous') }}">&lsaquo;</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;color:#94a3b8;border:1px solid #e2e8f0;background:#f8fafc;border-radius:6px;">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;font-weight:700;color:#fff;background:#4f46e5;border:1px solid #4f46e5;border-radius:6px;">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;color:#4f46e5;border:1px solid #e2e8f0;border-radius:6px;background:#fff;text-decoration:none;">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;color:#4f46e5;border:1px solid #e2e8f0;border-radius:6px;background:#fff;text-decoration:none;" aria-label="{{ __('pagination.next') }}">&rsaquo;</a>
                @else
                    <span style="display:inline-flex;align-items:center;padding:5px 10px;font-size:0.8rem;color:#94a3b8;border:1px solid #e2e8f0;border-radius:6px;background:#f8fafc;cursor:default;">&rsaquo;</span>
                @endif
            </div>
        </div>
    </nav>
@endif
