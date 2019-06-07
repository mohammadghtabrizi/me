<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ورود به امداد آی تی</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags-->
    <meta name="description" content="سامانه  هوشمند ارسال کارشناس در محل برای تعمیرات انواع ماشین های اداری ، کامپیوتر ، لپ تاپ و شبکه">
    <meta name="keywords" content="سامانه درخواست کارشناس,تعمیر پرینتر,شارژ کارتریج,فروش,قطعات ماشینهای اداری,تعمیر لپ تاپ,تعمیرکامپیوتر,آموزش,دانلود درایور,تعمیر فکس,تعمیر کپی,سامانه ارسال کارشناس در محل, ویروس یابی,نصب و راه اندازی شبکه">
    <meta name="author" content="Emdadit">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- Loading Page -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <!-- Favicon and Apple Icons-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--Sweet Alert 2 -->
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <!-- Modernizr-->
    <script src="{{asset('js/emdadit.min.js')}}"></script>


    <link rel="icon" type="image/x-icon" href="{{asset('img/in/favicon.ico')}}">
    <link rel="icon" type="image/png" href="{{asset('img/in/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('img/in/touch-icon-iphone.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/in/touch-icon-ipad.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/in/touch-icon-iphone-retina.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('img/in/touch-icon-ipad-retina.png')}}">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{asset('css/vendor.min.css')}}">


    <!--Newsletter-->
    
    
    
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{asset('css/styles.css')}}">
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{asset('css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('css/fancy-slider/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/pageloading.css')}}">

      
  </head>
  <!-- Body-->
  <body>
    <div id="particles-js"></div>
    <script type="text/javascript" src="{{asset('js/particles.js')}}"></script>
    <script type="text/javascript" id="rendered-js" src="{{asset('js/pen.js')}}"></script>
      <!-- Page Content-->
      
          <div class="col-md-6" style="margin: auto; width: 30%; padding-top: 4%;">
            <form class="login-box" method="POST" action="{{route('login_front_end_user')}}" style="background: #e1e7ec;">
                @csrf
                <div style="margin: auto; width: 20%; padding-top: 10px; padding-bottom:30px;"><img src="{{asset('img/logo/emdaditlogo.png')}}" alt="Emdad IT|امداد آی تی"></div>
              
              <h4 class="margin-bottom-1x" style="text-align: right;">ورود به پنل مشتریان امداد آی تی</h4>
              <div class="form-group input-group">
                <input class="form-control" type="mobile" name="mobile" placeholder="شماره همراه ..." required><span class="input-group-addon"><i class="icon-server"></i></span>
              </div>
              <div class="form-group input-group">
                <input class="form-control" type="password" name="password" placeholder="رمز عبور ..." required><span class="input-group-addon"><i class="icon-lock"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <label class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" checked><span class="custom-control-indicator"></span><span class="custom-control-description">مرا بخاطر بسپار</span>
                </label><a class="navi-link" href="account-password-recovery.html">فراموشی رمز عبور ؟</a>
              </div>
              <div class="text-center text-sm-right">
                <button class="btn btn-primary margin-bottom-none" type="submit">ورود به امداد آی تی</button>
              </div>
            </form>


          <div style="width: 100%; text-align: center; padding-top: 40px;">
            <div style="width: 100%; text-align: center; padding-bottom: 10px;">
              <a href="{{route('index')}}">خانه</a>
              &nbsp;|&nbsp;<a href="{{route('blog_main')}}">وبلاگ</a>
              &nbsp;|&nbsp;<a href="{{route('dashboard_users')}}">ورود|پنل مدیریتی</a>
              &nbsp;|&nbsp;<a href="{{route('contactus')}}">تماس با ما</a>
            </div>
            <div style="width: 100%; text-align: center; padding-bottom: 10px;">
              <a class="social-button sb-telegram shape-none sb-dark" href="https://t.me/emdadit1" target="_blank">
                <i class="socicon-telegram"></i>
              </a>
              <a class="social-button sb-instagram shape-none sb-dark" href="https://instagram.com/emdadit1" target="_blank">
                <i class="socicon-instagram"></i>
              </a>
            </div>
            <p>© کلیه حقوق مادی  و معنوی این سایت برای &nbsp;<i class="icon-heart text-danger"></i><a href="http://emdadit.com/" target="_blank"> &nbsp; امداد آی تی | Emdad IT </a>محفوظ است</p>
          </div>


          </div>

          
    
          
          </div>
  

<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/scripts.min.js') }}"></script>
    <script src="{{ asset('js/fancy-slider/index.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>



    <script type="text/javascript">
      
      $(document).ready(function(){
  
            @if(Session::has('login_faild'))
  
            $('#modalLogin').modal('show');
  
          @endif
  
        });
  
    </script>
  




<script type="text/javascript">
$(window).load(function(){  
      $( "#page-loading" ).fadeOut();  
})  
</script>


  </body>
</html>