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
          @if(Session::has('message'))
          @php($message = Session::get('message')) 
            <span class="invalid-feedback" role="alert" style="display: block; text-align: right; padding-top: 3%; padding-right: 3%;">
              <strong style="color: red;">{{ $message['message'] }}</strong>
            </span>
          @endif
          @php($danger='form-control-danger')
          @php($divdanger='has-danger')
          @foreach($errors->all() as $error)
          <span class="invalid-feedback" role="alert" style="display: block; text-align: right; padding-top: 3%; padding-right: 3%;">
              <strong style="color: red;">{{$error}}</strong>
          </span>
          @endforeach

      
          <div style="padding: 30px; text-align: right;">
            <form class="row" action="{{route('store_expertrequest')}}"  method="post">

              {{csrf_field()}}
              @php($user = Auth::user())
              <div class="col-sm-6">
                @if(!empty($errors->first('name')))
                <div class="form-group {{$divdanger}}">
                  <label class="col-2 col-form-label" for="reg-fn" style="max-width: 90%;">نام شما</label>
                  <input class="form-control {{$danger}}" type="text" id="reg-fn" name="name" value="{{@$user->name}}" required>
                </div>
                @else
                <div class="form-group">
                  <label class="col-2 col-form-label" for="reg-fn" style="max-width: 90%;">نام شما</label>
                  <input class="form-control" type="text" id="reg-fn" name="name" value="{{@$user->name}}" required>
                </div>
                @endif
              </div>
              <div class="col-sm-6">
                @if(!empty($errors->first('lastname')))
                <div class="form-group {{$divdanger}}">
                  <label class="col-2 col-form-label" for="reg-ln" style="max-width: 90%;">فامیلی شما</label>
                  <input class="form-control {{$danger}}" type="text" id="reg-ln" name="lastname" value="{{@$user->lastname}}" required>
                </div>
                @else
                <div class="form-group">
                  <label class="col-2 col-form-label" for="reg-ln" style="max-width: 90%;">فامیلی شما</label>
                  <input class="form-control" type="text" id="reg-ln" name="lastname" value="{{@$user->lastname}}" required>
                </div>
                @endif
              </div>
              <div class="col-sm-6">
                @if(!empty($errors->first('mobile')))
                <div class="form-group {{$divdanger}}">
                  <label class="col-2 col-form-label" for="reg-phone" style="max-width: 90%;">شماره تلفن</label>
                  <input class="form-control" type="text" id="reg-phone" name="mobile" value="{{@$user->mobile}}" required>
                </div>
                @else
                <div class="form-group">
                  <label class="col-2 col-form-label" for="reg-phone" style="max-width: 90%;">شماره تلفن</label>
                  <input class="form-control" type="text" id="reg-phone" name="mobile" value="{{@$user->mobile}}" required>
                </div>
                @endif
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
                  <label class="col-2 col-form-label" for="select-input1" style="max-width: 50%;">انتخاب  استان</label>
                  <select class="form-control" id="select-input1" name="city">
                    <option></option>
                    <option value="1">تهران</option>
                    <option value="2">تبریز</option>
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
                    <option value="1">ساعت 9 الی 12</option>
                    <option value="2">ساعت 12 الی 16</option>
                    <option value="3">ساعت 16 الی 19</option>
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

@section('main-content')


<section class="container pt-2 mb-3">
	<div class="row pt-2" style="background:none;">
	@include('partials.banner-index')
		

  </div><!--End Container Row-->
</section><!-- container -->

	

      <!-- Popular Brands-->
<section class="bg-faded padding-top-2x padding-bottom-4x" style="background:url(img/background/brand-pattern.jpg);border:solid 1px #e1e7ec">
  <div class="container">
    <h5 class="text-center mb-30 pb-2">پشتیبانی از همه برندها</h5>
    <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/hp.png')}}" data-toggle="tooltip" alt="">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/canon.png')}}" data-toggle="tooltip" alt="Canon">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/brother.png')}}" data-toggle="tooltip" alt="Brother">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/samsung.png')}}" data-toggle="tooltip" alt="Samsung">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/ricoh.png')}}" data-toggle="tooltip" alt="Ricoh">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/kyocera.png')}}" data-toggle="tooltip" alt="KYOCERA">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/kodak.png')}}" data-toggle="tooltip" alt="Kodak">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/toshiba.png')}}" data-toggle="tooltip" alt="Toshiba">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/fujitsu.png')}}" data-toggle="tooltip" alt="Fujitsu">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/lexmark.png')}}" data-toggle="tooltip" alt="Lexmark">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/konica-minolta.png')}}" data-toggle="tooltip" alt="Konica Minolta">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/xerox.png')}}" data-toggle="tooltip" alt="Xerox">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/epson.png')}}" data-toggle="tooltip" alt="Epson">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/panasonic.png')}}" data-toggle="tooltip" alt="Panasonic">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/acer.png')}}" data-toggle="tooltip" alt="Acer">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/asus.png')}}" data-toggle="tooltip" alt="ASUS">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/dell.png')}}" data-toggle="tooltip" alt="DELL">
      <img class="d-block w-110  m-auto" src="{{asset('img/brands/gigabyte.png')}}" data-toggle="tooltip" alt="GIGABYTE">
    </div>
  </div>
</section>
      
<!-- Site Footer-->

<script type="text/javascript">
  $(document).ready(function(){
    @if(Session::has('message'))
    $('#modalExpertRequest').modal('show');
  @endif
  }); 
</script>


@if(Session::has('messagesuccessrequest'))

  @php($messagesuccessrequest = Session::get('messagesuccessrequest')) 

  @if ($messagesuccessrequest['class'] == 'alert-success')
           
    <script type="text/javascript">
      Swal.fire({title: 'انجام شد',text: 'اطلاعات شما با موفقیت ثبت گردید  شما می توانید  با ورود به سامانه امداد  آی تی از  وضعیت درخواست خود مطلع شود .',type: 'success',confirmButtonText: 'باشه'})
    </script>      

  @endif

@endif

@stop