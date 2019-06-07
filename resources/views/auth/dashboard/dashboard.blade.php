@extends('layouts.main')


@section('main-content')




      <!-- Page Content-->
<div class="container padding-bottom-3x mb-2">



  @if(Session::has('message'))
    
  @php($message = Session::get('message')) 

  @if ($message['class'] == 'alert-success')




    
    <div class="alert {{$message['class']}} alert-dismissible fade show text-center margin-bottom-1x">
      <span class="alert-close" data-dismiss="alert"></span>
      <i class="icon-help"></i>&nbsp;&nbsp;
      <strong>عملیات موفقیت آمیز انجام شد</strong>
      <p>{{$message['message']}}.</p>
    </div>

    
      

  @else
    

    <div class="" style="margin: auto;">
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
    	
       <div class="row" style="margin-top: 5%;">
          @include('partials.dashboard-menu')
          <div class="col-lg-8 text-right">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <form class="row" action="{{route('update_user_profile')}}" method="POST">
            	@csrf
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-fn">نام شما</label>
                  <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-ln">فامیلی شما</label>
                  <input class="form-control" type="text" name="lastname" value="{{Auth::user()->lastname}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-email">آدرس ایمیل</label>
                  <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-phone">شماره تلفن</label>
                  <input class="form-control" type="text" id="mobile" value="{{Auth::user()->mobile}}" disabled>
                  <input type="hidden" id="mobile" name="mobile" value="{{Auth::user()->mobile}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-pass">رمز عبور</label>
                  <input class="form-control" type="password" name="password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-confirm-pass">تایید رمز عبور</label>
                  <input class="form-control" type="password" name="passwordre">
                </div>
              </div>
              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                  <label class="custom-control custom-checkbox d-block">
                    @if (Auth::user()->newsletters == 1)
                    <input class="custom-control-input" type="checkbox" name="newsletters" value="true" checked><span class="custom-control-indicator"></span><span class="custom-control-description">مشترک شدن در خبرنامه فروشگاه</span>
                    @else
                    <input class="custom-control-input" type="checkbox" name="newsletters" value="true" ><span class="custom-control-indicator"></span><span class="custom-control-description">مشترک شدن در خبرنامه فروشگاه</span>
                    @endif
                  </label>
                  <button class="btn btn-primary margin-right-none" type="submit" >بروز رسانی پروفایل</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

 





@stop