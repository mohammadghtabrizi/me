  @extends('layouts.main')
	 @section('modals')
    <!-- Expert Request Modal-->
    <div class="modal fade" id="modalExpertRequest" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="icon-unlock"></i>ثبت درخواست کارشناس</h4>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
      
          <div style="padding: 30px; text-align: right;">
            <form class="row" action="{{route('store_expertrequest')}}"  method="post">

              {{csrf_field()}}

              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="reg-fn" style="max-width: 90%;">نام شما</label>
                  <input class="form-control" type="text" id="reg-fn" name="name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="reg-ln" style="max-width: 90%;">فامیلی شما</label>
                  <input class="form-control" type="text" id="reg-ln" name="lastname" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="reg-phone" style="max-width: 90%;">شماره تلفن</label>
                  <input class="form-control" type="text" id="reg-phone" name="mobile" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="select-input" style="max-width: 90%;">نوع خدمات را انتخاب کنید</label>
                  <select class="form-control" id="select-input" name="typerequest" required>
                    <option></option>
                    <option>تعمیر پرینتر ، اسکتر ، کپی ، پلاتر</option>
                    <option>شارژ کارتریج</option>
                    <option>تعمیر کامپیوتر</option>
                    <option>تعمیر لپ تاپ</option>
                    <option>نصب و راه اندازی کامپیوتر و لپتاپ</option>
                    <option>نصب و راه اندازی ماشین های اداری</option>
                    <option>رفع ایرادنرم افزاری</option>
                    <option>ویروس یابی</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="select-input1" style="max-width: 50%;">انتخاب  استان</label>
                  <select class="form-control" id="select-input1" name="city">
                    <option></option>
                    <option>تهران</option>
                    <option>تبریز</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="select-input2" style="max-width: 50%;">تاریخ</label>
                  <select class="form-control" id="select-input2" name="date">
                    <option></option>
                        
                    @foreach($dates as $index => $date)
      
                    <option value="{{$index}}">{{$date}}</option>
      
                    @endforeach
      
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="select-input3" style="max-width: 70%;">زمان مراجعه  کارشناس</label>
                  <select class="form-control" id="select-input3" name="time">
                    <option></option>
                    <option>ساعت 9 صبح ال 12 ظهر</option>
                    <option>ساعت 12 ظهر تا 16عصر</option>
                    <option>ساعت 16 الی 19 عصر</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-2 col-form-label" for="textarea-input">آدرس</label>
                  <textarea class="form-control" id="textarea-input" rows="4" name="address"></textarea>
                </div>
              </div>
              <div class="col-12 text-center text-sm-right" style="margin-bottom: 15px;">
                <button class="btn btn-primary margin-bottom-none" type="submit">ثبت درخواست</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@stop
    <!-- Page Content-->


