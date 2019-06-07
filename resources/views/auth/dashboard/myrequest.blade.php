@extends('layouts.main')

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
      <hr>
      <div class="text-right"><a class="btn btn-link-primary margin-bottom-none" href="#"><i class="icon-download"></i>&nbsp; جزئیات سفارش</a></div>
    </div>
  </div>

</div>

@stop