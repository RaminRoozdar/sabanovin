
@extends('layouts.app')
@section('title')
ایجاد بازخورد
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
                                <li class="breadcrumb-item"><a class="text-dark" href="{{ route('admin.article') }}">مشتریان</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-info" href="#">ایجاد بازخورد جدید</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header">
                       <h1 class="h4">ایجاد بازخورد جدید</h1>
                   </div>
                   <div class="card-body">
                        <form method="POST" action="{{route('admin.feedback.store')}}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                               <label for="name" class="col-md-4 col-form-label label-form"> نام مشتری </label>
                               <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} contact-form" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="comment" class="col-md-4 col-form-label label-form"> بازخورد</label>
                               <div class="col-md-12">
                                   <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" >{{ old('comment') }}</textarea>
                                        @if ($errors->has('comment'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="image" class="col-md-4 col-form-label label-form"> تصویر مشتری</label>
                               <div class="col-md-12">
                                    <input id="image" type="file" dir="ltr" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }} contact-form" name="image" value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>





                            <hr>
                            <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-mobile p-2">
                                ثبت مشتری
                                </button>
                               </div>
                            </div>
                            </br>
                            </br>
                </form>
                   </div>
                </div>
             </div>
         </div>
    </div>


@endsection
@section('js')

@endsection
