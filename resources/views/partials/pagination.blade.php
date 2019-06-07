@if ($paginator->hasPages())

      <nav class="pagination pr-3 pl-3" style="border-top: 0px solid #fff;">
            
            @if ($paginator->onFirstPage())

                  <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm disabled"><i class="icon-arrow-right"></i> قبلی &nbsp;</a></div>

            @else

                  <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="{{ $paginator->previousPageUrl() }}"><i class="icon-arrow-right"></i> قبلی &nbsp;</a></div>

            @endif


              <div class="column text-center">

                  <ul class="pages" >

                         @foreach ($elements as $element)
                              {{-- "Three Dots" Separator --}}
                              @if (is_string($element))
                                  <li class="active" aria-disabled="true"><span>{{ $element }}</span></li>
                              @endif

                              {{-- Array Of Links --}}
                              @if (is_array($element))
                                  @foreach ($element as $page => $url)
                                      @if ($page == $paginator->currentPage())
                                          <li class="active" aria-current="page"><a>{{ $page }}</a></li>
                                      @else
                                          <li><a href="{{ $url }}">{{ $page }}</a></li>
                                      @endif
                                  @endforeach
                              @endif
                          @endforeach
                  </ul>

              </div>


            @if ($paginator->hasMorePages())
                  
                  <div class="column text-left hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="{{ $paginator->nextPageUrl() }}">بعدی &nbsp;<i class="icon-arrow-left"></i></a></div>

            @else

                   <div class="column text-left hidden-xs-down"><a class="btn btn-outline-secondary btn-sm disabled">بعدی &nbsp;<i class="icon-arrow-left"></i></a></div>

            @endif

      </nav>

@endif
