<style>
    ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: table;
    }

    ul li {
        display: inline-block;
        color: #000;
        font-size: 14px;
        border: 1px solid #000;
    }

    ul li:not(:last-of-type) {
        border-right: none;
    }

    ul li.active {
        background: #000;
        color: #fff;
    }

    ul li a {
        text-decoration: none;
        color: #000;
        display: block;
        width: 100%;
        height: 100%;
        padding: 0 6px;
    }

    ul li span {
        display: block;
        width: 100%;
        height: 100%;
        padding: 0 6px;
    }
</style>

@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true"><</span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">></a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">></span>
        </li>
        @endif
    </ul>
</nav>
@endif