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
                    <h2>لیست محصول</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> آئرو</a></li>
                        <li class="breadcrumb-item">فروشگاهی</li>
                        <li class="breadcrumb-item active">لیست محصول</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a class="btn btn-success btn-icon float-right" href="{{route('add_product')}}"><i class="zmdi zmdi-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="body" style="padding-bottom: 30px;">
            <div class="col-lg-3 col-md-6">
                <h3 style="text-align: right;"> <strong> جستجو در دسته بندی</strong> </h3>
                <form method="POST" action="{{route('product_list_search_by_category')}}">
                    @csrf
                    <select class="form-control show-tick ms select2" name="category">
                        <option></option>
                        @foreach($categorys1 as $category1)
                            <optgroup label="{{$category1->pro_cat_name}}">
                            @foreach($categorys2 as $category2)
                                @if($category2->pro_topcat2_id == $category1->id)
                                    <option>{{$category2->pro_cat_name}}</option>
                                @endif
                            @endforeach
                            </optgroup>
                        @endforeach
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
                                        <th>تصویر</th>
                                        <th>نام محصول</th>
                                        <th data-breakpoints="sm xs">جزئیات</th>
                                        <th data-breakpoints="xs">مقدار</th>
                                        <th data-breakpoints="xs md">موجودی</th>
                                        <th data-breakpoints="sm xs md">اقدام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        @if($product->pro_status >= 0 && $product->pro_status <= 2)
                                            <tr>
                                                <td><img src="{{asset('images/shop/product-picture')}}/{{$product->pro_image_source}}" width="48" alt="{{$product->pro_name}}"></td>
                                                <td><h5>{{$product->pro_name}}</h5></td>
                                                <td><span class="text-muted">{{$product->pro_detail}}</span></td>
                                                <td>{{$product->pro_price}} تومان</td>
                                                <td>{{$product->pro_inventory}}</td>
                                                <td>
                                                    @if($product->pro_status == 0)
                                                        <a href="{{route('block_product',['id' => $product->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد محصول"><i class="zmdi zmdi-block"></i></a>
                                                        <a href="{{route('approve_product',['id' => $product->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش محصول"><i class="zmdi zmdi-eye"></i></a>
                                                    @endif
                                                    @if($product->pro_status == 1)
                                                        <a href="{{route('block_product',['id' => $product->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انسداد محصول"><i class="zmdi zmdi-block"></i></a>
                                                    @endif
                                                    @if($product->pro_status == 2)
                                                        <a href="{{route('approve_product',['id' => $product->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="نمایش پست"><i class="zmdi zmdi-eye"></i></a>
                                                    @endif
                                                        <a href="{{route('delete_product',['id' => $product->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-red" title="انتقال به زباله دان"><i class="zmdi zmdi-delete"></i></a>
                                                        <a href="{{route('edit_product',['id' => $product->id])}}" class="btn btn-default waves-effect waves-float btn-sm waves-green" title="ویرارش"><i class="zmdi zmdi-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$products->render('admin.partials.pagination-admin-panel')}}
                </div>
            </div>
        </div>
    </div>
</section>



@stop

@section('scripts')
    <script src="{{asset('assetsadmin/assets/bundles/footable.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('assetsadmin/assets/js/pages/tables/footable.js')}}"></script><!-- Custom Js --> 
@stop