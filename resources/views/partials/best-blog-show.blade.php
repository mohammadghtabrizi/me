
<section class=" pr-2 pl-2 pt-2 pb-2 rounded-5 soft-shadow mb-2" style="background:#fff">
    <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;margin&quot;: 10, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}},&quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000 ,&quot;loop&quot;: true }">
    @foreach($blogviewed as $view)

      <!-- Product-->
      <div class="grid-item">
        <div class="product-card">
          <a class="product-thumb" href="{{route('show_post',['id' => $view->id,'slug' => $view->BP_TITLE_PAGE])}}"><img src="{{ asset('images/post-images') }}/{{$view->bf_source}}" alt="{{ $view->BP_TITLE }}"  style="height:300px;"></a>
          <h3 class="product-title"><a href="{{route('show_post',['id' => $view->id,'slug' => $view->BP_TITLE_PAGE])}}">{{ $view->BP_TITLE }}</a></h3>
          <h4 class="product-price">
          <span>{{ $view->BP_DESS }}</span>
          </h4>
          <div class="product-buttons">
            <form method="get" action="{{route('show_post',['id' => $view->id,'slug' => $view->BP_TITLE_PAGE])}}">
              <button class="btn btn-outline-primary btn-sm" type="submit">نمایش بلاگ</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</section>
