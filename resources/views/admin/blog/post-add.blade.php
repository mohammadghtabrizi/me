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
                    <h2>اضافه کردن وبلاگ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> امداد آی تی</a></li>
                        <li class="breadcrumb-item">وبلاگ</li>
                        <li class="breadcrumb-item active">اضافه کردن وبلاگ</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <form method="get" action="{{route('admin_blog_index')}}">
                        @csrf
                        <button class="btn btn-success btn-icon float-right" type="submit" ><i class="zmdi zmdi-check"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>اضافه کردن</strong>وبلاگ</h2>
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
                        <form method="POST" action="{{route('add_post_act')}}">
                        	@csrf
                            <label for="post_category">سرتیتر وبلاگ</label>
                            <div class="form-group">                                
                    	        <input type="text" id="post_category" class="form-control" name="posttitre" placeholder="سرتیتر وبلاگ را وارد نمایید ">
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="postlessdesc" placeholder="لطفا آنچه را که میخواهید تایپ کنید..."></textarea>
                                </div>
                            </div>
                            <textarea class="summernote" name="postlongdesc"></textarea>
                            <div class="card">
                                <div class="header">
                                    <h2><strong>انتخاب</strong>دسته بندی</h2>
                                </div>
                                <select class="form-control show-tick ms select2" name="category" data-placeholder="انتخاب">
                                    <option></option>
                                    @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->BC_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h2><strong>اندازه فایل</strong> محدود</h2>
                                </div>
                                <div class="body">
                                    <p>سعی کنید فایل بزرگتر از 100 کیلوبایت آپلود کنید</p>
                                    <input type="file" class="dropify" name="imagepost" data-max-file-size="1000K">
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