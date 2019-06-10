<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>مرکز فوق تخصصی فروش و تعمیرات ماشین های اداری ، کامپیوتر و لپ تاپ امداد آی تی |امداد IT</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags-->
    <meta name="description" content="مرکز فوق تخصصی تعمیرات و فروش انواع پرینتر اسکنر کپی فکس و لپ تاپ و کامپیوتر و سامانه هوشمند درخواست کارشناس">
    <meta name="keywords" content="سامانه درخواست کارشناس,تعمیر پرینتر,شارژ کارتریج,فروش,قطعات ماشینهای اداری,تعمیر لپ تاپ,تعمیرکامپیوتر,آموزش,دانلود درایور,تعمیر فکس,تعمیر کپی,سامانه ارسال کارشناس در محل">
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


    <link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/summernote/dist/summernote.css')}}"/>
    
    
    
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{asset('css/styles.css')}}">
	<link id="mainStyles" rel="stylesheet" media="screen" href="{{asset('css/rtl.css')}}">
	<link rel="stylesheet" href="{{asset('css/fancy-slider/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/pageloading.css')}}">




      
  </head>
  <!-- Body-->
  <body>
    

  @yield('body-main-content')






    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/scripts.min.js') }}"></script>
    <script src="{{ asset('js/fancy-slider/index.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <!-- For editor -->
    <script src="{{asset('assetsadmin/assets/plugins/dropzone/dropzone.js')}}"></script> <!-- Dropzone Plugin Js --> 
    <script src="{{asset('assetsadmin/assets/plugins/summernote/dist/summernote.js')}}"></script>
    <!-- For editor -->



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