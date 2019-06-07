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
            <li class="active open"><a href="{{route('admin_dashboard')}}"><i class="zmdi zmdi-home"></i><span>داشبورد</span></a></li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>وبلاگ</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin_blog_index')}}">پست وبلاگ</a></li>
                    <li><a href="{{route('admin_categorys_blog_index')}}">دسته بندی ها</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>مدیریت فایل</span></a>
                <ul class="ml-menu">
                    <li><a href="file-dashboard.html">همه فایل ها</a></li>
                    <li><a href="file-documents.html">اسناد</a></li>
                    <li><a href="file-images.html">تصاویر</a></li>
                    <li><a href="file-media.html">رسانه</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>تجارت الکترونیک</span></a>
                <ul class="ml-menu">
                    <li><a href="ec-dashboard.html">داشبورد</a></li>
                    <li><a href="ec-product.html">محصول</a></li>
                    <li><a href="ec-product-List.html">لیست محصول</a></li>
                    <li><a href="ec-product-detail.html">جزئیات محصول</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>مدیریت کاربران</span></a>
                <ul class="ml-menu">
                    <li><a href="ec-dashboard.html">داشبورد</a></li>
                    <li><a href="ec-product.html">محصول</a></li>
                    <li><a href="ec-product-List.html">لیست محصول</a></li>
                    <li><a href="ec-product-detail.html">جزئیات محصول</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>