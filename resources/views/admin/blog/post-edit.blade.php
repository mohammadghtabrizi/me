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
                    <a href="{{route('admin_blog_index')}}" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
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
                        <form enctype="multipart/form-data" method="POST" action="{{route('edit_post_act',['id' => $post->id])}}">
                        	@csrf
                            <label for="post_category">سرتیتر وبلاگ</label>
                            <div class="form-group">
                                <div class="form-line">                                
                                    <input type="text" id="post_category" class="form-control" name="metatagdescription" value="{{$post->BP_METATAG_DESCRIPTION}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">                             
                                    <input type="text" id="post_category" class="form-control" name="titlepage" value="{{$post->BP_TITLE_PAGE}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">                             
                                    <input type="text" id="post_category" class="form-control" name="h1" value="{{$post->BP_TAG_H1}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">                              
                    	           <input type="text" id="post_category" class="form-control" name="posttitre" value="{{$post->BP_TITLE}}">
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="textarea" rows="4" class="form-control no-resize" name="postlessdesc" >{{$post->BP_DESS}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea type="textarea" class="summernote" name="postlongdesc" >{{$post->BP_DESL}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick ms select2" name="category" data-placeholder="انتخاب دسته بندی">
                                        <option value="{{$post->idcategory}}">{{$post->BC_NAME}}</option>
                                        @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->BC_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <div class="checkbox">
                                        @if($post->BP_BESTPOST == 1)
                                            <input id="special-post" type="checkbox" name="special-post" value="1" checked>
                                        @endif
                                        @if($post->BP_BESTPOST == 0)
                                            <input id="special-post" type="checkbox" name="special-post" value="1">
                                        @endif
                                        <label for="special-post">
                                                مطالب ویژه
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if(is_null($files))
                            <div class="form-group">
                                <div class="form-line">
                                    <p>سعی کنید فایل بزرگتر از 100 کیلوبایت آپلود کنید</p>
                                    <input type="file" class="dropify" name="image" data-max-file-size="1000K">
                                </div>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(!is_null($files))
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">                    
                        <div class="tab-content">
                            <div class="tab-pane active" >
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <a href="{{route('delete_post_picture',['id' => $files->id])}}" class="file">
                                                <div class="hover">
                                                    <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                                <div class="image">
                                                    <img src="{{asset('images/post-images')}}/{{ $files->bf_source }}" alt="img" class="img-fluid">
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
        @endif
    </div>
</section>


@stop