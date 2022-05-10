@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">داشبورد من</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-6 col-6">
                            <a class="mb-1 btn btn-primary btn-block" href="{{ route('cart') }}" ><i class="fa fa-shopping-cart"></i>   سبد خرید من  </a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-6">
                            <a class="mb-1 btn btn-warning btn-block" href="{{ route('user.invoice') }}" ><i class="fa fa-newspaper-o"></i>   فاکتور های من  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
