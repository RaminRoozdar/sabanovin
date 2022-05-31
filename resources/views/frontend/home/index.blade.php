<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ settings()->get('SITE_TITLE') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/logo/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/logo/favicon.png') }}">
    <meta content="رامین روزدار" name="author" />
    <meta itemprop="name" content="{{ settings()->get('SITE_TITLE') }}">
    <meta property="og:title" content="سیستم مدیریت مشتری {{ settings()->get('SITE_TITLE') }}" />
    <meta property="og:description" content="{{ settings()->get('SITE_DESCRIPTION') }}" />
    <meta property="og:type" content="document" />
    <meta property="og:url" content="{{ settings()->get('SITE_URI_SSL') }}" />
    <meta property="og:image" content="{{ config('global.SITE_LOGO') }}" />
    <meta property="og:site_name" content="سیستم مدیریت مشتری {{ settings()->get('SITE_TITLE') }}"/>

    </ "link rel="canonical" href="https://sabanovin.com/">
    </ "link rel="canonical" href="https://sabanovin.com/blog">
    </ "link rel="canonical" href="https://sabanovin.com/shop">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--  <style>
        div.col a.nav-link img{
            transition: transform .7s ease-in-out;
        }
        div.col a.nav-link img:hover{
            transform: rotate(360deg);
        }
    </style>  --}}

    <script type='text/javascript'>
        window.$_DANACHAT_API || (function (d, w) {
            var r = $_DANACHAT_API = function (c) { r._.push(c); };
            w.__danachat_app_base_url = '/Dana/';w.__danachat_host_url = 'https://crm.sabanovin.com/';
            w.__danachat_account = 'E433FD9C3AE424C56FD4CCF8A5BE630256EC76F3D1A7C52B0B7B324C8255FA59C84308247C9A4C01';
            w.__danachat_widget = 'E433FD9C3AE424C56FD4CCF8A5BE630256EC76F3D1A7C52B0B7B324C8255FA59C84308247C9A4C01';
            w.__danachat_profile = 'E433FD9C3AE424C56FD4CCF8A5BE630256EC76F3D1A7C52B0B7B324C8255FA59C84308247C9A4C01';
            w.__danachat_version = 1;w.__danachat_ci = 'DanaChatApp';w.__danachat_cs = '311089434AFB6B7D5842AEDC542356CC6AD25B1E';
            r._ = [];var rc = d.createElement('script');rc.type = 'text/javascript';rc.async = true;rc.setAttribute('charset', 'utf-8');
            rc.src = w.__danachat_host_url + w.__danachat_app_base_url + 'dpx/chat/chat.embed.min.js';
            var s = d.getElementsByTagName('script')[0];s.parentNode.insertBefore(rc, s);
        })(document, window);
    </script>

</head>

