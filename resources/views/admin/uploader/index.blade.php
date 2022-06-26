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
                                <li class="breadcrumb-item"><a class="text-dark" href="{{ route('admin.dashboard') }}">مدیریت سیستم</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-dark" href="{{ route('admin.uploader') }}">آپلود سنتر</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        آپلود سنتر
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-12">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 col-md-6 col-6">
                                        <a class="mb-1 btn btn-primary btn-block" href="{{ route('admin.uploader.image') }}" ><i class="fa fa-upload"></i>   آپلود تصاویر  </a>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-6">
                                        <a class="mb-1 btn btn-warning btn-block" href="{{ route('admin.uploader.file') }}" ><i class="fa fa-upload"></i>   آپلود فایل  </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
      </div>
@endsection
@section('js')


@endsection
