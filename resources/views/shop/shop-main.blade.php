@extends('layouts.main')

@section('main-content')

<div class="container padding-bottom-2x mb-2 padding-top-2x soft-shadow bg-white">
	<div class="row">
	  <!-- Categories-->
		<div class="col-xl-9 col-lg-8 order-lg-2">
		    <!-- Promo banner-->
		    <div class="alert alert-image-bg alert-dismissible fade show text-center mb-4" style="background-image: url(img/banners/alert-bg.jpg);"><span class="alert-close text-white" data-dismiss="alert"></span>
		      <div class="h3 text-medium text-white padding-top-1x padding-bottom-1x"><i class="icon-clock" style="font-size: 33px; margin-top: -5px;"></i>&nbsp;&nbsp;از بازارچه تخفیفات دیدن کنید و 50% تخفیف بگییرید&nbsp;&nbsp;&nbsp;
		        <div class="mt-3 hidden-xl-up"></div><a class="btn btn-primary" href="#">نمایش آفرها</a>
		      </div>
		    </div>
		    <div class="row">
				<div class="col-sm-6">
					<div class="card mb-30"><a class="card-img-tiles" href="shop-grid-ls.html">
					    <div class="inner">
							<div class="main-img"><img src="img/shop/categories/01.jpg" alt="Category"></div>
							<div class="thumblist"><img src="img/shop/categories/02.jpg" alt="Category"><img src="img/shop/categories/03.jpg" alt="Category"></div>
					    </div></a>
					  	<div class="card-body text-center">
							<h4 class="card-title">پوشاک و مد</h4>
							<p class="text-muted">شروع قیمت از 49/99 تومان</p><a class="btn btn-outline-primary btn-sm" href="shop-grid-ls.html">نمایش محصولات</a>
					  	</div>
					</div>
				</div>
		    </div>
		</div>
		<!-- Sidebar -->
		<div class="col-xl-3 col-lg-4 order-lg-1">
			<aside class="sidebar">
			  <div class="padding-top-2x hidden-lg-up"></div>
			  <section class="widget widget-categories widget-border">
			    <h3 class="widget-title">محبوبترین برندها</h3>
			    <ul>
			      <li><a href="#">آدیداس</a><span>(254)</span></li>
			    </ul>
			  </section>
			</aside>
		</div>
	</div>
</div>


@stop