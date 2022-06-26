@extends('layouts.front')


@section('content')

    <div class="container">
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                    <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">فرم تماس با ما</li>
                </ol>
            </nav>
        </div>
        <div class="row mb-2">

            <div class="col-md-12">

            </div>
        </div>

        <div class="row justify-content-center mb-2">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        وضعیت پرداخت
                    </div>

                    <div class="card-body">
                        @if(isset($isOk))
                        <div class="alert-success alert">
                            {{ $msg }}
                            <br />
                            کد پیگیری پرداخت :  {{ $trackingCode }}
                            <br />
                            {{--  <a class="nav-link" href="{{ route('order.tracking') }}">لینک پیگیری سفارش</a>  --}}

                        </div>
                        <br />   <br />   <br />   <br />   <br />   <br />
                    @else
                        <div class="alert-danger alert">

                            {{ $msg }}
                            <br>
                        </div>
                        <br />   <br />   <br />   <br />   <br />   <br />
                    @endif
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard') }}"> رفتن به پنل کاربری </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')

@endsection
