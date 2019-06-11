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
                        <form method="POST" action="#">
                        	@csrf
                            <label for="post_category">سرتیتر وبلاگ</label>
                            <div class="form-group">                                
                                <input type="text" id="post_category" class="form-control" name="posttitre" value="{{$post->BP_METATAG_DESCRIPTION}}" >
                            </div>
                            <div class="form-group">                                
                                <input type="text" id="post_category" class="form-control" name="posttitre" value="{{$post->BP_TITLE_PAGE}}" >
                            </div>
                            <div class="form-group">                                
                                <input type="text" id="post_category" class="form-control" name="posttitre" value="{{$post->BP_TAG_H1}}" >
                            </div>
                            <div class="form-group">                                
                    	        <input type="text" id="post_category" class="form-control" name="posttitre" value="{{$post->BP_TITLE}}" >
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="postlessdesc" >
                                        {{$post->BP_DESS}}
                                    </textarea>
                                </div>
                            </div>
                            <textarea class="summernote" name="postlongdesc">
                                {!!$post->BP_DESL!!}
                            </textarea>
                            <div class="card">
                                <div class="header">
                                    <h2><strong>انتخاب</strong>دسته بندی</h2>
                                </div>
                                <select class="form-control show-tick ms select2" name="category" data-placeholder="انتخاب">
                                    <option value="$post->idcategory">{{$post->BC_NAME}}</option>
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
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">                    
                        <div class="tab-content">
                            <div class="tab-pane active" >
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <a href="javascript:void(0);" class="file">
                                                <div class="hover">
                                                    <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                                <div class="image">
                                                    <img src="{{asset('images/post-images')}}/{{ $post->bf_source }}" alt="img" class="img-fluid">
                                                </div>
                                                <div class="file-name">
                                                    <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                                    <small>اندازه: 2 مگابایت <span class="date">11 دسامبر 2019</span></small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
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