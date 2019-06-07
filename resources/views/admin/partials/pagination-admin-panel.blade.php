@if ($paginator->hasPages())

  <div class="card">
    
    <div class="body"> 

      <ul class="pagination pagination-primary m-b-0">
            
        @if ($paginator->onFirstPage())

          <li class="page-item"><a class="page-link"><i class="zmdi zmdi-arrow-left"></i></a></li>

        @else

          <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="zmdi zmdi-arrow-left"></i></a></li>

        @endif

        @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
            <li class="active" aria-disabled="true"><span>{{ $element }}</span></li>
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

        @if ($paginator->hasMorePages())
                  
          <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="zmdi zmdi-arrow-right"></i></a></li>

        @else

          <li class="page-item"><a class="page-link"><i class="zmdi zmdi-arrow-right"></i></a></li>

        @endif

      </ul>

    </div>

  </div>

@endif
