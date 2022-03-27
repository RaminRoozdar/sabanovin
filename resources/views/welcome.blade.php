<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  

</head>

<body dir="rtl">
    <div id="app">
       <div class="container-fluid bg-container">
          <div class="container" >
             <div class="row">
                <div class="col">
                    <a class="nav-link" href="/">
                      <img src="{{asset('img/logo.png')}}" alt="صبانوین"></img>
                      <h2 class="text-info m-0 d-inline h5">صبانوین</h2>
                    </a>
                </div>
                <div class="col">
                   <div dir="ltr" class="d-none d-lg-block float-left">
                    <div class="col-md-12 mt-3">
                 &nbsp;<a class="btn btn-sm btn-warning btn-contact">
                          <i class="fa fa-phone align-middle text-white"></i>
                       </a>
                       <span class="text-info span-contact" style="font-size:14px;">02100000000</span>
		          	    </div>
                    <div class="col-md-12 mt-3">
                &nbsp;<a class="btn btn-sm btn-warning">
                           <i class="fa fa-envelope-o align-middle text-white"></i>
                       </a>
                       <span class="text-info" style="font-size:14px;">info@sabanovin.com</span>
                    </div>    
                   </div>
                </div>
              </div>
           <div class="col mt-3">
                <nav class="navbar navbar-light navbar-expand-lg" style="background: #1e49ab;">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link text-white" href="#">متن <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">وبلاگ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">فروشگاه</a>
                    </li>
                  </ul>
          
                      &nbsp;<a class="btn btn-sm btn-warning">
                         <i class="fa fa-search text-white"></i>
                      </a>
                      &nbsp;<a href="{{route('login')}}" class="btn btn-sm btn-warning">
                         <i class="fa fa-user-o text-white"></i>
                      </a>
                      &nbsp;<a class="btn btn-sm btn-warning">
                        <i class="fa fa-shopping-cart align-middle text-white"></i>
                      </a>
                </div>
                </nav>
            </div>
            </br>
  

            <div class="col">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('img/slide1.jpg')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('img/slide2.jpg')}}" alt="Second slide">
                  </div>     
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
                            <a href="#" class="nav-link text-dark">
                                <i class="fa fa-circle text-warning font-size-icon"></i>
                                {{ $item->title }}
                                <small class="text-muted">22 فروردین 1398</small>
                            </a>
                        </div>
                      @endforeach
                   </div>
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
                      <img src="{{asset('img/img3.png')}}" class="card-img-top" alt="...">
                        <div class="card-footer card-footer-text">
                          <a href="#" class="text-decoration-none h5"><small class="text-white">عنوان محصول مورد نظر</small></a>
                        </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-1">
                  <div class="card">
                    <img src="{{asset('img/img2.png')}}" class="card-img-top" alt="...">
                      <div class="card-footer card-footer-text">
                        <a href="#" class="text-decoration-none h5"><small class="text-white">عنوان محصول مورد نظر</small></a>
                      </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-1">
                  <div class="card">
                    <img src="{{asset('img/img1.png')}}" class="card-img-top" alt="...">
                      <div class="card-footer card-footer-text">
                        <a href="#" class="text-decoration-none h5"><small class="text-white">عنوان محصول مورد نظر</small></a>
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
              <div class="home-title about-title m-0"><span class="text-muted">درباره ما بیشتر بدانید ...</span></div>
					        <p class="about-description my-20 text-muted text-justify">
						            	لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
					        </p>
				          <a style="background:#1e49ab" href="#" class="btn btn-primary about-button">اطلاعات بیشتر</a>
              </div>
              <div class="col-md-6 col-lg-5 col-xl-4 mt-5 ">
                <div class="testimonials owl-container p-20 bg-white position-relative">
							   	<div class="owl-carousel ng-isolate-scope owl-rtl owl-loaded owl-drag" options="{ autoplay: true, autoplayTimeout: 4500, autoplayHoverPause: true, smartSpeed: 500, loop:true, rtl: true, responsive:{ 0:{ items: 1 } } }">					
						    		<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(1232px, 0px, 0px); transition: all 0.5s ease 0s; width: 2156px;"><div class="owl-item cloned" style="width: 307.99px;"><div class="testimonials-item">
											<div class="d-flex align-items-center">
												<img src="{{asset('img/comment1.jpg')}}" alt="ونسان ونگوگ" class="testimonials-item-image m-3">
												<h2 class="testimonials-item-title m-0">ونسان ونگوگ</h2>	
											</div>
										  	<p class="testimonials-item-description m-3">اگر صدایی در درونت می&zwnj;گوید که نمی&zwnj;توانی نقاشی کنی، پس حتما این کار را بکن و می&zwnj;بینی که آن صدا خاموش خواهد شد.</p>
											
										</div>
                  </div>
                  <div class="owl-item cloned" style="width: 307.99px;"><div class="testimonials-item">
										<div class="d-flex align-items-center">
											<img src="{{asset('img/comment2.jpg')}}" alt="اسکار وایلد" class="testimonials-item-image m-3">
											<h2 class="testimonials-item-title m-0">اسکار وایلد</h2>		
										</div>
											<p class="testimonials-item-description m-3">هیچ هنرمند بزرگی وقایع اطراف خود را فقط به شکل چیزی که هستند نمی&zwnj;بیند. اگر اینطور بود اصلا هنرمند نمی&zwnj;شد.</p>
											
									</div>
                </div>
                  <div class="owl-item" style="width: 307.99px;"><div class="testimonials-item">
										<div class="d-flex align-items-center">
											<img src="{{asset('img/comment3.jpg')}}" alt="جورجیا اوکیف" class="testimonials-item-image m-3">
											<h2 class="testimonials-item-title m-0">جورجیا اوکیف</h2>		
										</div>
											<p class="testimonials-item-description m-3">موفق شدن یا نشدن بی معناست، چنین چیزی اصلا وجود ندارد. نکته مهم این است که ناشناخته های خود را به شناخته ها تبدیل کنید.</p>
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
     
      <div class="container-fluid bg-white p-5">
       <div class="container">
         <h2 class="home-title m-0">
					    <span>مشتریان و همکاران</span>
			    </h2>
          <h3 class="home-subtitle mt-half mb-0 mt-2">برخی از مشتریان و همکاران ما</h3>
              
            <div class="owl-costumer owl-carousel owl-theme col-md-12 row bg-white mt-5 justify-content-center">
                        <div class="item border border-warning m15">
                            
                              <img src="{{asset('img/owl1.jpg')}}" alt="" >
                            
                        </div>
                         <div class="item border border-warning m15">
                           
                              <img src="{{asset('img/owl2.jpg')}}" alt="">
                            
                        </div>
                         <div class="item border border-warning m15">
                           
                              <img src="{{asset('img/owl3.jpg')}}" alt="" >
                           
                        </div>
                         <div class="item border border-warning m15">
                            
                              <img src="{{asset('img/owl4.jpg')}}" alt="">
                            
                        </div>
                        <div class="item border border-warning m15">
                           
                              <img src="{{asset('img/owl4.jpg')}}" alt="" >
                            
                        </div>  
                         <div class="item border border-warning m15">
                            
                              <img src="{{asset('img/owl4.jpg')}}" alt="" >
                            
                        </div>  
                         <div class="item border border-warning m15">
                           
                              <img src="{{asset('img/owl4.jpg')}}" alt="" >
                            
                        </div>  
                         <div class="item border border-warning m15">
                            
                              <img src="{{asset('img/owl4.jpg')}}" alt="" >
                            
                        </div>  
             </div>
           
       </div>                  
      </div>

      <div class="container-fluid" style="background: #333;">
           <div class="container">
               <div class="row">
                   <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-5 mt-5">
                       <h3 class="footer-title">با ما همراه باشید</h3>
                       <div class="footer-contact">
								         	<div class="footer-contact-item my-half">
									        	<i class="fa fa-phone"></i>
									        	02100000000
									        	<span>از ۱۰ صبح تا ۸ شب</span>
								        	</div>
								         	<div class="footer-contact-item my-half">
								        		<i class="fa fa-envelope-o"></i>
									         	info@domain.ir
								        	</div>
								        	<div class="footer-contact-item my-half">
								          		<i class="fa fa-map-marker"></i>
									          	تهران، خیابان ساختگی، کوچه ساختگی، پلاک 000، واحد 00
								        	</div>
							        	</div>
                   </div>
                   <div class="col-sm-6 col-lg-2 mt-5">
                        <div class="footer-title">خدمات ما</div>
                          <div class="footer-menu mb-30">
									        	<a href="/blog" class=" footer-menu-link" target="_self">وبلاگ</a>
									         	<a href="/gallery" class=" footer-menu-link" target="_self">گالری تصاویر</a>
								          	<a href="/form" class=" footer-menu-link" target="_self">فرم دریافت اطلاعات</a>
									      	</div>
                   </div>
                   <div class="col-sm-6 col-lg-4 mt-5">
                        <div class="footer-title">مطالب وبلاگ</div>
                        <div class="footer-menu mb-5">
									        	<a href="/post" class="footer-menu-link">نوشته&zwnj;ی وبلاگی</a>
									        	<a href="/post-without-image" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون تصویر</a>
									        	<a href="/post-without-author" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون نویسنده</a>
									        	<a href="/post-without-comment" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون دیدگاه</a>
									        	<a href="/post-without-comment-and-commenting-disabled" class="footer-menu-link">نوشته&zwnj;ی وبلاگی بدون دیدگاه و امکان ارسال</a>
							        	</div>
                   </div>
                   <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mt5 mb-5">
                           <div class="footer-certificates d-flex align-items-center justify-content-center h-100">
                               <img src="{{asset('img/enamad.png')}}">
                               <img src="{{asset('img/samandehi.png')}}">
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
									       	<a class="footer-social-link telegram" href="https://telegram.me/username"><span class="fa fa-send"></span></a>
								      		<a class="footer-social-link instagram" href="https://instagram.com/username"><span class="fa fa-instagram"></span></a>
									      	<a class="footer-social-link linkedin" href="https://linkedin.com/username"><span class="fa fa-linkedin"></span></a>
									      	<a class="footer-social-link twitter" href="https://twitter.com/#!/username"><span class="fa fa-twitter"></span></a>
										      <a class="footer-social-link facebook" href="https://facebook.com/username"><span class="fa fa-facebook"></span></a>
									      	<a class="footer-social-link skype" href="skype_user"><span class="fa fa-skype"></span></a>
								      </div>
						        </div>
				        	</div>
			        	</div>
			  </div>    
    </div>


</body>
</html>
