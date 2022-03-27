
@extends('layouts.app')
@section('title')
جزئیات خبر
@endsection

@section('content')

<div class="container">
        <hr>
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
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-dark" href="{{ route('admin.dashboard') }}">جزئیات خبر</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header">
                       <h1 class="h4">جزئیات خبر </h1>
                       <div class="float-left">
                           <a class="btn btn-primary" href="{{ route('admin.item') }}"> برگشت</a>
                       </div>
                   </div>
                   <div class="card-body">
                             <table class="table table-bordered table-condensed table-hover">
                            <tr>
                                <td>عنوان</td>
                                <td>{{ $item->title  }}</td>
                            </tr>
                            <tr>
                                <td> عنوان لاتین</td>
                                <td>{{ $item->slug  }}</td>
                            </tr>
                            <tr>
                                <td> متن خبر</td>
                                <td>{!! $item->description  !!}</td>
                            </tr>
                        </table>
       
                   </div>
                </div>
             </div>
         </div>
    </div>


@endsection
@section('js')

@endsection