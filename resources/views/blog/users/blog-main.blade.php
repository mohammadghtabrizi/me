@extends('layouts.main')

@section('main-content')
  <div class="container padding-bottom-3x mb-1">

    @if(Session::has('message'))

      @php($message = Session::get('message')) 

      @if ($message['class'] == 'alert-warning')

        
        <div class="alert alert-warning alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-bell"></i>&nbsp;&nbsp;<strong>اخطار :</strong> {{$message['message']}}</div>

      @endif

    @endif
        <div class="row">
          <!-- Blog Posts-->
          <div class="col-xl-9 col-lg-8 text-right">

            @foreach($blogposts as $index => $item)
              <!-- Post-->
              <article class="row bg-white soft-shadow pt-3 mb-3">
                <div class="col-md-3">
                  <ul class="post-meta">
                    <li><i class="icon-clock"></i><a href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}">&nbsp;{{\Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($item->CREATED_AT))}}</a></li>
                    <li><i class="icon-head"></i>&nbsp; {{ $item->name }}</li>
                    <li><i class="icon-tag"></i>

                      @php($i = 0)

                      @php($tagsCount = $item->tags->count())

                    @foreach($item->tags as $tag)

                      <a href="{{route('blog_tags',['id' => $tag->id,'tag' => $tag->BT_VALUE])}}">&nbsp; {{$tag->BT_VALUE}} @if($i++ < $tagsCount - 1), @endif </a>

                    @endforeach

                    </li>
                    <li><i class="icon-speech-bubble"></i><a href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}">&nbsp; {{$item->comments}} دیدگاه</a></li>
                  </ul>
                </div>

                <div class="col-md-9 blog-post"><a class="post-thumb" href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}">


                  <?php

                    $file = $item->files->first();

                    $file = !is_null($file) ? $file->bf_source : 'def.png';

                  ?>

                  <img src="{{asset('images/post-images')}}/{{ $file }}" alt="Post">

                </a>

                  <h3 class="post-title"><a href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}">{{ $item->BP_TITLE }} </a></h3>
                  <p>{{ $item->BP_DESS }}</p>
                </br>
                  <a href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}" class='btn btn-primary' style="margin: auto;"> بیشتر بخوانید </a>
                </div>
              </article>

            @endforeach

            <!-- Pagination-->
      			<div class="row bg-white soft-shadow  mb-3">

              {{$blogposts->render('partials.pagination')}}

      			</div>



          </div>
          <!-- Sidebar-->
          <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Widget Search-->
              <section class="widget bg-white soft-shadow pt-2 pb-2 pr-2 pl-2 mb-2">
                <form class="input-group form-group" method="POST" action="{{route('blog_search')}}">
                  @csrf
                  <span class="input-group-btn">
                    <button type="submit"><i class="icon-search"></i></button>
                  </span>
                  <input class="form-control" type="search" name="blogsearch" placeholder="جستجو در وبلاگ">
                </form>
              </section>
              
              <!-- Widget Featured Posts-->
              <section class="widget widget-featured-posts widget-border bg-white mb-2">
                <h3 class="widget-title">مطالب ویژه</h3>

              @foreach($blogposts as $index => $item) 

               
              
                <!-- Entry-->
                @if($item->BP_BESTPOST===1)
                <?php

                    $file = $item->files->first();

                    $file = !is_null($file) ? $file->bf_source : 'def.png';

                  ?>
                <div class="entry">
                  <div class="entry-thumb"><a href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}"><img src="{{asset('images/post-images')}}/{{$file}}" alt="Post"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="{{route('show_post',['id' => $item->id,'slug' => $item->BP_TITLE_PAGE])}}">{{$item->BP_TITLE}}</a></h4><span class="entry-meta">توسط {{$item->name}}</span>
                  </div>
                </div>
               @endif
               @endforeach
              </section>
                
              

			  <!-- Widget Categories-->
              <section class="widget widget-categories widget-border bg-white mb-2">
                <h3 class="widget-title">دسته بندی بلاگ</h3>
                <ul>
                  @foreach($blogpostcategory as $index => $category)

                  <li><a href="{{route('list_category_posts',['id' => $category->id,'slug' => $category->BC_NAME])}}">{{$category->BC_NAME}}</a><span>({{$category->posts_count}})</span></li>
                  @endforeach
                </ul>
              </section>
              <!-- Widget Tags-->
              <section class="widget widget-tags bg-white soft-shadow pt-2 pb-2 pr-2 pl-2 mb-2">
                <h3 class="widget-title">کلمات پر کاربرد</h3>
                @foreach ($taag as $tag)
				          <a class="tag" href="{{route('blog_tags',['id' => $tag->id,'tag' => $tag->BT_VALUE])}}">#{{ $tag->BT_VALUE }}</a>
                @endforeach
				          <span class="tag active">#تگ فعال</span>
              </section>
              <!-- Promo Banner-->
              <section class="promo-box soft-shadow" style="background-image: url(img/banners/01.jpg);">
                <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .35;"></span>
                <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                  <h3 class="text-bold text-light text-shadow">جدید 2017<br>مجموعه دستبند ها</h3>
                  <h4 class="text-light text-thin text-shadow">تازه وارد شده است</h4><a class="btn btn-sm btn-primary" href="shop-grid-ls.html">همین حالا بخرید</a>
                </div>
              </section>
            </aside>
          </div>
        </div>
      </div>

    </div>

      <!-- Site Footer-->
  @stop