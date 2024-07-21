<style>
    .pagination {
        display: flex;
        list-style-type: none;
        padding: 0;
    }

    .pagination-item {
        display: inline-block;
        padding: 2px 12px;
        margin-right: 0.2rem;
        border-radius: 8px;
        color: #6b7280;
        border: 1px solid #d1d5db;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .pagination-item.active {
        background-color: #22331D;
        color: #fff;
        border: 1px solid #22331D;

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

    .pagination-item:first-child,
    .pagination-item:last-child {
        color: #22331D;
        border: none;
        background-color: white;
        box-shadow: none;
    }

</style>

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" style="margin-top:15px;">
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
                            <i class="fa-solid fa-chevron-left"></i>
                        </li>
                    @else
                        <li class="pagination-item">
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                                <i class="fa-solid fa-chevron-left"></i>
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
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="pagination-item disabled" aria-disabled="true">
                            <span aria-hidden="true">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

