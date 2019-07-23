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
                    <h2>لیست دسته بندنی محصولات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><i class="zmdi zmdi-home"></i> امداد آی تی</a></li>
                        <li class="breadcrumb-item">فروشگاه</li>
                        <li class="breadcrumb-item active">لیست دسته بندی</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('add_category_post')}}" class="btn btn-success btn-icon float-right"><i class="zmdi zmdi-plus"></i></a>
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
                                        <th>دسته بندی اصلی</th>
                                        <th>دسته بندی 1</th>
                                        <th>دسته بندی 2</th>
                                        <th data-breakpoints="xs md">وضعیت نمایش</th>
                                        <th data-breakpoints="sm xs md">اقدام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorys0 as $category0)
                                        <tr>
                                            <td><h5>{{$category0->pro_cat_name}}</h5></td>
                                            <td><h5>---</h5></td>
                                            <td><h5>---</h5></td>
                                            <td>
                                               <span class="{{ $statuses[$category0->pro_cat_status]['color'] }}">{{ $statuses[$category0->pro_cat_status]['title'] }}</span>
                                            </td>
                                            <td>
                                                @if($category0->pro_cat_status == 0)
                                                    <a href="{{route('approve_category',['id' => $category0->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش"><i class="zmdi zmdi-eye"></i></a>
                                                @endif
                                                @if($category0->pro_cat_status == 1)
                                                    <a href="{{route('block_category',['id' => $category0->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد"><i class="zmdi zmdi-block"></i></a>
                                                @endif
                                                @if($category0->pro_cat_status == 2)
                                                    <a href="{{route('approve_category',['id' => $category0->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش"><i class="zmdi zmdi-eye"></i></a>
                                                @endif
                                                   <a href="{{route('approve_category',['id' => $category0->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-green" title="ویرارش"><i class="zmdi zmdi-edit"></i></a>
                                                   <a href="{{route('delete_category',['id' => $category0->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        @foreach($categorys1 as $category1)
                                            @if($category1->pro_topcat1_id == $category0->id)
                                                <tr>
                                                    <td><h5>{{$category0->pro_cat_name}}</h5></td>
                                                    <td><h5>{{$category1->pro_cat_name}}</h5></td>
                                                    <td><h5>---</h5></td>
                                                    <td>
                                                       <span class="{{ $statuses[$category1->pro_cat_status]['color'] }}">{{ $statuses[$category1->pro_cat_status]['title'] }}</span>
                                                    </td>
                                                        <td>
                                                    @if($category1->pro_cat_status == 0)
                                                        <a href="{{route('approve_category',['id' => $category1->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش"><i class="zmdi zmdi-eye"></i></a>
                                                    @endif
                                                    @if($category1->pro_cat_status == 1)
                                                        <a href="{{route('block_category',['id' => $category1->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد"><i class="zmdi zmdi-block"></i></a>
                                                    @endif
                                                    @if($category1->pro_cat_status == 2)
                                                        <a href="{{route('approve_category',['id' => $category1->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش"><i class="zmdi zmdi-eye"></i></a>
                                                    @endif
                                                       <a href="{{route('approve_category',['id' => $category1->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-green" title="ویرارش"><i class="zmdi zmdi-edit"></i></a>
                                                       <a href="{{route('delete_category',['id' => $category1->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
                                                </tr>
                                                @foreach($categorys2 as $category2)
                                                    @if($category2->pro_topcat2_id == $category1->id)
                                                        <tr>
                                                            <td><h5>{{$category0->pro_cat_name}}</h5></td>
                                                            <td><h5>{{$category1->pro_cat_name}}</h5></td>
                                                            <td><h5>{{$category2->pro_cat_name}}</h5></td>
                                                            <td>
                                                               <span class="{{ $statuses[$category2->pro_cat_status]['color'] }}">{{ $statuses[$category2->pro_cat_status]['title'] }}</span>
                                                            </td>
                                                            <td>
                                                                @if($category2->pro_cat_status == 0)
                                                                    <a href="{{route('approve_category',['id' => $category2->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش"><i class="zmdi zmdi-eye"></i></a>
                                                                @endif
                                                                @if($category2->pro_cat_status == 1)
                                                                    <a href="{{route('block_category',['id' => $category2->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد"><i class="zmdi zmdi-block"></i></a>
                                                                @endif
                                                                @if($category2->pro_cat_status == 2)
                                                                    <a href="{{route('approve_category',['id' => $category2->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش"><i class="zmdi zmdi-eye"></i></a>
                                                                @endif
                                                                   <a href="{{route('approve_category',['id' => $category2->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-green" title="ویرارش"><i class="zmdi zmdi-edit"></i></a>
                                                                   <a href="{{route('delete_category',['id' => $category2->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@stop