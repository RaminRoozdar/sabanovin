
@extends('layouts.front')


@section('title')
    صفحه {{ $page->title }}
@stop



@section('content')
   <div class="container-fluid">
       <div class="container-xl">
          <div class="row justify-content-center">
			  <div class="col-lg-10 col-md-12">
			      <div class="page-context blog-context blog-compact-context">
                        <div class="breadcrumb-container">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb bg-white font-size-breadcrumb">
                                     <li class="breadcrumb-item">
                                       <a class="text-dark" href="/">خانه</a>
                                     </li>
                                     <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                                 </ol>
                             </nav>
                        </div>
                      <h1 class="h3 form-horizontal-title">صفحه {{ $page->title }}</h1>
                      <hr>

                      <small class="text-muted">{{ $page->description }}</small>



                      <p class="mt-4">
                        {!! $page->text !!}
                      </p>

                  </div>
              </div>

           </div
       </div>
    </div>
   </div>
@stop
@section('js')



@stop
