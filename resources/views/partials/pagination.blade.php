@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between pt-8">
        {{-- Mobile View --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-slate/50 dark:text-gray-600 bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 rounded-xl cursor-default">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-ink dark:text-gray-300 bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 rounded-xl hover:bg-brand/10 transition">
                    Previous
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-semibold text-ink dark:text-gray-300 bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 rounded-xl hover:bg-brand/10 transition">
                    Next
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-semibold text-slate/50 dark:text-gray-600 bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 rounded-xl cursor-default">
                    Next
                </span>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-slate dark:text-gray-400">
                    Showing
                    <span class="font-bold text-ink dark:text-gray-100">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-bold text-ink dark:text-gray-100">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-bold text-ink dark:text-gray-100">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex gap-2">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 text-slate/40 dark:text-gray-600 cursor-default" aria-hidden="true">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 text-ink dark:text-gray-300 hover:border-brand hover:text-brand hover:bg-brand/10 transition" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 text-slate dark:text-gray-400 cursor-default">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center justify-center w-10 h-10 font-bold rounded-xl bg-brand text-white shadow-sm cursor-default">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center justify-center w-10 h-10 font-medium rounded-xl bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 text-ink dark:text-gray-300 hover:border-brand hover:text-brand hover:bg-brand/10 transition" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 text-ink dark:text-gray-300 hover:border-brand hover:text-brand hover:bg-brand/10 transition" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white dark:bg-gray-900 border border-mint dark:border-gray-700 text-slate/40 dark:text-gray-600 cursor-default" aria-hidden="true">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
