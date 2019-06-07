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
                    <h2>ویرایش پروفایل</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('admin_dashboard')}}" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>تنظیمات</strong> امنیتی</h2>
                        </div>
                        <form method="POST" action="{{route('edit_profile_security')}}">
                            @csrf
                        	<div class="body">
                            	<div class="row">
                                	<div class="col-lg-4 col-md-12">
                                    	<div class="form-group">
                                        	<input type="text" class="form-control" name="username" value="{{Auth::guard('admin')->user()->username}}" disabled="true">
                                    	</div>
                                	</div>
                                	<div class="col-lg-4 col-md-12">
                                    	<div class="form-group">
                                        	<input type="password" class="form-control" name="password" placeholder="رمز عبور فعلی">
                                    	</div>
                                	</div>
                                	<div class="col-lg-4 col-md-12">
                                    	<div class="form-group">
                                        	<input type="password" class="form-control" name="retype-password" placeholder="رمزعبور جدید">
                                    	</div>
                                	</div>
                                	<div class="col-12">
                                    	<button class="btn btn-info">ذخیره تغییرات</button>
                                	</div>                                
                            	</div>                              
                        	</div>
                    	</form>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>تنظیمات</strong> حساب</h2>
                        </div>
                        <form method="POST" action="{{route('edit_profile_account')}}">
                            @csrf
                        	<div class="body">
                            	<div class="row clearfix">
                                	<div class="col-lg-4 col-md-12">
                                    	<div class="form-group">
                                        	<input type="text" class="form-control" name="name" value="{{Auth::guard('admin')->user()->name}}" placeholder="نام اصلی">
                                    	</div>
                                	</div>
                                	<div class="col-lg-4 col-md-12">
                                    	<div class="form-group">
                                        	<input type="text" class="form-control" name="lastname" value="{{Auth::guard('admin')->user()->lastname}}" placeholder="نام خانوادگی">
                                    	</div>
                                	</div>                                    
                                	<div class="col-lg-4 col-md-12">
                                    	<div class="form-group">
                                        	<input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}" disabled="true">
                                    	</div>
                                	</div>
                                	<div class="col-md-12">
                                    	<button class="btn btn-primary">ذخیره تغییرات</button>
                                	</div>
                            	</div>
                        	</div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@section('scripts')


@if(Session::has('message'))

    @php($message = Session::get('message')) 

    @if ($message['class'] == 'success')

        <script type="text/javascript">

            $(document).ready(function(){


            Swal.fire({title: 'انجام شد',text: 'تغییرات با موفقیت اعمال شد .',type: 'success',confirmButtonText: 'باشه'})
        
            })

        </script>

    @elseif($message['class'] == 'error')

        <script type="text/javascript">

            $(document).ready(function(){


            Swal.fire({title: 'خطا',text: 'کلمه عبور باید با تکرار آن برابر باشد',type: 'error',confirmButtonText: 'باشه'})
        
            })

        </script>
        
    @elseif($message['class'] == 'error-min')
    
    	<script type="text/javascript">

            $(document).ready(function(){


            Swal.fire({title: 'خطا',text: 'کلمه عبور باید بیشتر از 8 کاراکتر باشد .',type: 'error',confirmButtonText: 'باشه'})
        
            })

        </script>

    @elseif($message['class'] == 'name-error')

        <script type="text/javascript">

            $(document).ready(function(){


            Swal.fire({title: 'خطا',text: 'نام باید بیشتر از 3 کاراکتر باشد .',type: 'error',confirmButtonText: 'باشه'})
        
            })

        </script>
        
    @elseif($message['class'] == 'lastname-error')

        <script type="text/javascript">

            $(document).ready(function(){


            Swal.fire({title: 'خطا',text: 'نام خانوادگی باید بیشتر از 4 کاراکتر باشد .',type: 'error',confirmButtonText: 'باشه'})
        
            })

        </script>

    @endif

@endif
@stop