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
                    <h2>اضافه کردن محصول</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> امداد آی تی</a></li>
                        <li class="breadcrumb-item">فروشگاه</li>
                        <li class="breadcrumb-item active">اضافه کردن محصول</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('product_list_show')}}" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>اضافه کردن</strong>دسته بندی</h2>
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
                        <form enctype="multipart/form-data" method="POST" action="{{route('add_category_product_act')}}">
                        	@csrf
                            <div class="row clearfix">
                            	@if(!is_null($cats0))
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick ms select2" name="categoryselected1" data-placeholder="انتخاب دسته بندی">
                                                <option></option>
                                                @foreach($cats0 as $cat0)
                                                    <option value="{{$cat0->id}}">{{$cat0->pro_cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(!is_null($cats1))
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick ms select2" name="categoryselected2" data-placeholder="انتخاب دسته بندی">
                                                <option></option>
                                                @foreach($cats0 as $cat0)
                                                    <optgroup label="{{$cat0->pro_cat_name}}">
                                                    @foreach($cats1 as $cat1)
                                                        @if($cat1->pro_topcat1_id == $cat0->id)
                                                            <option value="{{$cat1->id}}">{{$cat1->pro_cat_name}}</option>
                                                        @endif
                                                    @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-sm-3">
                                    <div class="form-group">                                
                                        <input type="text" class="form-control" name="categoryselected0" placeholder="نام دسته بندی">
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