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
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست پست ها</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> امداد آی تی</a></li>
                        <li class="breadcrumb-item">وبلاگ</li>
                        <li class="breadcrumb-item active">لیست پست ها</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a class="btn btn-success btn-icon float-right" href="{{route('add_post')}}"><i class="zmdi zmdi-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        <th>شماره درخواست</th>
                                        <th data-breakpoints="xs">شهر</th>
                                        <th data-breakpoints="sm xs">نام درخواست کننده</th>
                                        <th data-breakpoints="xs md">موبایل</th>
                                        <th data-breakpoints="sm xs md">اقدام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($expertrequests as $expertrequest)
                                        @if($expertrequest->status >= 0 && $expertrequest->status <= 2)
                                    	    <tr>
                                    	        <td><h5>{{$expertrequest->requestid}}</h5></td>
                                    	        <td><span class="text-muted">{{ $citys[$expertrequest->city] }}</span></td>
                                    	        <td>{{$expertrequest->name}} {{$expertrequest->lastname}}</td>
                                    	        <td>
                                    	    	   {{$expertrequest->mobile}}
                                    	        </td>
                                    	        <td>
                                                    @if($expertrequest->status == 0)
                                                        <a href="{{route('expert_request_send',['id' => $expertrequest->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد پست"><i class="zmdi zmdi-mail-send"></i></a>
                                                        <a href="{{route('expert_request_delete',['id' => $expertrequest->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                    @endif
                                                    @if($expertrequest->status == 1)
                                                        <a href="{{route('expert_request_finish_job',['id' => $expertrequest->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد پست"><i class="zmdi zmdi-check"></i></a>
                                                        <a href="{{route('expert_request_delete',['id' => $expertrequest->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                    @endif
                                                    @if($expertrequest->status == 2)
                                                        <a href="{{route('expert_request_delete',['id' => $expertrequest->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                    @endif
                                            	       <a href="#" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش پست"><i class="zmdi zmdi-eye"></i></a>
                                        	   </td>
                                    	    </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$expertrequests->render('admin.partials.pagination-admin-panel')}}
                </div>
            </div>
        </div>
    </div>
</section>



@stop