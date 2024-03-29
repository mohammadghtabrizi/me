<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{route('admin_dashboard')}}"><img src="{{asset('assetsadmin/assets/images/logo/favicon.png')}}" width="25" alt="امداد آی تی"><span class="m-l-10">امداد آی تی</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="{{route('admin_dashboard')}}"><img src="{{asset('assetsadmin/assets/images/profile/defadminmenpicture.png')}}" alt="{{Auth::guard('admin')->user()->name}} {{Auth::guard('admin')->user()->lastname}}"></a>
                    <div class="detail">
                        <h4>{{Auth::guard('admin')->user()->name}}</h4>
                        <small>{{Auth::guard('admin')->user()->lastname}}</small>                        
                    </div>
                </div>
            </li>
            <li class="@if($activemenu == 'dashboard')active open @endif"><a href="{{route('admin_dashboard')}}"><i class="zmdi zmdi-home"></i><span>داشبورد</span></a></li>
            <li class="@if($activemenu == 'requestcategory')active open @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-receipt"></i><span>درخواست کارشناس</span></a>
                <ul class="ml-menu">
                    <li class="@if($activesubmenu == 'requestpage')active @endif"><a href="{{route('admin_expert_request_index')}}">لیست درخواست ها</a></li>
                </ul>
            </li>
            <li class="@if($activemenu == 'blogcategory')active open @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>وبلاگ</span></a>
                <ul class="ml-menu">
                    <li class="@if($activesubmenu == 'blogpost')active @endif"><a href="{{route('admin_blog_index')}}">پست وبلاگ</a></li>
                    <li class="@if($activesubmenu == 'blogcategory')active @endif"><a href="{{route('admin_categorys_blog_index')}}">دسته بندی ها</a></li>
                    <li class="@if($activesubmenu == 'blogtag')active @endif"><a href="{{route('admin_tags_blog_index')}}">تگ ها</a></li>
                </ul>
            </li>
            <li class="@if($activemenu == 'shopcategory')active open @endif"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>تجارت الکترونیک</span></a>
                <ul class="ml-menu">
                    <li class="@if($activesubmenu == 'productlist')active @endif"><a href="{{route('product_list_show')}}">لیست محصول</a></li>
                    <li class="@if($activesubmenu == 'categorylist')active @endif"><a href="{{route('category_list_show')}}">لیست دسته بندی</a></li>
                    <li class="@if($activesubmenu == 'brandslist')active @endif"><a href="{{route('brand_list_show')}}">لیست برند ها</a></li>
                    <li class="@if($activesubmenu == 'propertylist')active @endif"><a href="{{route('property_list_show')}}">ویژگی ها</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
