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
                    <a href="{{route('add_tag_post')}}" class="btn btn-success btn-icon float-right"><i class="zmdi zmdi-plus"></i></a>
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
                                        <th>نام تگ</th>
                                        <th data-breakpoints="sm xs md">اقدام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($tags as $tag)
                                    	<tr>
                                    	    <td><h5>{{$tag->BT_VALUE}}</h5></td>
                                    	    <td>
                                                <a href="{{route('delete_tag',['id' => $tag->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                <a href="{{route('edit_tag',['id' => $tag->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-green" title="ویرارش"><i class="zmdi zmdi-edit"></i></a>
                                        	</td>
                                    	</tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$tags->render('admin.partials.pagination-admin-panel')}}
                </div>
            </div>
        </div>
    </div>
</section>



@stop