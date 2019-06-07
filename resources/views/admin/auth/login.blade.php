<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>پنل مدیریتی امداد آی تی |Emdad IT</title>

<script src="{{asset('assetsadmin/assets/js/sweetalert2.all.min.js')}}"></script>
<!-- Favicon-->
<link rel="icon" href="{{asset('img/in/favicon.png')}}" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assetsadmin/assets/css/style.min.css')}}">    
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" method="post" action="{{ route('admin_login_act') }}">
                    @csrf
                    <div class="header">
                        <img class="logo" src="{{asset('img\logo\emdaditlogologin.png')}}" alt="">
                        <h5>ورود</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="نام کاربری">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="رمزعبور">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="فراموشی رمز عبور"><i class="zmdi zmdi-lock"></i></a></span>
                            </div>                            
                        </div>
                        <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">مرا به خاطر بسپار</label>
                        </div>
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">ورود</button>                       
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>طراحی شده توسط تیم <a href="https://thememakker.com/" target="_blank">امداد آی تی</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="{{asset('assetsadmin/assets/images/signin.svg')}}" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('admin_login_faild'))
         
    <script type="text/javascript">
        Swal.fire({title:'خطا',text: 'نام کاربری یا رمز عبور شتباه است .',type: 'error',confirmButtonText: 'باشه'})
    </script>      

@endif

<!-- Jquery Core Js -->
<script src="{{asset('assetsadmin/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assetsadmin/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>