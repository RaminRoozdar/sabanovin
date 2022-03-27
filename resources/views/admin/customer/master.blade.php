@extends('layouts.app')

@section('title')
 مشتریان
@endsection

@section('content')

<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">
          <div class="card">
              <div class="card-header">
                  بخش مشتریان
              </div>
              <div class="card-boady p-3">
                <a href="{{ route('admin.customer.index') }}" class="btn btn-outline-danger btn-lg btn-block">معرفی مشتریان</a>
                <a href="{{ route('admin.feedback.index') }}" class="btn btn-outline-warning btn-lg btn-block">نظرات مشتریان</a>
                <a href="{{ route('admin.slider.index') }}" class="btn btn-outline-dark btn-lg btn-block">اسلایدر اصلی</a>
              </div>

          </div>
        </div>
   </div>
</div>



@stop
