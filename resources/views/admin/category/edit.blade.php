
@extends('layouts.app')


@section('title')
     
          ویرایش دسته 

@stop

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
                                <li class="breadcrumb-item"><a class="text-dark" href="{{ route('admin.category') }}">مدیریت دسته ها</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-info" href="#">ویرایش دسته </a></li>
                            </ol>
                        </nav>
                    </div>
            </div>
                <div class="card">
                   <div class="card-header">
                       <h1 class="h4">ایجاد دسته جدید</h1>
                   </div>
                   <div class="card-body">
                        <form method="POST" action="{{route('admin.category.update',['id'=>$item->id])}}">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                               <label for="title" class="col-md-4 col-form-label label-form">عنوان</label>
                               <div class="col-md-12">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} contact-form" name="title" value="{{ old('title',$item->title) }}" required>
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
                                    <input id="slug" type="text" dir="ltr" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }} contact-form" name="slug" value="{{ old('slug',$item->slug) }}">
                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="link" class="col-md-4 col-form-label label-form"> لینک -- اختیاری</label>
                               <div class="col-md-12">
                                    <input id="link" type="url" dir="ltr" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }} contact-form" name="link" value="{{ old('link',$item->link) }}">
                                        @if ($errors->has('link'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            @if ($item->category_id != 0)
                            <div class="form-group row">
                               <label for="category_id" class="col-md-4 col-form-label label-form">زیر مجموعه</label>
                               <div class="col-md-12">
                                   <select class="select2 form-control" name="category_id">
                                   @foreach ($categories as $category)
                                         <option value="{{$category->id}}"{{ (old('category_id',$item->category_id) == $category->id)? ' selected' : '' }}>{{$category->title}} </option>
                                   @endforeach
                                   </select> 
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="status" class="col-md-4 col-form-label label-form">وضعیت</label>
                               <div class="col-md-12">
                                   <select class="select2 form-control" name="status">
                                    <option value="1"{{old('status', $item->status) == '1' ? ' selected' : ''}}>فعال</option>
                                    <option value="0"{{old('status', $item->status) == '0' ? ' selected' : ''}}>غیرفعال</option>
                                   </select>  
                                   @if ($errors->has('status'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('status') }}</strong>
                                     </span>
                                   @endif
                                </div>
                            </div>
                            @endif
                             <div class="form-group row">
                               <label for="type" class="col-md-4 col-form-label label-form">نوع دسته</label>
                               <div class="col-md-12">
                                   <select class="select2 form-control" name="type">
                                    <option value="1"{{old('type', $item->type) == '1' ? ' selected' : ''}}>منو</option>
                                    <option value="2"{{old('type', $item->type) == '2' ? ' selected' : ''}}>وبلاگ</option>
                                    <option value="3"{{old('type', $item->type) == '3' ? ' selected' : ''}}>فروشگاه</option>
                                    <option value="4"{{old('type', $item->type) == '4' ? ' selected' : ''}}>رزومه</option>
                                   </select>  
                                   @if ($errors->has('type'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('type') }}</strong>
                                     </span>
                                   @endif
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-mobile p-2">
                                ثبت دسته
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