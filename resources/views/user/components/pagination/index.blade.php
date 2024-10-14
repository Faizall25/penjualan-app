@if ($paginator->hasPages())
    <div class="dataTable-bottom">
        <div class="dataTable-info">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
        </div>
        <nav class="dataTable-pagination">
            <ul class="dataTable-pagination-list">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled pager">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </li>
                @else
                    <li class="pager">
                        <a href="{{ $paginator->previousPageUrl() }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="pager">
                        <a href="{{ $paginator->nextPageUrl() }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="disabled pager">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
