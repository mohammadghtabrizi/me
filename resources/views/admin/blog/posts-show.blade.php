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
                    <form method="get" action="{{route('add_post')}}">
                        @csrf
                        <button class="btn btn-success btn-icon float-right" type="submit" ><i class="zmdi zmdi-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="body" style="padding-bottom: 30px;">
        	<div class="col-lg-3 col-md-6">
                <h3 style="text-align: right;"> <strong> جستجو در دسته بندی</strong> </h3>
                <form method="POST" action="{{route('search_by_category_blog')}}">
                	@csrf
                	<select class="form-control show-tick ms select2" name="category">
                	    <option></option>
                	    <optgroup label="سردسته">
                	    @foreach($blogcategorys as $blogcategory)
                	    <option>{{$blogcategory->BC_NAME}}</option>
                	    @endforeach
                	    </optgroup>
                	</select>
                	<button type="submit" class="btn btn-info waves-effect m-t-20">جستجو</button>
            	</form>
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
                                        <th>تیتر پست</th>
                                        <th data-breakpoints="sm xs">دسته بندی پست</th>
                                        <th data-breakpoints="xs">نام کاربر</th>
                                        <th data-breakpoints="xs md">وضعیت نمایش</th>
                                        <th data-breakpoints="sm xs md">اقدام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($blogposts as $blogpost)
                                        @if($blogpost->BP_DISPLAYSTATUS >= 0 && $blogpost->BP_DISPLAYSTATUS <= 2)
                                    	    <tr>
                                    	        <td><h5>{{$blogpost->BP_TITLE}}</h5></td>
                                    	        <td><span class="text-muted">{{$blogpost->BC_NAME}}</span></td>
                                    	        <td>{{$blogpost->name}} {{$blogpost->lastname}}</td>
                                    	        <td>
                                    	    	   <span class="{{ $statuses[$blogpost->BP_DISPLAYSTATUS]['color'] }}">{{ $statuses[$blogpost->BP_DISPLAYSTATUS]['title'] }}</span>
                                    	        </td>
                                    	        <td>
                                                    @if($blogpost->BP_DISPLAYSTATUS == 0)
                                                        <a href="{{route('block_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد پست"><i class="zmdi zmdi-block"></i></a>
                                                        <a href="{{route('approve_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش پست"><i class="zmdi zmdi-eye"></i></a>
                                                        <a href="{{route('delete_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                    @endif
                                                    @if($blogpost->BP_DISPLAYSTATUS == 1)
                                                        <a href="{{route('block_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد پست"><i class="zmdi zmdi-block"></i></a>
                                                        <a href="{{route('delete_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                    @endif
                                                    @if($blogpost->BP_DISPLAYSTATUS == 2)
                                                        <a href="{{route('approve_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش پست"><i class="zmdi zmdi-eye"></i></a>
                                                        <a href="{{route('delete_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                    @endif
                                            	       <a href="{{route('edit_post',['id' => $blogpost->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-green" title="ویرارش"><i class="zmdi zmdi-edit"></i></a>
                                        	   </td>
                                    	    </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$blogposts->render('admin.partials.pagination-admin-panel')}}
                </div>
            </div>
        </div>
    </div>
</section>



@stop