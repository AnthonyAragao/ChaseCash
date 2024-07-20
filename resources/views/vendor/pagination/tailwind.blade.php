<style>
    .pagination {
        display: flex;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .pagination-item {
        display: inline-block;
        padding: 0 8px;
        margin-right: 0.2rem;
        border-radius: 4px;
        color: #6b7280;
    }

    .pagination-item.active {
        background-color: #4f46e5;
        color: #fff;
        border: 1px solid #4f46e5;
    }

    .pagination-item.disabled {
        pointer-events: none;
        background-color: #f3f4f6;
        color: #d1d5db;
    }

    .pagination-item a {
        color: inherit;
        text-decoration: none;
        color: #6b7280;
    }
</style>

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" style="margin-top:8px">
        <div style="display: flex; justify-content:space-between">
            <div>
                <p style="color: #6b7280; font-size: 0.875rem; font-weight: 600;">
                    {!! __('Resultados:') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('-') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('de') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="pagination-item disabled" aria-disabled="true">
                            <span aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="pagination-item">
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                                &lsaquo;
                            </a>
                        </li>
                    @endif

                    {{-- First Page Link --}}
                    @if ($paginator->currentPage() > 3)
                        <li class="pagination-item">
                            <a href="{{ $paginator->url(1) }}">1</a>
                        </li>
                        @if ($paginator->currentPage() > 3)
                            <li class="pagination-item disabled" aria-disabled="true">
                                <span>...</span>
                            </li>
                        @endif
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="pagination-item active" aria-current="page">
                                        <span>{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="pagination-item">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Last Page Link --}}
                    @if ($paginator->hasMorePages())
                        @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                            @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                                <li class="pagination-item disabled" aria-disabled="true">
                                    <span>...</span>
                                </li>
                            @endif
                            <li class="pagination-item">
                                <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                            </li>
                        @endif
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="pagination-item">
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">
                                &rsaquo;
                            </a>
                        </li>
                    @else
                        <li class="pagination-item disabled" aria-disabled="true">
                            <span aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

