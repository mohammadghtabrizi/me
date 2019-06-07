@extends('layouts.main')

@section('main-content')


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
    @endif
    @endif
  <div class="row">
  @include('partials.dashboard-menu')
      <div class="col-lg-8 ">
        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
        <h4>آدرس ارسال درخواست ها و مرسولات</h4>
        <hr class="padding-bottom-1x">
        <form class="row" action="{{route('update_user_address')}}" method="POST">
         @csrf
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-place">نام واحد</label>
              <input class="form-control" type="text" id="account-place" name="nameplace" value="{{Auth::user()->nameplace}}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-state">استان</label>
              <input class="form-control" type="text" id="account-state" name="state" value="{{Auth::user()->state}}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-city">شهر</label>
              <input class="form-control" type="text" id="account-city" name="city" value="{{Auth::user()->city}}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-postalcode">کد پستی</label>
              <input class="form-control" type="text" id="account-postalcode" name="postalcode" value="{{Auth::user()->postalcode}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-address1">آدرس 1</label>
              <input class="form-control" type="text" id="account-address1" name="address1" value="{{Auth::user()->address1}}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account-address2">آدرس 2</label>
              <input class="form-control" type="text" id="account-address2" name="address2" value="{{Auth::user()->address2}}">
            </div>
          </div>
          <div class="col-12 padding-top-1x">
            <hr class="margin-top-1x margin-bottom-1x">
            <div class="text-right">
              <button class="btn btn-primary margin-bottom-none" type="submit">بروز رسانی آدرسها</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>








@stop