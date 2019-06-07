@extends('layouts.main')

@section('main-content')
      <!-- Page Content-->
      <div class="row no-gutters">
        <div class="col-md-6 fh-section" style="background-image: url(img/coming-soon-bg.jpg);"><span class="overlay" style="background-color: #374250; opacity: .85;"></span>
          <div class="d-flex flex-column fh-section py-5 px-3 justify-content-between">
            <div class="w-100 text-center">
              
              <h1 class="text-white text-normal mb-2">بزودی با خبرهای خوش میایم ...</h1>
              <h5 class="text-white text-normal opacity-80 mb-4">با عرض پوزش این قسمت درحال ساخت می باشد </h5>
              
              <div class="pt-3 hidden-md-up"><a class="btn btn-primary scroll-to" href="#notify"><i class="icon-bell"></i>&nbsp;من را باخبر کن !</a></div>
            </div>
            <div class="w-100 text-center">
              <p class="text-white mb-2">19 48 36 33 041</p>
              <a class="navi-link-light" href="mailto:moahammad.gh.tabrizi@gmail.com">info@emdadit.com</a>
              <div class="pt-3">
                <a class="social-button shape-circle sb-telegram sb-light-skin" href="https://t.me/emdadit1">
                  <i class="socicon-telegram"></i>
                </a>
                <a class="social-button shape-circle sb-instagram sb-light-skin" href="https://instagram.com/emdadit1">
                  <i class="socicon-instagram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 fh-section" id="notify" data-offset-top="-1">
          <div class="d-flex flex-column fh-section py-5 px-3 justify-content-center align-items-center">
            <div class="text-center" style="max-width: 500px;">
              <div class="d-inline-block mb-5" style="width: 129px;"><img class="d-block" src="{{asset('img/logo/emdaditlogo.png')}}" alt="Emdad IT|امداد آی تی"></div>
              <div class="h1 text-normal mb-2">من را باخبر کن !</div>
              <h5 class="text-normal text-muted mb-4">پس از راه اندازی این قسمت من را با خبر کن</h5>
              <form method="POST" action="{{route('newsletter_user_front')}}">
                @csrf
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="نام" required>
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email" placeholder="آدرس ایمیل" required>
                </div>
                <button class="btn btn-primary" type="submit"><i class="icon-mail"></i>&nbsp;ارسال</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @if(Session::has('messagesuccessrequest'))

      @php($messagesuccessrequest = Session::get('messagesuccessrequest')) 

      @if ($messagesuccessrequest['class'] == 'alert-success')
           
      <script type="text/javascript">
        Swal.fire({title: 'انجام شد',text: 'اطلاعات شما با موفقیت ثبت گردید  شما می توانید  با ورود به سامانه امداد  آی تی از  وضعیت درخواست خود مطلع شود .',type: 'success',confirmButtonText: 'باشه'})
      </script>      

      @endif

    @endif
@stop