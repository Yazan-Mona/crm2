@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

        @else

        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

        @else

        @endif
    </nav>
@endif
