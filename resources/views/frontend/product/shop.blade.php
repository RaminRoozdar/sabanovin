
@extends('layouts.front')


@section('title')
 فروشگاه {{ settings()->get('SITE_TITLE') }}
@stop



@section('content')
   <div class="container-fluid">
       <div class="container">
         <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">فروشگاه</li>
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
                            <div class="col-md-8 total-section text-left">
                                <p>جمع: <span class="text-info">  {{ number_format($total) }} تومان</span></p>
                            </div>

                            <div class="col-md-4 text-right">
                                 <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                        </div>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img width="85px" height="85px" src="/app/images/product/{{ $details['image'] }}" />
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
       </div>
       <div class="container">
            <div class="row justify-content-center">
                @foreach($products as $product)
                <div class="card mb-3 m-1" style="width: 18rem;">
                    <img height="150" class="card-img-top"  src="/app/images/product/{{ $product->image }}" alt="Card image cap">
                    <div class="card-body p-1 pt-2">
                      <h1 class="h5 card-title"><a class="nav-link p-0" href="{{ route('product.view',['id'=>$product->id]) }}">{{$product->title}}</a></h1>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item text-muted">موجودی : {{ $product->count }}</li>
                      <li class="list-group-item text-warning">قیمت : {{number_format($product->amount)}}</li>
                    </ul>
                    <div class="card-body">
                      @if($product->count <= 0)
                          <a href="#" class="btn btn-block btn-sm btn-light text-danger">موجود نمی باشد</a>
                        @else
                          <a href="{{ route('addToCart', $product->id) }}" class="btn btn-block btn-sm btn-warning"><i class="fa fa-cart-plus"></i> خرید</a>
                      @endif
                      <a href="{{ route('product.view',['id'=>$product->id]) }}" class="btn btn-block btn-sm btn-danger"><i class="fa fa-eye"></i> مشاهده</a>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            {!! $products->links() !!}
       </div>
   </div>

@stop
@section('js')



@stop
