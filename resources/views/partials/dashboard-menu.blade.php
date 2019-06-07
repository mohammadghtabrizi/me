<div class="col-lg-4">
    <aside class="user-info-wrapper">
      <div class="user-cover" style="background-image: url('{{asset('img/account/user-cover-img.jpg')}}'); border-color: #fff;">
        <div class="info-label" data-toggle="tooltip" title="شما در حال حاضر {{Auth::user()->points}} امتیاز برای مصرف در وب سایت امداد IT  دارید">
          <i class="icon-medal"></i> {{Auth::user()->points}} امتیاز</div>
      </div>
      <div class="user-info">
        <div class="user-avatar"><a class="edit-avatar" href="#"></a><img src="{{ asset('img/account') }}/{{Auth::user()->userpicture}}" alt="User"></div>
        <div class="user-data">
          <h4>{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</h4><span>{{$datenow}}</span>
        </div>
      </div>
    </aside>
    <nav class="list-group text-right">
    <a class="list-group-item with-badge @if($activeMenuDashboard == 'myrequest')active @endif" href="{{route('show_my_request')}}">
      <i class="icon-bag"></i> سفارشات من<span class="badge badge-primary badge-pill">{{$countrequests}}</span></a>
    <a class="list-group-item @if($activeMenuDashboard == 'myprofile')active @endif" href="{{route('dashboard_users')}}"><i class="icon-head"></i> پروفایل کاربری
      <span class="badge badge-primary badge-pill" style="float:left;">{{$countrequests}}</span>
    </a>
    <a class="list-group-item @if($activeMenuDashboard == 'myaddress')active @endif" href="{{route('show_my_address')}}"><i class="icon-map"></i> آدرسهای من
      <span class="badge badge-primary badge-pill" style="float:left;">{{$countrequests}}</span>
    </a>
  </nav>
</div>
