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
              <input class="form-control {{$danger}}" type="text" id="reg-fn" name="name" value="{{@$user->name}}" required disabled="true">
            </div>
            @else
            <div class="form-group">
              <label class="col-2 col-form-label" for="reg-fn" style="max-width: 90%;">نام شما</label>
              <input class="form-control" type="text" id="reg-fn" name="name" value="{{@$user->name}}" required disabled="true">
            </div>
            @endif
          </div>
          <div class="col-sm-6">
            @if(!empty($errors->first('lastname')))
            <div class="form-group {{$divdanger}}">
              <label class="col-2 col-form-label" for="reg-ln" style="max-width: 90%;">فامیلی شما</label>
              <input class="form-control {{$danger}}" type="text" id="reg-ln" name="lastname" value="{{@$user->lastname}}" required disabled="true">
            </div>
            @else
            <div class="form-group">
              <label class="col-2 col-form-label" for="reg-ln" style="max-width: 90%;">فامیلی شما</label>
              <input class="form-control" type="text" id="reg-ln" name="lastname" value="{{@$user->lastname}}" required disabled="true">
            </div>
            @endif
          </div>
          <div class="col-sm-6">
            @if(!empty($errors->first('mobile')))
            <div class="form-group {{$divdanger}}">
              <label class="col-2 col-form-label" for="reg-phone" style="max-width: 90%;">شماره تلفن</label>
              <input class="form-control" type="text" id="reg-phone" name="mobile" value="{{@$user->mobile}}" required disabled="true">
            </div>
            @else
            <div class="form-group">
              <label class="col-2 col-form-label" for="reg-phone" style="max-width: 90%;">شماره تلفن</label>
              <input class="form-control" type="text" id="reg-phone" name="mobile" value="{{@$user->mobile}}" required disabled="true">
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

<!-- Page Content-->

<div class="container padding-bottom-3x mb-2">

  <div class="row" style="margin-top: 5%;">
   @include('partials.dashboard-menu')
    <div class="col-lg-8">
      <div class="padding-top-2x mt-2 hidden-lg-up"></div>
      <div class="table-responsive">
        <table class="table table-hover margin-bottom-none text-right">
          <thead>
            <tr>
              <th>سفارشات #</th>
              <th>نوع خدمات</th>
              <th>تاریخ ثبت</th>
              <th>وضعیت</th>
            </tr>
          </thead>
          <tbody>

           @foreach($merequests as $merequest)

          
            <tr>
              <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">{{$merequest->requestid}}</a></td>                    
              <td><span class="text-medium">{{$services[$merequest->typerequest]}}</span></td>
              <td>{{$merequest->created_at}}</td>

              <td>
                <span class="{{ $statuses[$merequest->status]['color'] }}">
                  {{ $statuses[$merequest->status]['title'] }}
                </span>
              </td>


            </tr>

          @endforeach
          </tbody>
        </table>
      </div>
      <hr class="mb-4">
      <div class="text-right">
        <a href="#" data-toggle="modal" data-target="#modalExpertRequest"><button class="btn btn-primary margin-bottom-none" data-toggle="modal" data-target="#openTicket">ثبت یک درخواست جدید</button></a>
      </div>
    </div>
  </div>

</div>

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
@include('messages.submit-done')
@include('messages.error')
@stop

