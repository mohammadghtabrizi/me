<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>سامانه هوشمند درخواست کارشناس</title>

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
  <body style="background-size: cover;">
    @section('expertrequest')

<div style="width: 100%; text-align: center; padding-bottom: 30px; z-index: 1; padding-top: 1%;">
        <a href="{{route('index')}}">خانه</a>
        &nbsp;|&nbsp;<a href="{{route('blog_main')}}">وبلاگ</a>
        &nbsp;|&nbsp;<a href="{{route('dashboard_users')}}">ورود|پنل مدیریتی</a>
        &nbsp;|&nbsp;<a href="{{route('contactus')}}">تماس با ما</a>
      </div>
    <div class="col-md-4" style="background: #f5f5f5; border-radius: 10px; margin: auto; text-align: right; border: 3px solid #0088cc;">
      <div style="margin: auto; width: 20%; padding-top: 10px;"><img src="{{asset('img/logo/emdaditlogo.png')}}" alt="Emdad IT|امداد آی تی"></div>
    </br>

      <h3 class="margin-bottom-1x" style="margin-top: 15px; text-align: center;">فرم درخواست کارشناس</h3>
      <p style="text-align: center;">در کمتر از چند ثانیه فرم زیر را تکمیل کنید  و از خدمات ما لذت ببرید</p>
      <form class="row" action="{{route('store_expertrequest')}}"  method="post" style=" padding-left:30px; padding-right: 30px; padding-bottom: 30px;">

        {{csrf_field()}}

        @php($user = Auth::user())

        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-fn">نام شما</label>
            <input class="form-control" type="text" id="reg-fn" name="name" value="{{@$user->name}}" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-ln">فامیلی شما</label>
            <input class="form-control" type="text" id="reg-ln" name="lastname" value="{{@$user->lastname}}" required>
          </div>
        </div>
        <!-- <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-email">آدرس ایمیل</label>
            <input class="form-control" type="email" id="reg-email" name="email" required>
          </div>
        </div> -->
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-phone">شماره تلفن</label>
            <input class="form-control" type="text" id="reg-phone" name="mobile" value="{{@$user->mobile}}" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-2 col-form-label" for="select-input" style="max-width: 90%;">نوع خدمات را انتخاب کنید</label>
                <select class="form-control" id="select-input" name="typerequest" required>
                    <option></option>

                    @foreach($services as $skey => $svalue)

                      <option value="{{ $skey }}">{{ $svalue }}</option>

                    @endforeach

                  </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-2 col-form-label" for="select-input-city" style="max-width: 50%;">انتخاب  استان</label>
                <select class="form-control" id="select-input-city" name="city" required>
                    <option></option>
                    <option value="1">تهران</option>
                    <option value="2">تبریز</option>
                  </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-2 col-form-label" for="select-input-date" style="max-width: 50%;">تاریخ</label>
                <select class="form-control" id="select-input-date" name="date" required>
                    <option></option>
                        
                    @foreach($dates as $index => $date)
      
                    <option value="{{$index}}">{{$date}}</option>
      
                    @endforeach
      
                  </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-2 col-form-label" for="select-input-time" style="max-width: 70%;">زمان مراجعه  کارشناس</label>
                <select class="form-control" id="select-input-time" name="time" required>
                    <option></option>
                    <option value="1">ساعت 9 صبح ال 12 ظهر</option>
                    <option value="2">ساعت 12 ظهر تا 16عصر</option>
                    <option value="3">ساعت 16 الی 19 عصر</option>
                  </select>
          </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
              <label class="col-2 col-form-label" for="textarea-input-address">آدرس</label>
                <textarea class="form-control" id="textarea-input-address" rows="4" name="address"></textarea>
            </div>
          </div>
        <div class="col-12 text-center text-sm-right">
          <button class="btn-center btn btn-primary" type="submit">ارسال درخواست</button>
        </div>
      </form>
    </div>

      <div style="width: 100%; text-align: center; padding-top: 40px; z-index: 1; ">
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

  @stop


  <div id="particles-js"></div>
  <script type="text/javascript" src="{{asset('js/particles.js')}}"></script>
  <script type="text/javascript" id="rendered-js" src="{{asset('js/pen.js')}}"></script>


  <div class="row" style="margin: auto;">
    


@if(Session::has('messagesuccessrequest'))

  @php($messagesuccessrequest = Session::get('messagesuccessrequest')) 

  @if ($messagesuccessrequest['class'] == 'alert-success')


  <div class="card border-success text-center mb-3" style="margin: auto; z-index: 1;">
    <div class="alert {{$messagesuccessrequest['class']}} alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-help"></i>&nbsp;&nbsp;<strong>عملیات موفقیت آمیز انجام شد</strong><p>{{$messagesuccessrequest['message']}}.</p></div></li>
  <div class="card-body">
    <strong>نام :</strong><h3>{{Session::get('name')}}</h3>
    <strong>شماره همراه :</strong><h3>{{Session::get('mobile')}}</h3>
    <strong>شماره پیگیری :</strong><h3>{{Session::get('requestids')}}</h3>
    <strong>کلمه عبور شما :</strong><h3>{{Session::get('password')}}</h3>
  </div>

  <div class="card-body">
    <a class="btn btn-outline-primary" href="{{route('index')}}">بازگشت به صفحه اصلی</a>
    <a class="btn btn-outline-primary" href="#">پیگیری  درخواست</a>
    <a class="btn btn-outline-primary" href="#">تماس با ما</a>
  </div>
  </div>

    @endif
    @endif


    @if(Session::has('message'))

    @php($message = Session::get('message')) 

    @if ($message['class'] == 'alert-success')

      <div class="" style="margin: auto; width:50%;">
        <div class="alert {{$message['class']}} alert-dismissible fade show text-center margin-bottom-1x">
          <span class="alert-close" data-dismiss="alert"></span>
          <i class="icon-help"></i>&nbsp;&nbsp;
          <strong>خطا</strong>
          <p>{{$message['message']}}.</p>

          @foreach($errors->all() as $error)
          <div style="text-align: right;">&nbsp;&nbsp;
            <strong>خطا: &nbsp;&nbsp;</strong>
            <strong>{{$error}}</strong>
          </div></br>
          @endforeach
        </div>
      </div>
      @yield('expertrequest')
    @endif
    @endif

    @if(!Session::has('messagesuccessrequest'))
      @yield('expertrequest')
    @endif
    
    
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
