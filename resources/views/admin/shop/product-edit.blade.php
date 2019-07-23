@extends('admin.layouts.main-admin')


@section('styles')
<!-- Colorpicker Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
<!-- Multi Select Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/multi-select/css/multi-select.css')}}">
<!-- Bootstrap Spinner Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/jquery-spinner/css/bootstrap-spinner.css')}}">
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
<!-- noUISlider Css -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/nouislider/nouislider.min.css')}}" />
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assetsadmin/assets/plugins/select2/select2.css')}}" />

@stop

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
                    <h2>ویرایش محصول</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> امداد آی تی</a></li>
                        <li class="breadcrumb-item">فروشگاه</li>
                        <li class="breadcrumb-item active">ویرایش محصول</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('admin_blog_index')}}" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>ویرایش</strong>محصول</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">اقدام</a></li>
                                    <li><a href="javascript:void(0);">اقدامی دیگر</a></li>
                                    <li><a href="javascript:void(0);">چیزی دیگر</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form enctype="multipart/form-data" method="POST" action="{{route('edit_product_act',['id' => $product->productid])}}">
                        	@csrf
                            <div class="form-group">                                
                                <input type="text" class="form-control" name="productname" value="{{$product->pro_name}}" placeholder="نام محصول">
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="productdetail" placeholder="لطفا آنچه را که میخواهید تایپ کنید...">{{$product->pro_detail}}</textarea>
                                </div>
                            </div>
                            <label for="post_category">نقد و بررسی</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea class="summernote" name="productreview">{{$product->pro_review}}</textarea>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">                                
                                        <input type="text"  class="form-control"  value="{{$product->pro_price}}" name="productprice" placeholder="قیمت محصول">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">                                
                                        <input type="text" class="form-control" value="{{$product->pro_inventory}}" name="productinventory" placeholder="موجودی انبار">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick ms select2" name="productcategory" data-placeholder="انتخاب دسته بندی">
                                                <option value="{{$product->categoryid}}">{{$product->pro_cat_name}}</option>
                                                @foreach($categorys1 as $category1)
                                                    <optgroup label="{{$category1->pro_cat_name}}">
                                                    @foreach($categorys2 as $category2)
                                                        @if($category2->pro_topcat2_id == $category1->id)
                                                            <option value="{{$category2->id}}">{{$category2->pro_cat_name}}</option>
                                                        @endif
                                                    @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick ms select2" name="brand" data-placeholder="انتخاب برند">
                                                <option value="{{$product->brandsid}}">{{$product->pro_brands_name}}</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->pro_brands_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@stop

@section('scripts')



<script src="{{asset('assetsadmin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js --> 
<script src="{{asset('assetsadmin/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js --> 
<script src="{{asset('assetsadmin/assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<script src="{{asset('assetsadmin/assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script> <!-- Jquery Spinner Plugin Js --> 
<script src="{{asset('assetsadmin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="{{asset('assetsadmin/assets/plugins/nouislider/nouislider.js')}}"></script> <!-- noUISlider Plugin Js -->
<script src="{{asset('assetsadmin/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
<script src="{{asset('assetsadmin/assets/js/pages/forms/advanced-form-elements.js')}}"></script> 


    


@stop