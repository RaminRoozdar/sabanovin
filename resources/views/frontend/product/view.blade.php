
@extends('layouts.front')


@section('title')
محصول {{ $product->title }}
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
                                     <li class="breadcrumb-item">
                                        <a class="text-dark" href="{{ route('shop') }}">فروشگاه</a>
                                      </li>
                                     <li class="breadcrumb-item active" aria-current="page">محصول {{ $product->title }} </li>
                                 </ol>
                             </nav>
                             <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-info btn-sm m-2" data-toggle="dropdown">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> سبد خرید <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="row total-header-section">
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['amount'] * $details['quantity'] @endphp
                                            @endforeach
                                            <div class="col-md-6 total-section text-left">
                                                <p>جمع: <span class="text-info">T {{ $total }}</span></p>
                                            </div>

                                            <div class="col-md-6 text-right">
                                                 <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img width="85px" height="85px" src="{{ Storage::url($details['image'])}}" />
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <p>{{ $details['title'] }}</p>
                                                        <span class="count"> تعداد:{{ $details['quantity'] }}</span>
                                                        <p class="price text-info"> {{ $details['amount'] }}  تومان </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">مشاهده همه</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <hr>
                      <div class="col-md-12 row bg-white mt-5 justify-content-center">
                          <div class="col-md-6">
                            <img height="250" class="card-img-top mb-2" src="{{ Storage::url($product['image'])}}" alt="image">
                          </div>
                          <div class="col-md-6">
                            <h1 class="h4 form-horizontal-title">محصول {{ $product->title }}</h1>

                            <hr>
                            <span>
                                قیمت محصول:
                                <strong>{{number_format($product->amount)}}</strong> تومان
                            </span>
                            <hr>
                            <a href="{{ route('addToCart', $product->id) }}" class="btn btn-mobile btn-warning btn-lg btn-block"><i class="fa fa-cart-plus"></i> خرید</a>

                          </div>

                          <div class="col-md-12 mt-2">
                            <div class="card card-default">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="file-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="text" data-toggle="tab" href="#file-text" role="tab" aria-controls="text" aria-selected="true">توضیحات</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="file-tabsContent">
                                        <div class="tab-pane fade show active" id="file-text" role="tabpanel" aria-labelledby="file-tab">{!! $product->description  !!}</div>
                                        <div class="tab-pane fade" id="file-versions" role="tabpanel" aria-labelledby="versions-tab">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          </div>
                          <div class="col-md-12 mt-3">
                              <hr>
                            <h3 class="h6 card-title">دیگر محصولات</h3>
                            <div class="owl-costumer owl-carousel owl-theme col-md-12 row bg-white mt-5 justify-content-center">

                                @foreach ($products as $product)
                                       <div class="item border border-warning rounded m15">

                                             <a href="{{ route('product.view',['id'=>$product->id]) }}"><img class="p-2" width="100" height="150" src="{{ Storage::url($product['image'])}}" alt="{{ $product->title }}" ></a>

                                      </div>
                                @endforeach
                            </div>
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
