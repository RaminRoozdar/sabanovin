
@extends('layouts.front')


@section('title')
    مطالب {{ config('platform.name') }}
@stop



@section('content')
   <div class="container-fluid">
       <div class="container-xl">
          <div class="row">
			  <div class="col-lg-8 col-md-12">
			      <div class="page-context blog-context blog-compact-context">
                        <div class="breadcrumb-container">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb bg-white font-size-breadcrumb">
                                     <li class="breadcrumb-item">
                                       <a class="text-dark" href="/">خانه</a>
                                     </li>
                                     <li class="breadcrumb-item active" aria-current="page">صفحه مطالب</li>
                                 </ol>
                             </nav>
                        </div>
                      <h1 class="h3 form-horizontal-title">صفحه مطالب</h1>
                      <hr>

                      @foreach ($articles as $article)
                        <article class="blog-post blog-compact-post" itemprop="blogPost" itemscope="" itemtype="http://schema.org/BlogPosting">

								<div class="blog-post-image blog-compact-post-image mr-3">
									<a href="{{ route('articleView',['id' => $article->id , 'slug' => $article->slug]) }}" class="blog-post-image-link blog-compact-post-image-link">
										<img src="/app/images/{{ $article->image }}" class="img-fluid center-block blog-post-image-element blog-compact-post-image-element" alt="نوشته&zwnj;ی وبلاگی" itemprop="image">
									</a>
								</div>

							<h2 class="blog-post-title blog-compact-post-title" itemprop="headline">
								<a href="{{ route('articleView',['id' => $article->id , 'slug' => $article->slug]) }}" class="blog-post-link blog-compact-post-link" title="{{ $article->title}}" itemprop="url mainEntityOfPage">
									{{ $article->title}}
								</a>
							</h2>
							<div class="blog-post-excerpt blog-compact-post-excerpt break-word text-justify" itemprop="description">

                                {!! $article->article_excerpt !!}
							</div>
							<div class="blog-post-meta blog-compact-post-meta">
								<span class="blog-post-date blog-compact-post-date text-muted">
									<meta itemprop="datePublished dateModified" content="2019-05-12">
									<i class="fa fa-fw fa-calendar"></i>
									{{ \Morilog\Jalali\Jalalian::forge($article->created_at)->format('j %B Y')  }}

								</span>

									<span class="blog-post-author blog-compact-post-author text-muted" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
										<i class="fa fa-fw fa-user-circle"></i>
										<a href="/site/posts?author=153922036" class="blog-post-author-link blog-compact-post-author-link" itemprop="url">
											<span itemprop="name">
												{{ $article->user->name }}
											</span>
										</a>

									</span>


									<span class="blog-post-categories blog-compact-post-categories text-muted">
										<i class="fa fa-fw fa-sitemap"></i>
											<a href="/blog/full" class="blog-post-category blog-compact-post-category" title="وبلاگ با محتوای کامل">
												{{ $article->category->title}}
											</a>

									</span>

							</div>

							<div class="clearfix"></div>
							<hr class="page-separator blog-separator blog-compact-post-separator">
					    </article>
                      @endforeach

                      {{ $articles->links() }}
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
			                   	    <i class="sidebar-fa fa fa-fw fa-sitemap"></i>
			                    	دسته بندی
			                    </h6>
		                   </div>
		                   <div class="card-body row">
				               @foreach ($categories as $category)
                                   <a class="btn btn-sm btn-light ml-1" href="#">{{ $category->title }}</a>
                               @endforeach
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


