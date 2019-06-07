@extends('layouts.main')

@section('main-content')


<div class="container padding-bottom-2x padding-top-2x mb-2 ">
       	<h1 class="text-center">دنیایی از امکانات را در امداد آی تی تجربه کنید .</h1>
       	<h2 class="text-center" style="padding-bottom: 4%;">بزرگترین مرجع فوق تخصصی IT </h2>
       	<h5>امداد آی تی با بیش از 15 سال سابقه فعالیت در زمینه IT که شامل فروش و تعمیرات تخصصی ماشین های اداری از جمله تعمیرات پرینتر ، اسکنر ، کپی و پلاتر و همچنین تعمیرات تخصصی کامپیوتر ، لپ تاپ و نصب و راه اندازی و تامین نگه داری تجهیزات شبکه مفتخر است با خدمات بسیار متنوع در خدمت شما عزیزان باشد .</h3>
       	<h5>گروه امداد آی تی در نظر دارد برای ارتقا کیفیت خدمات رسانی و شفاف سازی قیمت ها ، ارائه گارانتی های معتبر در فروش و همچنین در بخش تعمیرات اقدام به ارائه خدمات جدید در بستر اینترنت و به صورت حضوری نماید.</h3>
        <div class="row align-items-center padding-bottom-2x">
          <div class="col-md-5"><img class="d-block w-270 m-auto" src="{{asset('img/features/01.png')}}" onmouseover="this.src='img/features/01.hover.png'" onmouseout="this.src='img/features/01.png'" alt="درخواست کارشناس "></div>
          <div class="col-md-7 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h3 class="text-right">درخواست کارشناس در محل</h3>
            <p style="text-align:justify">در این بخش شما می توانید با ثبت یک درخواست ، کارشناس متخصص امداد آی تی را در محل برای انجام خدماتی همچون
				</br></br>&#10004;	تعمیرات تخصصی پرینتر ، اسکنر ، کپی ، پلاتر
				</br>&#10004;	شارژ انواع کارتریج
				</br>&#10004;	تعمیرات کامپیوتر
				</br>&#10004;	تعمیرات لپ تاپ
				</br>&#10004;	نصب انواع نرم افزار و راه اندازی در زمینه ماشین های اداری و همچنین کامپیوتر و لپ تاپ
				</br>&#10004;	ویروس یابی و نصب ویندوز
				</br>&#10004;	نصب و راه اندازی شبکه
				</br></br>وسایر خدمات در زمینه IT را در کنار خود داشته باشید .
			</p>
			<a class="text-medium text-decoration-none" href="#" data-toggle="modal" data-target="#modalExpertRequest">همین حالا درخواست دهید &nbsp; <i class="icon-arrow-left"></i></a>
          </div>
        </div>
        <hr>
		
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5 order-md-2"><img class="d-block w-270 m-auto" src="{{asset('img/features/02.png')}}" onmouseover="this.src='img/features/02.hover.png'" onmouseout="this.src='img/features/02.png'" alt="دانولد  درایور و ریستر"></div>
          <div class="col-md-7 order-md-1 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h3 class="text-right">دانلود بدون مرز</h3>
            <p style="text-align:justify">امداد آی تی در نظر دارد برای سهولت کار مشتریان عزیز امکان دانلود درایور ها ریستر ها و همچنین دفترچه راهنمای تعمیرات انواع پرینتر ، اسکنر ، کپی ، پلاتر ، دستگاه های حرارتی و کاربنی و دیگر محصولات ماشین های اداری را از طریق سرورهای خود قرار دهد . </p>
			<a class="text-medium text-decoration-none" href="#" onclick="Swal.fire({title: 'دردست ساخت',text: 'قسمت  امداد دانلود دردست ساخت می باشد به زودی با خبرهای خوش در خدمات شما عزیزان خواهیم بود .',type: 'error',confirmButtonText: 'باشه'})"> &nbsp;امداد دانلود<i class="icon-arrow-left"></i></a>
          </div>
        </div>
        <hr>
		
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5"><img class="d-block w-270 m-auto" src="{{asset('img/features/03.png')}}" onmouseover="this.src='img/features/03.hover.png'" onmouseout="this.src='img/features/03.png'" alt="امداد بلاگ"></div>
          <div class="col-md-7 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h3 class="text-right">امداد بلاگ</h3>
            <p style="text-align:justify">ما مفتخر هستیم که مطالب آموزشی و خبرنامه های جدید دنیای IT از جمله ماشین های اداری ، شبکه ،کامپیوتر و لپ تاپ را به صورت کاملا رایگان در اختیار کاربران خود قرار دهیم .</p>
            <a class="text-medium text-decoration-none" href="{{route('blog_main')}}">امداد بلاگ&nbsp; <i class="icon-arrow-left"></i></a>
          </div>
        </div>
        <hr>
		
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5 order-md-2"><img class="d-block w-270 m-auto" src="{{asset('img/features/04.png')}}" onmouseover="this.src='img/features/04.hover.png'" onmouseout="this.src='img/features/04.png'" alt="فروشگاه"></div>
          <div class="col-md-7 order-md-1 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h3 class="text-right">فروشگاهی مطمئن </h3>
            <p style="text-align:justify">حتما به قسمت فروشگاهی امداد آی تی مراجعه کنید ما پیشنهادات جالبی برای همکاران و مشتریان عزیز داریم که شما به غیر از اینکه از یک فروشگاه معتبر با ضمانت کالا های با کیفیت خرید میکند بلکه می توانید کالا ها را با مناسب ترین قیمت ممکن خریداری کنید</p>
			<a class="text-medium text-decoration-none" href="#" onclick="Swal.fire({title: 'دردست ساخت',text: 'قسمت  فروشگاهی دردست ساخت می باشد به زودی با خبرهای خوش در خدمات شما عزیزان خواهیم بود .',type: 'error',confirmButtonText: 'باشه'})">نمایش محصولات &nbsp; <i class="icon-arrow-left"></i></a>
          </div>
        </div>
        <hr>
		
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5"><img class="d-block w-270 m-auto" src="{{asset('img/features/05.png')}}" onmouseover="this.src='img/features/05.hover.png'" onmouseout="this.src='img/features/05.png'" alt="جمعه  بازار"></div>
          <div class="col-md-7 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h3 class="text-right">جمعه بازار</h3>
            <p style="text-align:justify">این روزها با توجه به تورم شدید قیمت ها گاهی اواقات انتخاب یک کالای دست دوم با گارانتی معتبر و قمیت فوق العاده می تواند پیشنهاد بهتری نسبت به کالا های جدید باشد البته به شرط تضمین کارایی و کیفیت برابر که این تضمین وظیفه ماست پس با خیال راحت از جمعه بازار ما دیدن کنید .</p>
            <a class="text-medium text-decoration-none" href="#" onclick="Swal.fire({title: 'دردست ساخت',text: 'قسمت  جمعه بازار دردست ساخت می باشد به زودی با خبرهای خوش در خدمات شما عزیزان خواهیم بود .',type: 'error',confirmButtonText: 'باشه'})">نمایش محصولات &nbsp; <i class="icon-arrow-left"></i></a>
          </div>
		</div>
</div>




@stop