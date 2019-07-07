<nav class="site-menu">
	<ul>
		<li class="has-megamenu @if($activeMenu == 'home') active @endif"><a href="{{route('index')}}"><span>خانه</span></a></li>
		<li><a href="{{route('comingsoon')}}"><span>خرید / فروشگاه</span></a></li>
		<li class="@if($activeMenu == 'register') active @endif"><a href="{{route('expertrequest')}}"><span>درخواست کارشناس</span></a></li>
		<li class="@if($activeMenu == 'blog') active @endif"><a href="{{route('blog_main')}}"><span>امداد بلاگ</span></a></li>
		<li class="@if($activeMenu == 'aboutus') active @endif"><a href="{{route('aboutus_user_view')}}"><span>درباره ما</span></a></li>
		<li class="@if($activeMenu == 'contactus') active @endif"><a href="{{route('contactus')}}"><span>تماس با ما</span></a></li>
	</ul>
</nav>