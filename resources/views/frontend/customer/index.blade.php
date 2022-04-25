
@extends('layouts.front')


@section('title')
مشتریان
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
                                     <li class="breadcrumb-item active" aria-current="page">مشتریان </li>
                                 </ol>
                             </nav>
                        </div>
                      <h1 class="h3 form-horizontal-title">مشتریان {{ settings()->get('SITE_TITLE') }}</h1>
                      <hr>
                      <div class="col-md-12 row bg-white mt-5 justify-content-center">
                      @foreach ($items as $item)
                                <div class="item border border-warning rounded m15">

                                      <a href="{{ $item->link }}" target="_blank"><img class="p-2" width="150" height="150" src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" ></a>

                               </div>
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
