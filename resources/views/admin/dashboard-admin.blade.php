@extends('admin.layouts.main-admin')

@section('main-content-admin')

<!-- Right Icon menu Sidebar -->

@include('admin.partials.right-icon-menu-sidebar-dashboard-admin')

<!-- Left Sidebar -->

@include('admin.partials.left-menu-sidebar-dashboard-admin')

<!-- Right Sidebar -->

@include('admin.partials.right-menu-sidebar-dashboard-admin')

<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>داشبورد</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('edit_profile_view')}}" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="body_scroll">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12">
                            <div class="card mcard_3">
                                <div class="body">
                                    <a href="{{route('admin_dashboard')}}"><img src="{{asset('assetsadmin/assets/images/profile/defadminmenpicture.png')}}" class="rounded-circle shadow " alt="profile-image"></a>
                                    <h4 class="m-t-10">{{Auth::guard('admin')->user()->name}} {{Auth::guard('admin')->user()->lastname}}</h4>                    
                                    <div class="row" style="background-color: #e47297;">
                                        <div class="col-12">
                                            <ul class="social-links list-unstyled">
                                                <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">مدیر</p>
                                        </div>
                                        <div class="col-4">                                    
                                            <small>دنبال کردن</small>
                                            <h5>852</h5>
                                        </div>
                                        <div class="col-4">                                    
                                            <small>دنبال کننده</small>
                                            <h5>13k</h5>
                                        </div>
                                        <div class="col-4">                                    
                                            <small>پست</small>
                                            <h5>234</h5>
                                        </div>                          
                                    </div>
                                </div>
                                <div class="body">
                                    <small class="text-muted">آدرس ایمیل: </small>
                                    <p>{{Auth::guard('admin')->user()->email}}</p>
                                    <hr>
                                    <small class="text-muted">تلفن: </small>
                                    <p>{{Auth::guard('admin')->user()->mobile}}</p>
                                    <hr>
                                    <small class="text-muted">آدرس</small>
                                    <p>{{Auth::guard('admin')->user()->address}}</p>
                                    <hr>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

