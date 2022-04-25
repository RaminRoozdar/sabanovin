
@extends('layouts.front')


@section('title')
نظرات مشتریان
@stop



@section('content')
   <div class="container-fluid">
       <div class="container-xl">
          <div class="row justify-content-center">
			  <div class="col-md-10">
			      <div class="page-context blog-context blog-compact-context">
                        <div class="breadcrumb-container">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb bg-white font-size-breadcrumb">
                                     <li class="breadcrumb-item">
                                       <a class="text-dark" href="/">خانه</a>
                                     </li>
                                     <li class="breadcrumb-item active" aria-current="page">نظرات مشتریان </li>
                                 </ol>
                             </nav>
                        </div>
                      <h1 class="h3 form-horizontal-title">نظرات مشتریان {{ settings()->get('SITE_TITLE') }}</h1>
                      <hr>
                      @foreach ($items as $item)
                      <div class="col-md-12 row bg-white mt-3 justify-content-center">
                        <div class="col-md-4">
                            <img width="100" height="100" src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}">
                        </div>

                        <div class="col-md-8">

                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->comment }}</p>

                        </div>
                      </div>
                      <hr>
                      @endforeach
                      </div>

                      {!! $items->links() !!}
                  </div>
              </div>

           </div
       </div>
    </div>
   </div>
@stop
@section('js')



@stop
