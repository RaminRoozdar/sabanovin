
@extends('layouts.front')


@section('title')
    خبر {{ $item->title }}
@stop



@section('content')
   <div class="container-fluid">
       <div class="container-xl">
          <div class="row">
			  <div class="col-lg-8 col-md-12">
			      <div class="page-context blog-context blog-compact-context">
                        {{--  <div class="breadcrumb-container">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb bg-white font-size-breadcrumb">
                                     <li class="breadcrumb-item">
                                       <a class="text-dark" href="/">خانه</a>
                                     </li>
                                     <li class="breadcrumb-item">
                                        <a class="text-dark" href="{{ route('articles') }}">ویلاگ</a>
                                      </li>
                                     <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                                 </ol>
                             </nav>
                        </div>
                      <h1 class="h3 form-horizontal-title">مطلب {{ $article->title }}</h1>
                      <hr>  --}}

                      <img class="w-100" height="300" src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
                      <h1 class="mt-4 h3 form-horizontal-title">خبر {{ $item->title }}</h1>


                      <p class="mt-4">
                        {!! $item->description !!}
                      </p>

                  </div>
              </div>
              <div class="col-lg-4 col-md-12">
				  <div class="blog-sidebar blog-compact-sidebar">
	                  <div class="card blog-sidebar-about">
                           <div class="card-header bg-transparent border-bottom border-warning">
			                	<h6 class="card-title blog-sidebar-about-title">
				            	<i class="sidebar-fa fa fa-fw fa-info-circle"></i>
				            	درباره نویسنده
				                </h6>

			               </div>
                           <div class="card-body">
			                   <div class="blog-sidebar-about-description break-word">
				                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
		                       </div>

				               <a href="#" class="btn btn-white blog-sidebar-about-permalink">
				            	اطلاعات بیش تر
			                   </a>
			               </div>



                      </div>


                      <div class="card mt-5">
	                    	<div class="card-header bg-transparent border-bottom border-warning">
		                      	<h6 class="card-title blog-sidebar-categories-title">
			                   	    <i class="sidebar-fa fa fa-fw fa-search"></i>
			                    	جستجو
			                    </h6>
		                   </div>
		                   <div class="card-body row">
				               <p class="blog-sidebar-about-description break-word px-2">برای جستجو در نوشته‌های وب‌سایت، کلمه‌ی کلیدی مورد نظر خود را بنویسید و بر روی دکمه کلیک کنید. </p>

                              <div class="input-group mb-3 px-2">
                                  <input type="text" class="form-control rounded-0" placeholder="" aria-label="" aria-describedby="basic-addon1">

                                  <div class="input-group-prepend">
                                      <button class="btn btn-secondary btn-sm rounded-0" type="button">جستجو</button>
                                  </div>
                              </div>
		                  </div>
                      </div>
                      <div class="card mt-5">
	                    	<div class="card-header bg-transparent border-bottom border-warning">
		                      	<h6 class="card-title blog-sidebar-categories-title">
			                   	    <i class="sidebar-fa fa fa-fw fa-user-plus"></i>
			                    	عضویت در خبرنامه
			                    </h6>
		                   </div>
		                   <div class="card-body row">
				               <p class="blog-sidebar-about-description break-word px-2"> عضو خبرنامه ماهانه وب‌سایت شوید و تازه‌ترین نوشته‌ها را در پست الکترونیک خود دریافت کنید. </p>

                              <div class="input-group mb-3 px-2">
                                  <input type="text" class="form-control rounded-0" placeholder="پست الکترونیک" aria-label="" aria-describedby="basic-addon1">

                                  <div class="input-group-prepend">
                                      <button class="btn btn-secondary btn-sm rounded-0" type="button">عضویت</button>
                                  </div>
                              </div>
		                  </div>
                      </div>
                      <div class="card mt-5 mb-5">
	                    	<div class="card-header bg-transparent border-bottom border-warning">
		                      	<h6 class="card-title blog-sidebar-categories-title">
			                   	    <i class="sidebar-fa fa fa-fw fa-sitemap"></i>
			                    	 برچسب ها
			                    </h6>
		                   </div>
		                   <div class="card-body row">
                                 @foreach ($tags as $tag)
                                      <a class="btn btn-sm btn-light ml-1" href="#">{{$tag->name}}</a>
                                 @endforeach
		                  </div>
                      </div>
                  </div>
              </div>
           </div
       </div>
    </div>
   </div>
@stop
@section('js')



@stop
