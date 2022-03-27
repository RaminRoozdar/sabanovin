@extends('layouts.app')
@section('title', 'مدیریت سیستم - ')

@section('content')
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('admin.sidebar')
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-dark" href="/">{{ config('platform.name') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-dark" href="{{ route('admin.dashboard') }}">مدیریت سیستم</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12 col-12">
                        <div class="row justify-content-center">
                              


                        </div>
                    </div>
                </div>
               
            
            </div>
        </div>
      </div>
@endsection
@section('js')


@endsection