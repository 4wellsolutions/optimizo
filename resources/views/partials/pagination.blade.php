@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center gap-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="inline-flex items-center justify-center p-3 text-gray-400 bg-gray-50 rounded-2xl cursor-not-allowed border border-gray-100/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="inline-flex items-center justify-center p-3 text-indigo-600 bg-white rounded-2xl hover:bg-indigo-50 hover:text-indigo-700 transition-all duration-300 border border-indigo-100/50 shadow-sm shadow-indigo-100/20 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="hidden md:flex items-center gap-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center justify-center w-11 h-11 text-gray-400 font-bold">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page"
                                class="inline-flex items-center justify-center w-11 h-11 bg-gradient-to-br from-indigo-600 to-purple-700 text-white rounded-2xl font-black shadow-lg shadow-indigo-100 z-10 transition-transform duration-300 scale-105">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="inline-flex items-center justify-center w-11 h-11 bg-white text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-2xl font-bold transition-all duration-300 border border-gray-100/50 hover:border-indigo-100 shadow-sm active:scale-95"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Mobile Indicator --}}
        <div
            class="md:hidden flex items-center px-4 font-black text-gray-900 bg-gray-50 rounded-2xl border border-gray-100/50 h-11">
            {{ $paginator->currentPage() }} <span class="text-gray-400 mx-2">/</span> {{ $paginator->lastPage() }}
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="inline-flex items-center justify-center p-3 text-indigo-600 bg-white rounded-2xl hover:bg-indigo-50 hover:text-indigo-700 transition-all duration-300 border border-indigo-100/50 shadow-sm shadow-indigo-100/20 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <span
                class="inline-flex items-center justify-center p-3 text-gray-400 bg-gray-50 rounded-2xl cursor-not-allowed border border-gray-100/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        @endif
    </nav>
@endif