<body dir="rtl">
    <div id="app">
       <div class="container-fluid bg-container pr-0 pl-0 mr-0 ml-0">
             <div class="row mr-0 ml-0">
                <div class="col">
                    <a class="nav-link" href="/">
                      <img height="60" width="150" src="{{asset('img/logo/logoK.png')}}" alt="{{ settings()->get('SITE_TITLE') }}"></img>
                      {{--  <img class="rounded-circle logo" height="150" width="150" src="{{asset('img/logo/logo4.png')}}" alt="{{ settings()->get('SITE_TITLE') }}"></img>  --}}
                      {{--  <h2 class="text-info m-0 d-inline h5">{{ settings()->get('SITE_TITLE') }}</h2>  --}}
                    </a>
                </div>
                <div class="col">
                   <div dir="ltr" class="d-none d-lg-block float-left">
                    <div class="col-md-12 mt-3">
                 &nbsp;<a class="btn btn-sm btn-warning btn-contact" data-toggle="tooltip"  data-placement="top" title="برای تماس کلیک کنید" href="tel:90002009">
                          <i class="fa fa-phone align-middle text-white"></i>
                       </a>
                       <span class="text-info span-contact" style="font-size:14px;"> <small class="text-muted">تماس رایگان</small> {{ toFarsiNumber(settings()->get('SUPPORT_TEL')) }}</span>
		          	    </div>
                    <div class="col-md-12 mt-3">
                &nbsp;<a class="btn btn-sm btn-warning" data-toggle="tooltip"  data-placement="top" title="برای ارسال ایمیل کلیک کنید" href="mailto:{{ settings()->get('EMAIL') }}">
                           <i class="fa fa-envelope-o align-middle text-white"></i>
                       </a>
                       <span class="text-info" style="font-size:14px;">{{ settings()->get('EMAIL') }}</span>
                    </div>
                   </div>
                </div>
              </div>
             <div class="col mt-3 pr-0 pl-0">
                <nav class="navbar navbar-light navbar-expand-lg" style="background: #1e49ab; padding-left:33px">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto" style="margin-right:-35px !important">
                    @foreach ($menus as $menu)
                      <li class="mr-4">
                         <a class="text-white text-decoration-none" href="{{ $menu->link }}">{{$menu->title}}</a>
                      </li>
                    @endforeach
                  </ul>

                      &nbsp;<a class="btn btn-sm btn-warning">
                         <i class="fa fa-search text-white"></i>
                      </a>
                      @guest
                      &nbsp;
                      <a href="{{route('login')}}" class="btn btn-sm btn-warning">
                        <i class="fa fa-user-o text-white"></i>
                      </a>
                      @else
                      &nbsp;
                      <a href="{{route('dashboard')}}" class="btn btn-sm btn-warning">
                        <i class="fa fa-user-o text-white"></i>
                      </a>
                      @endguest
                      &nbsp;<a class="btn btn-sm btn-warning">
                        <i class="fa fa-shopping-cart align-middle text-white"></i>
                      </a>
                </div>
                </nav>
              </div>
             </br>
             <div class="col">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    {{--  <ol class="carousel-indicators">
                        @foreach( $sliders as $slider )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>  --}}
                    <div class="carousel-inner" role="listbox">
                        @foreach( $sliders as $slider )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <a href="{{ $slider->link }}">
                                    <img class="d-block w-100 rounded" src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}">
                                    {{--  <div class="carousel-caption">
                                        <p class="text-white text-md-center">{{ $slider->title }}</p>
                                    </div>  --}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                </br>

              <div class="col row m-0 p-0">
                    <div class="col-md-2 m-0 p-0 text-white">
                          <p class="p-2" style="background:#1e49ab;">
                            <i class="fa fa-newspaper-o"></i>&nbsp;
                               آخرین اخبار
                          </p>
                    </div>
                   <div class="col-md-10 m-0 p-0">
                     <div id="owl-example" class="owl-carousel bg-white">
                      @foreach ($items as $item)
                          <div>
                            <a href="{{ route('itemView',['id' => $item->id , 'slug' => $item->slug]) }}" class="nav-link text-dark">
                                <i class="fa fa-circle text-warning font-size-icon"></i>
                                {{ $item->title }}
                                <small class="text-muted">
                                {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format('j %B Y')  }}
                                </small>
                            </a>
                        </div>
                      @endforeach
                   </div>
              </div>

       </div>
        </br>
        </div>
       </div>
      <div class="container-fluid bg-white">
        <div class="container mt-5">
          <h2 class="home-title m-0">
            <span>  خدمات و محصولات  </span>
          </h2>
          <h3 class="home-subtitle mt-1 mb-0">مجموعه ای از کالاها و خدمات</h3>
            <div class="mt-5 mb-5">
              <div class="row">
                <div class="col-sm-6 col-lg-4 mb-1">
                  <div class="card">
                      <img src="{{asset('img/img3.png')}}" class="card-img-top" alt="پیام کوتاه">
                        <div class="card-footer card-footer-text">
                          <a href="#" class="text-decoration-none h5"><small class="text-white">پیام کوتاه</small></a>
                        </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-1">
                  <div class="card">
                    <img src="{{asset('img/img2.png')}}" class="card-img-top" alt="پرداخت یار">
                      <div class="card-footer card-footer-text">
                        <a href="#" class="text-decoration-none h5"><small class="text-white"> پرداخت یار </small></a>
                      </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-1">
                  <div class="card">
                    <img src="{{asset('img/img1.png')}}" class="card-img-top" alt="هدایت تراکنش">
                      <div class="card-footer card-footer-text">
                        <a href="#" class="text-decoration-none h5"><small class="text-white"> هدایت تراکنش </small></a>
                      </div>
                   </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="container-fluid bg-container">
        <div class="container mt-5 pb-5">
          <div class="row align-items-center">
            <div class="col-md-6 col-lg-7 col-xl-8 ">
              <div class="home-title about-title m-0">
                  <span class="text-muted">درباره ما بیشتر بدانید ...
                  </span>
              </div>
				  <p class="about-description my-20 text-muted text-justify">
                    شرکت فناوری صبانوین جام جم با نام تجاری صبانوین به طور تخصصی فعالیت خود را در زمینه ارائه درگاه های ارسال پیامک انبوه از سال 1390 آغاز کرد. این سامانه با اتصال به مرکز پيام‌ کوتاه شرکت ارتباطات سيار به عنوان نماینده اصلی اپراتورهای ١٠٠٠، ٢٠٠٠ و ٣٠٠٠شناخته شده و با بهره گیری از دانش و تخصص و انگیزه کادری مجرب به دنبال ارائه ایده‌های نوین تجاری در صنعت پيشرفته‌‌ پيام‌رسانی به مشتریان محترم می باشد .

                    همچنین صبانوین در سال 1397 موفق به اخذ مجوز پرداخت یاری از بانک مرکزی وشاپرک گردید که به عنوان اولین شرکت در جنوب کشور بود که موفق به اخذ این مجوز گردید

                    از سایر فعالیت های صبانوین به فعالیت در حوزه هدایت تراکنش میتوان اشاره کرد .
				  </p>
                  <br>
				  <a style="background:#1e49ab" href="{{ route('feedbacks') }}" class="btn btn-primary about-button">نظرات بیشتر</a>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 mt-5 ">
                <div class="testimonials owl-container p-20 bg-white position-relative">
					<div class="owl-carousel ng-isolate-scope owl-rtl owl-loaded owl-drag" options="{ autoplay: true, autoplayTimeout: 4500, autoplayHoverPause: true, smartSpeed: 500, loop:true, rtl: true, responsive:{ 0:{ items: 1 } } }">
						<div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(1232px, 0px, 0px); transition: all 0.5s ease 0s; width: 2156px;">

                                @foreach ($feedbacks as $feed)

                                <div class="owl-item cloned" style="width: 307.99px;">
                                    <div class="testimonials-item">
                                      <div class="d-flex align-items-center">
                                          <img src="{{ Storage::url($feed->image) }}" alt="{{ $feed->name }}" class="testimonials-item-image m-3">
                                          <h2 class="testimonials-item-title m-0">{{  $feed->name }}</h2>
                                      </div>
                                           <p class="testimonials-item-description m-3">{{ $feed->comment }}</p>
                                    </div>
                                  </div>

                                @endforeach

                            </div>
                        </div>
				  	</div>
                </div>
            </div>
         </div>
         </div>
      </div>

      <div class="container-fluid bg-white p-5">
       <div class="container">
         <h2 class="home-title m-0">
					    <span>مشتریان {{ settings()->get('SITE_TITLE') }} </span>
			    </h2>
          <h3 class="home-subtitle mt-half mb-0 mt-2">برخی از مشتریان ما</h3>

            <div class="owl-costumer owl-carousel owl-theme col-md-12 row bg-white mt-5 justify-content-center">

                         @foreach ($customers as $customer)
                                <div class="item border border-warning rounded m15">

                                      <a href="{{ $customer->link }}" target="_blank"><img class="p-2" width="100" height="150" src="{{ Storage::url($customer->image) }}" alt="{{ $customer->title }}" ></a>

                               </div>
                         @endforeach
             </div>

             <a style="background:#1e49ab" href="{{ route('customers') }}" class="btn btn-primary about-button">مشتریان بیشتر</a>

       </div>
      </div>

      <div class="container-fluid" style="background: #333;">
           <div class="container-xl">
               <div class="row">
                   <div class="col-md-6 row">
                    <div class="col-md-6 mb-5 mt-5">
                       <h3 class="footer-title">با ما همراه باشید</h3>
                       <div class="footer-contact">
								         	<div class="footer-contact-item my-half">
									        	<i class="fa fa-phone"></i>
									        	{{ toFarsiNumber(settings()->get('SUPPORT_TEL')) }}
									        	<span class="small">تماس رایگان</span>
								        	</div>
								         	<div class="footer-contact-item my-half">
								        		<i class="fa fa-envelope-o"></i>
                            {{ settings()->get('EMAIL') }}
								        	</div>
								        	<div class="footer-contact-item my-half">
								          		<i class="fa fa-map-marker"></i>
									          	{{ settings()->get('ADDRESS') }} &nbsp; {{ toFarsiNumber(settings()->get('ZIP_CODE')) }}
								        	</div>
							        	</div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="footer-title">خدمات ما</div>
                          <div class="footer-menu mb-30">
									        	<a href="/blog" class=" footer-menu-link text-decoration-none" target="_self">وبلاگ</a>
									         	<a href="/gallery" class=" footer-menu-link text-decoration-none" target="_self">گالری تصاویر</a>
								          	<a href="/form" class=" footer-menu-link text-decoration-none" target="_self">فرم دریافت اطلاعات</a>
									      	</div>
                    </div>
                   </div>
                   <div class="col-md-6 row">
                    <div class="col-md-6 mt-5">
                        <div class="footer-title">مطالب وبلاگ</div>
                        <div class="footer-menu mb-5">
									        	<a href="/post" class="footer-menu-link text-decoration-none">نوشته&zwnj;ی وبلاگی</a>
									        	<a href="/post-without-image" class="footer-menu-link text-decoration-none">نوشته&zwnj;ی وبلاگی بدون تصویر</a>
									        	<a href="/post-without-author" class="footer-menu-link text-decoration-none">نوشته&zwnj;ی وبلاگی بدون نویسنده</a>
									        	<a href="/post-without-comment" class="footer-menu-link text-decoration-none">نوشته&zwnj;ی وبلاگی بدون دیدگاه</a>
									        	{{--  <a href="/post-without-comment-and-commenting-disabled" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون دیدگاه و امکان ارسال</a>  --}}
							        	</div>
                    </div>
                    <div class="col-md-6 mt5 mb-5">
                           <div class="footer-certificates d-flex align-items-center justify-content-center h-100">
                            <img src="https://trustseal.enamad.ir/logo.aspx?id=75910&amp;p=qeOVMS61OBPTOUM8" alt="نماد الکترونیکی" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=75910&amp;p=qeOVMS61OBPTOUM8&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, top=30&quot;)" style="cursor:pointer" id="qeOVMS61OBPTOUM8">
                            <img id='jxlzesgtjzpeapfuapfuesgt' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=107550&p=rfthobpdjyoedshwdshwobpd", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=107550&p=nbpdlymayndtujynujynlyma'/>

					       </div>
                    </div>
                   </div>

               </div>
           </div>
      </div>

      <div class="container-fluid copyright pt-3 pb-3">
			        	<div class="container">
				          <div class="row align-items-center">
						        <div class="col-sm-6 text-center text-sm-right mb-15 mb-sm-0">
						      	   <div class="copyright-text float-right">
							        	تمامی حقوق محفوظ است.
						       	   </div>
						        </div>
					        	<div class="col-sm-6">
                                    <div class="footer-social text-center float-left">
                                        <a class="footer-social-link telegram" target="_blank" href="{{ settings()->get('TELEGRAM') }}"><span class="fa fa-send"></span></a>
                                        <a class="footer-social-link skype" target="_blank" href="{{ settings()->get('WHATSAPP') }}"><span class="fa fa-whatsapp"></span></a>
                                        <a class="footer-social-link instagram" target="_blank" href="{{ settings()->get('INSTAGRAM') }}"><span class="fa fa-instagram"></span></a>
                                        <a class="footer-social-link twitter" target="_blank" href="{{ settings()->get('TWITTER') }}"><span class="fa fa-twitter"></span></a>
                                        <a class="footer-social-link facebook" target="_blank" href="{{ settings()->get('FACEBOOK') }}"><span class="fa fa-facebook"></span></a>
                                        <a class="footer-social-link linkedin" target="_blank" href="{{ settings()->get('LINKEDIN') }}"><span class="fa fa-linkedin"></span></a>
								    </div>
						        </div>
				        	</div>
			        	</div>
			  </div>
    </div>


</body>
</html>
