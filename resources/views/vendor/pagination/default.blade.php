@if ($paginator->hasPages())
    <ul class="pages">
        {{-- Previous Page Link --}}
        {{-- @if ($paginator->onFirstPage())
            <div class="page-item disabled  text-left"><a class="btn btn-outline-secondary btn-sm" href="#"><i class="icon-arrow-left"></i>&nbsp;Prev</a></div> --}}
            {{-- <li class="page-item disabled"><a class="page-link">&laquo;</a></li> --}}
        {{-- @else --}}
            {{-- <div class="page-item disabled  text-left"><a class="btn btn-outline-secondary btn-sm" href="{{ $paginator->previousPageUrl() }}"><i class="icon-arrow-left"></i>&nbsp;Prev</a></div> --}}

            {{-- <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li> --}}
        {{-- @endif --}}

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        {{-- @if ($paginator->hasMorePages())
              <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="{{ $paginator->nextPageUrl() }}">Next&nbsp;<i class="icon-arrow-right"></i></a></div> --}}
            {{-- <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li> --}}
        {{-- @else
            <div class="page-item disabled column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="{{ $paginator->nextPageUrl() }}">Next&nbsp;<i class="icon-arrow-right"></i></a></div> --}}
            {{-- <li class="page-item disabled"><a class="page-link">&raquo;</a></li> --}}
        {{-- @endif --}}
    </ul>
@endif