@section('main-content')

 <div class="container padding-bottom-3x mb-1">
  @if(Session::has('message'))

    @php($message = Session::get('message')) 
    @if ($message['class'] == 'alert-warning')  
      <div class="alert alert-warning alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-bell"></i>&nbsp;&nbsp;<strong>اخطار :</strong> {{$message['message']}}</div>

    @endif

  @endif

        @foreach ($blogpost as $index => $item)
        <div class="row"> 
          <!-- Content-->
          <div class="col-xl-9 col-lg-8 soft-shadow bg-white pt-3 pb-3">
            <!-- Post-->
            <div class="single-post-meta">
              <div class="column">
                <div class="meta-link"><span> توسط </span>{{ $item->name }}</div>
                <div class="meta-link"><span> در </span>
                  @php($i = 0)

                  @php($tagsCount = $item->tags->count())

                  @foreach($item->tags as $tag)

                    <a href="#">&nbsp; {{$tag->BT_VALUE}} @if($i++ < $tagsCount - 1), @endif </a>

                  @endforeach
                </div>
              </div>
              <div class="column">
                <div class="meta-link"><a href="#"><i class="icon-clock"></i> {{\Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($item->CREATED_AT))}}</a></div>
                <div class="meta-link"><a class="scroll-to" href="#comments"> <i class="icon-speech-bubble"></i>&nbsp;{{count($blogcomments)}}</a></div>
              </div>
            </div>
            <div class="owl-carousel text-center" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true }">
              @foreach($blogfiles as $file)
              <figure><img src="{{ asset('images/post-images')}}/{{$file->bf_source}}" alt="Image">
                <figcaption class="text-white">{{$item->BP_TITLE}}</figcaption>
              </figure>
              @endforeach
            </div>
            <h2 class="padding-top-2x" style="text-align: center;">{{$item->BP_TITLE}}</h2>
            <p style="text-align:justify">{{$item->BP_DESS}}</p>
            <p>{!!$item->BP_DESL!!}</p>
            <div class="card border-primary text-center mb-3">
              <div class="card-body"  style="background-color: #e8e9f7;">
                <h4 class="card-title">نیاز به کمک بیشتری داری؟</h4>
                <p class="card-text">همین حالا ثبت درخواست کنید تا به صورت کامل مشکل شمارا برطرف کنیم .</p>
                <div class="text-center">
              <div class="text-center"  style="width: 30%; margin: auto;">
                <button class="btn btn-outline-primary btn-block" type="button" data-toggle="modal" data-target="#modalExpertRequest" href="#" >ثبت درخواست کارشناس</button>
              </div>
            </div>
              </div>
            </div>
            
            <div class="single-post-footer">
              @php($i = 0)

              @php($tagsCount = $item->tags->count())
              <div class="column">
              @foreach($item->tags as $tag)
                <a class="sp-tag" href="#">#{{$tag->BT_VALUE}} @if($i++ < $tagsCount - 1), @endif</a>
              @endforeach
              </div>
              <div class="column">
                <div class="entry-share"><span class="text-muted">اشتراک گذاری:</span>
                  <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="فیس بوک"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="توییتر"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="اینستاگرام"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="گوگل + "><i class="socicon-googleplus"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Best Post Viewed-->
            <h3 class="padding-top-3x padding-bottom-1x">ممکن است از این مطالب خوشتان بیاید</h3>
            @include('partials.best-blog-show')

            <!-- Comments-->
            <section class="padding-top-3x" id="comments">
            <h3 class="padding-bottom-1x">دیدگاه های شما</h3>
            <!-- Comment-->
              @foreach($blogcomments as $index => $blogcomment)


              <div class="comment">
                <div class="comment-author-ava"><img src="{{ asset('img/account') }}/{{ $blogcomment->userpicture}}" alt="Comment author"></div>
                <div class="comment-body">
                  <div class="comment-header">
                    <h4 class="comment-title">{{ $blogcomment->name }} {{$blogcomment->lastname}}</h4>
                  </div>
                  <p class="comment-text">{{ $blogcomment->BC_COMMENT }}</p>
                  <div class="comment-footer">
                    <div class="column"><span class="comment-meta">{{\Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($blogcomment->CREATED_AT))}}</span></div>
                    @if(Auth::check())
                    <div class="column"><a href="#" data-toggle="collapse" data-target="#modalAnswer{{$index}}"><i class="icon-reply"></i>پاسخ</a></div>
                    @endif
                  </div>
                  @if(Auth::check())
                  <div id="modalAnswer{{$index}}" class="collapse">
                      <form class="row" action="{{route('add_reply_comment')}}"  method="POST">

                        @csrf

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-2 col-form-label" for="textarea-input">متن دیدگاه</label>
                            <input type="hidden" id="comment-post" name="comment-post" value="{{$item->id}}">
                            <input type="hidden" id="comment-id" name="comment-id" value="{{$blogcomment->idcomment}}">
                            <textarea class="form-control" rows="4" id="comment-text" name="replycomment" placeholder="دیدگاه خود را در اینجا بنویسید ..." required></textarea>                           
                          </div>
                        </div>
                        <div class="col-12 text-center text-sm-right" style="margin-bottom: 15px;">
                          <button class="btn btn-primary margin-bottom-none" type="submit">ارسال نظر</button>
                        </div>
                      </form>
                    </div>
                  @endif
                  <!-- Comment reply-->
                  @foreach($blogcomment->answers as $answer)
                  <div class="comment comment-reply">
                    <div class="comment-author-ava"><img src="{{ asset('img/account') }}/{{ $answer->userpicture }}" alt="Comment author"></div>
                    <div class="comment-body">
                      <div class="comment-header">
                        <h4 class="comment-title">{{ $answer->name }} {{$answer->lastname}}</h4>
                      </div>
                      <p class="comment-text">{{ $answer->BC_COMMENT }}</p>
                      <div class="comment-footer"><span class="comment-meta">{{\Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($answer->CREATED_AT))}}</span></div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              @endforeach

            </section>
            <!-- Comment Form-->
            @if(Auth::check())
            <h4 class="padding-top-2x padding-bottom-1x">افزودن یک دیدگاه</h4>
            <form class="row" method="POST" action="{{route('store_comment')}}">
              @csrf
              <div class="col-12">
                <div class="form-group">
                  <input type="hidden" id="comment-post" name="comment-post" value="{{$item->id}}">
                  <label for="comment-text">متن دیدگاه</label>
                  <textarea class="form-control form-control-rounded" rows="7" id="comment-text" name="commenttext" placeholder="دیدگاه خود را در اینجا بنویسید ..." required></textarea>
                </div>
              </div>
              <div class="col-12 text-right">
                <button class="btn btn-pill btn-primary" type="submit">ارسال دیدگاه</button>
              </div>
            </form>
            @endif
          </div>
        
      @endforeach
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
            </aside>
          </div>
</div>
</div>
      </div>

      <!-- Site Footer-->
  @stop
      