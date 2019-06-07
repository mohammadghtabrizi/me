@extends('layouts.body-main')
@section('body-main-content')
    <div class="spinner" id="page-loading">
    <svg width="100px" height="100px" viewBox="-26 -26 100 100" class="spinner_svg">
      <defs></defs>
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Group" transform="translate(2.000000, 2.000000)" stroke="#FFFFFF">
          <circle id="Oval-1" stroke-width="4" cx="22.5" cy="22.5" r="22.5"></circle>
          <circle id="Oval-2" cx="22.5" cy="22.5" r="22.5" stroke-width="1.5"></circle>
          <circle id="Oval-3" cx="22.5" cy="22.5" r="22.5" stroke-width="1.5"></circle>
          <circle id="Oval-4" cx="22.5" cy="22.5" r="22.5" stroke-width="1.5"></circle>
        </g>
      </g>
    </svg>
  </div>
	      <!-- User Modal-->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="icon-unlock"></i>ورود به امداد آی تی |Emdad IT</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form action="{{ route('login_front_end_user') }}" method="POST">

            @csrf

          <div class="modal-body text-right">
            <div class="row">
              <div class="col-md-12 text-center mb-3 hidden-sm-down">
                <img src="{{asset('img/logo/emdaditlogologin.png')}}" alt="Emdad IT|امداد آی تی">
              </div>

              @if(Session::has('login_faild'))
                <span class="invalid-feedback" role="alert" style="display: block;">
                  <strong style="color: red;">{{ Session::get('login_faild') }}</strong>
                </span>
              @endif
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-right">شماره همراه</label>
                <input id="email" type="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required autofocus>


              </div>
            <div class="form-group">
              <label for="password" class="col-md-4 col-form-label text-md-right">کلمه عبور</label>
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>
            </div>
          </div>
          <div class="row padding-top-1x">
            <div class="col-sm-6">
                <label class="custom-control custom-checkbox" style="width: 100%;">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" >
                  <span class="custom-control-description" for="remember" style="margin-right: 7%;">مرا بخاطر بسپار</span>
                </label>
            </div>
            <div class="col-sm-6">
                <a href="" style="text-decoration:none">فراموشی کلمه عبور</a>
            </div>
          </div>
          <button class="btn btn-rounded btn-success btn-sm col-md-12" type="submit">ورود</button>
        </div>
        </form>
        <form method="get" action="{{route('register_view_user')}}">
          <div class="modal-footer">
            <a href="{{route('register_view_user')}}"><button class="btn btn-rounded btn-primary btn-sm " type="submit">ثبت نام نکرده اید , همین حالا اقدام کنید</button></a>
          </div>
        </form>
        </div>
      </div>
    </div>
  <!-- User Modal-->

  @yield('modals')



    <!-- Off-Canvas Category Menu-->
    <div class="offcanvas-container" id="shop-categories">
      @if(Auth::check())
      <a class="account-link" >
			     <div class="user-ava"><img src="{{asset('img/account')}}/{{Auth::user()->userpicture}}" alt="{{Auth::user()->name}} {{Auth::user()->lastname}}"></div>
	         <div class="user-info">
              <h6 class="user-name">{{Auth::user()->name}} {{Auth::user()->lastname}}</h6><span class="text-sm text-white opacity-60">امتیاز شما {{Auth::user()->points}}</span>
		       </div>
	    </a>
      @endif
      <nav class="offcanvas-menu">
        <ul class="menu">
          @if(Auth::check())
          <li class="has-children"><span><a href="#">پروفایل من</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="{{route('show_my_request')}}">لیست سفارش ها</a></li>
              <li><a href="{{route('dashboard_users')}}">مشخصات من</a></li>
              <li><a href="{{route('show_my_address')}}">آدرس من</a></li>
              <li><a href="{{route('logout_front_end_user')}}">خروج</a></li>
            </ul>
          </li>
          @else
          <li><span><a href="{{route('login_front_end_user_view')}}">ورود</a></span></li>
          <li><span><a href="{{route('register_view_user')}}">ثبت نام</a></span></li> 
          @endif
          <li><span><a href="{{route('index')}}">صفحه اصلی</a></span></li>        
          <li><span><a href="{{route('comingsoon')}}">فروشگاه</a></span></li>
          <li><span><a href="{{route('expertrequest')}}">درخواست کارشناس</a></span></li>
          <li><span><a href="{{route('blog_main')}}">وبلاگ</a></span></li>
          <li><span><a href="{{route('aboutus_user_view')}}">درباره ما</a></span></li>
          <li><span><a href="{{route('contactus')}}">تماس با ما</a></span></li>
        </ul>
      </nav>
    </div>
    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
  		@if(Auth::check())
      <a class="account-link" >
           <div class="user-ava"><img src="{{asset('img/account')}}/{{Auth::user()->userpicture}}" alt="{{Auth::user()->name}} {{Auth::user()->lastname}}"></div>
           <div class="user-info">
              <h6 class="user-name">{{Auth::user()->name}} {{Auth::user()->lastname}}</h6><span class="text-sm text-white opacity-60">امتیاز شما {{Auth::user()->points}}</span>
           </div>
      </a>
      @endif
      <nav class="offcanvas-menu">
        <ul class="menu">
          @if(Auth::check())
          <li class="has-children"><span><a href="#">پروفایل من</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="{{route('show_my_request')}}">لیست سفارش ها</a></li>
              <li><a href="{{route('dashboard_users')}}">مشخصات من</a></li>
              <li><a href="{{route('show_my_address')}}">آدرس من</a></li>
              <li><a href="{{route('logout_front_end_user')}}">خروج</a></li>
            </ul>
          </li>
          @else
          <li><span><a href="{{route('login_front_end_user_view')}}">ورود</a></span></li>
          <li><span><a href="{{route('register_view_user')}}">ثبت نام</a></span></li> 
          @endif
          <li><span><a href="{{route('index')}}">صفحه اصلی</a></span></li>        
          <li><span><a href="{{route('comingsoon')}}">فروشگاه</a></span></li>
          <li><span><a href="{{route('expertrequest')}}">درخواست کارشناس</a></span></li>
          <li><span><a href="{{route('blog_main')}}">وبلاگ</a></span></li>
          <li><span><a href="{{route('aboutus_user_view')}}">درباره ما</a></span></li>
          <li><span><a href="{{route('contactus')}}">تماس با ما</a></span></li>
        </ul>
      </nav>
    </div>
    <!-- Topbar-->

    @include('partials.top-bar')
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

    <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="POST" action="{{route('blog_search')}}">
        @csrf
        <input type="text" name="blogsearch" placeholder="عبارت مورد جستجو را تایپ کنید . . .">
        <div class="search-tools"><span class="clear-search hidden-xs-down">پاک کردن</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
          <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle " href="#mobile-menu" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href="/"><img src="{{asset('img/logo/emdaditlogo.png')}}" alt="Emdad IT|امداد آی تی"></a>
        </div>
      </div>
      <!-- Main Navigation-->
      @include('partials.top-menu')
      <!-- Toolbar-->
     <div class="toolbar">
	    <div class="inner">
          <div class="tools">
            <div class="search"><i class="icon-search"></i></div>
            <div class="account"><a href="{{route('dashboard_users')}}"></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                  
                  @if(Auth::check())
                  
                  <li class="sub-menu-user">
                    <div class="user-ava"><img src="{{ asset('img/account') }}/{{Auth::user()->userpicture}}" alt="{{Auth::user()->name}}">
                    </div>
                    <div class="user-info">
                      <h6 class="user-name" style="text-align: right;">{{Auth::user()->name}} {{Auth::user()->lastname}}</h6><span class="text-xs text-muted">{{Auth::user()->points}}امتیاز شما</span>
                    </div>
                  </li>
                  <li><a href="{{route('dashboard_users')}}">مشخصات من</a></li>
                  <li><a href="{{route('show_my_request')}}">لیست سفارشات</a></li>
                  <li class="sub-menu-separator"></li>
                  <li>
                    <a href="{{ route('logout_front_end_user') }}"> خروج</a>
                  </li>

                  @else


                  <li><a href="#" data-toggle="modal" data-target="#modalLogin"><i class="icon-unlock" ></i>جعبه ورود</a></li>

                  <li><a href="{{route('register_view_user')}}"> <i class="icon-register"></i>ثبت نام</a>        

                  @endif 

                  
              </ul>
            </div>
            <div class="cart"><a href="#"></a><i class="icon-bag"></i><span class="count">0</span><span class="subtotal">0 تومان</span>
              
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper  bg-white text-right">
      <!-- Page Title-->
    <div>&nbsp;</div>
      <!-- Page Content-->

        @yield('main-content')

        @if(Session::has('messagenewsletters'))

          @php($messagenewsletters = Session::get('messagenewsletters')) 

          @if ($messagenewsletters['class'] == 'error')
           
            <script type="text/javascript">
              Swal.fire({title: 'خطا!',text: 'ایمیل شما قبلا در خبرنامه ثبت شده است.',type: 'error',confirmButtonText: 'باشه'})
            </script>
            
          @elseif ($messagenewsletters['class'] == 'error-valid-email')
          
          	<script type="text/javascript">
              Swal.fire({title: 'خطا!',text: 'لطفا ایمیل وارد شده را بررسی نمایید و دوباره تلاش کنید .',type: 'error',confirmButtonText: 'باشه'})
            </script>
          
          @elseif ($messagenewsletters['class'] == 'success')
          <script type="text/javascript">
            Swal.fire({title: 'خوش آمدید!',text: 'به خبر نامه امداد آی تی خوش آمدید .',type: 'success',confirmButtonText: 'باشه'})
          </script>

          @endif

        @endif

      <!-- Site Footer-->
      <footer class="site-footer" style="background-image: url('{{asset('img/background/about.jpg')}}');">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-3">
              <!-- Contact Info-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title">دفتر مرکزی</h3>
                <p class="text-white">آدرس : تبریز - خیابان امام خمینی - میدان قطب - پاساژ سبلان - طبقه همکف -پلاک 13</p>
				        <p class="text-white">شماره تماس : 33364819 - 041</p>
				        <p class="text-white">وبسایت : <a class="navi-link-light" href="http://emdadit.com">emdadit.com</a></p>
                <p><a class="navi-link-light" href="http://emdadit.com">تحلیل گران انفورماتیک تبریزی</a></p>
				        <a class="social-button shape-circle sb-telegram sb-light-skin" href="https://t.me/emdadit1"><i class="socicon-telegram"></i></a>
				        <a class="social-button shape-circle sb-instagram sb-light-skin" href="https://instagram.com/emdadit1"><i class="socicon-instagram"></i></a>
				        <a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
              </section>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
              <section class="widget widget-light-skin">
                <h3 class="widget-title">دفتر مرکزی</h3>
                <p class="text-white">آدرس : تهران - خیابان شریعتی - خیابان پلیس - نبش کوچه صالحیان</p>
                <p class="text-white">شماره تماس : 88416161 - 021</p>
                <p class="text-white">وبسایت : <a class="navi-link-light" href="http://emdadit.com">emdadit.com</a></p>
                <p><a class="navi-link-light" href="http://emdadit.com">تحلیل گران انفورماتیک  شاهرخ</a></p>
                <a class="social-button shape-circle sb-telegram sb-light-skin" href="https://t.me/emdadit1"><i class="socicon-telegram"></i></a>
                <a class="social-button shape-circle sb-instagram sb-light-skin" href="https://instagram.com/emdadit1"><i class="socicon-instagram"></i></a>
                <a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
              </section>
            </div>
          </div>
          <hr class="hr-light mt-2 margin-bottom-2x">
          <div class="row">
            <div class="col-md-5 padding-bottom-1x" style="margin: auto;">
              <div class="margin-top-1x hidden-md-up"></div>
               <!--Subscription-->
                <form class="subscribe-form" action="{{route('newsletter_user_front')}}" method="POST" >
                  @csrf
                  <div class="clearfix">
                    <div class="input-group input-light">
                      <input class="form-control" type="email" name="email" placeholder="ایمیل خود را وارد کنید ..."><span class="input-group-addon"><i class="icon-mail"></i></span>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                  </div>
                  <span class="form-text text-sm text-white opacity-50 text-right">برای عضویت در خبرنامه امداد آی تی | Emdad IT ایمیل خود را وارد کنید و منتظر خبرهای خوب باشید</span>
                </form>
            </div>
          </div>
          <!-- Copyright-->
          <p class="footer-copyright text-right">© کلیه حقوق مادی  و معنوی این سایت برای &nbsp;<i class="icon-heart text-danger"></i><a href="http://emdadit.com/" target="_blank"> &nbsp; امداد آی تی | Emdad IT </a>محفوظ است</p>
        </div>
      </footer>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>

@stop