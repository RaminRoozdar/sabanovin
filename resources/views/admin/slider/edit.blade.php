
@extends('layouts.app')
@section('title')
ویرایش اسلایدر
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
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-info" href="#">ویرایش اسلایدر </a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header">
                       <h1 class="h4">ویرایش اسلایدر </h1>
                   </div>
                   <div class="card-body">
                        <form method="POST" action="{{route('admin.slider.update',['id' => $item->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                               <label for="title" class="col-md-4 col-form-label label-form">  عنوان اسلایدر </label>
                               <div class="col-md-12">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} contact-form" name="title" value="{{ old('title',$item->title) }}">
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="link" class="col-md-4 col-form-label label-form"> لینک</label>
                               <div class="col-md-12">
                                <input id="link" type="text" dir="ltr" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }} contact-form" name="link" value="{{ old('link',$item->link) }}" >
                                @if ($errors->has('link'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="image" class="col-md-4 col-form-label label-form"> تصویر اسلایدر</label>
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
                                ویرایش اسلایدر
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
