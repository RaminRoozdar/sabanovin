<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>

    @yield('title')

    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet">

    @yield('head')


    @yield('css')



</head>

<body dir="rtl">
    <div id="app">
       <div class="container-fluid bg-container">
          <div class="container-xl" >
             <div class="row">
                <div class="col">
                    <a class="nav-link" href="/">
                        <img height="60" width="150" src="{{asset('img/logo/logok.png')}}" alt="{{ settings()->get('SITE_TITLE') }}"></img>
                      {{--  <h2 class="text-info m-0 d-inline h5">صبانوین</h2>  --}}
                    </a>
                </div>
                <div class="col">
                   <div dir="ltr" class="d-none d-lg-block float-left">
                    <div class="col-md-12 mt-3">
                 &nbsp;<a class="btn btn-sm btn-warning btn-contact">
                          <i class="fa fa-phone align-middle text-white"></i>
                       </a>
                       <span class="text-info span-contact" style="font-size:14px;">{{ toFarsiNumber(settings()->get('SUPPORT_TEL')) }}</span>
		          	    </div>
                    <div class="col-md-12 mt-3">
                &nbsp;<a class="btn btn-sm btn-warning">
                           <i class="fa fa-envelope-o align-middle text-white"></i>
                       </a>
                       <span class="text-info" style="font-size:14px;">{{ settings()->get('EMAIL') }}</span>
                    </div>
                   </div>
                </div>
              </div>
           <div class="col mt-3 pb-5">
                <nav class="navbar navbar-light navbar-expand-lg" style="background: #1e49ab;">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
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
                        <i class="fa fa-shopping-cart align-middle text-white"></i></a>
                </div>
                </nav>
            </div>
        </div>
        </div>
        </br>


        </div>
       </div>


            @yield('content')



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
									          	{{ settings()->get('ADDRESS') }}
								        	</div>
							        	</div>
                   </div>
                   <div class="col-md-6 mt-5">
                        <div class="footer-title">خدمات ما</div>
                          <div class="footer-menu mb-30">
									        	<a href="/blog" class=" footer-menu-link" target="_self">وبلاگ</a>
									         	<a href="/gallery" class=" footer-menu-link" target="_self">گالری تصاویر</a>
								          	<a href="/form" class=" footer-menu-link" target="_self">فرم دریافت اطلاعات</a>
									      	</div>
                   </div>
                 </div>

                 <div class="col-md-6 row">
                     <div class="col-md-6 mt-5">
                        <div class="footer-title">مطالب وبلاگ</div>
                        <div class="footer-menu mb-5">
									        	<a href="/post" class="footer-menu-link">نوشته&zwnj;ی وبلاگی</a>
									        	<a href="/post-without-image" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون تصویر</a>
									        	<a href="/post-without-author" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون نویسنده</a>
									        	<a href="/post-without-comment" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون دیدگاه</a>
									        	<a href="/post-without-comment-and-commenting-disabled" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون دیدگاه و امکان ارسال</a>
							        	</div>
                     </div>
                     <div class="col-md-6 mt5 mb-5">
                           <div class="footer-certificates d-flex align-items-center justify-content-center h-100">
                               <img src="{{asset('img/enamad.png')}}">
                               <img src="{{asset('img/samandehi.png')}}">
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

        <!-- Scripts -->
        @yield('js')
          <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
          <script>
            iziToast.settings({
            rtl: true,
            zindex: 99999999999,
            position: 'bottomLeft',
            });
            if('{{ Session::has('message') }}') {
            iziToast['{{ Session::get('color') }}']({message:'{{ Session::get('message') }}'});
            }
            '@if(!$errors->isEmpty())'
            '@foreach ($errors->all() as $error)'
            iziToast['error']({message:'{{ $error }}'});
            '@endforeach'
            '@endif'
          </script>


</div>


</body>
</html>
