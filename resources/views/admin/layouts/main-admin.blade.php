<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>داشبورد مدیریتی امداد آی تی | Emdad IT</title>
<link rel="icon" href="{{asset('img/in/favicon.png')}}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/charts-c3/plugin.css')}}"/>

<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/morrisjs/morris.min.css')}}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/css/style.min.css')}}">

<script src="{{asset('assetsadmin/assets/js/sweetalert2.all.min.js')}}"></script>

</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>لطفا صبر کنید...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="جستجو..." />
      <button type="submit" class="btn btn-primary">جستجو</button>
    </form>
</div>



@yield('main-content-admin')


<!-- Jquery Core Js --> 
<script src="{{asset('assetsadmin/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{asset('assetsadmin/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('assetsadmin/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('assetsadmin/assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('assetsadmin/assets/bundles/c3.bundle.js')}}"></script>

<script src="{{asset('assetsadmin/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assetsadmin/assets/js/pages/index.js')}}"></script>

@yield('scripts')

</body>

</html>