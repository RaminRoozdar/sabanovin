
@extends('layouts.app')

@section('title')
ویرایش مطلب
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
                                <li class="breadcrumb-item"><a class="text-dark" href="{{ route('admin.article') }}">مطالب</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-info" href="#">ویرایش مطلب </a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header">
                       <h1 class="h4">ویرایش مطلب </h1>
                   </div>
                   <div class="card-body">
                        <form method="POST" action="{{route('admin.article.update',['id'=>$item->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                               <label for="title" class="col-md-4 col-form-label label-form">عنوان مطلب</label>
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
                               <label for="slug" class="col-md-4 col-form-label label-form">عنوان لاتین</label>
                               <div class="col-md-12">
                                    <input id="slug" type="text" dir="ltr" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }} contact-form" name="slug" value="{{ old('slug',$item->slug) }}" >
                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="description" class="col-md-4 col-form-label label-form">توضیح کوتاه</label>
                               <div class="col-md-12" dir="rtl">
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description">{{ old('description',$item->description) }}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="text" class="col-md-4 col-form-label label-form">محتوای مطلب</label>
                               <div class="col-md-12" dir="rtl">
                                    <textarea id="full-featured-non-premium" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text">{{ old('text',$item->text) }}</textarea>

                                        @if ($errors->has('text'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                             <div class="form-group row">
                               <label for="category_id" class="col-md-4 col-form-label label-form">گروه</label>
                               <div class="col-md-12">
                                   <select class="select2 form-control" name="category_id" id="category">
                                       @foreach($categories as $category)
                                        <option value="{{ $category->id }}"{{ old('category_id', $item->category_id) == $category->id  ? ' selected' : '' }}>{{$category->title}}</option>
                                       @endforeach
                                   </select>
                                </div>
                            </div>
                             <div class="form-group row">
                               <label for="comment_status" class="col-md-4 col-form-label label-form"> دیدگاه برای مطلب </label>
                               <div class="col-md-12">
                                   <select name="comment_status" id="comment_status" class="custom-select form-control{{ $errors->has('comment_status') ? ' is-invalid' : '' }}">
                                        <option value="1"{{old('comment_status', $item->comment_status) == '1' ? ' selected' : ''}}>روشن </option>
                                        <option value="2"{{old('comment_status' , $item->comment_status) == '2' ? ' selected' : ''}}>خاموش</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group row">
                               <label for="type" class="col-md-4 col-form-label label-form">کلمات کلیدی</label>
                               <div class="col-md-12">
                                  <select class="form-control postTag" multiple name="postTags[]" id="postTags">
                                   @foreach($allTags as $tag)
                                            <option value="{{ $tag->id }}"
                                                    {{ in_array($tag->id , $postTags)?'selected':''}}
                                            >{{ $tag->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-mobile p-2">
                                ثبت خبر
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
<script src="https://cdn.tiny.cloud/1/8osgbipvk7fz28bszcjpwtnjjj2iepb33l5miotgjhpgao0t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('js/tiny.js') }}"></script>
@endsection
