
@extends('layouts.app')
@section('title')ویرایش محصول

@endsection

@section('head')

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
                    <h1 class="h4">ویرایش محصول </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.product.update',['id' => $product->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group row">
                           <label for="title" class="col-md-4 col-form-label label-form">عنوان محصول</label>
                           <div class="col-md-12">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} contact-form" name="title" value="{{ old('title',$product->title) }}">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row">
                           <label for="image" class="col-md-4 col-form-label label-form"> تصویر محصول</label>
                           <div class="col-md-12">
                                <input id="image" type="file" dir="ltr" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }} contact-form" name="image" value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="count" class="col-md-4 col-form-label label-form">موجودی محصول</label>
                            <div class="col-md-12">
                                 <input id="count" type="number" class="form-control{{ $errors->has('count') ? ' is-invalid' : '' }} contact-form" name="count" value="{{ old('count',$product->count) }}">
                                     @if ($errors->has('count'))
                                         <span class="invalid-feedback">
                                         <strong>{{ $errors->first('count') }}</strong>
                                         </span>
                                     @endif
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label label-form">قیمت محصول</label>
                            <div class="col-md-12">
                                <div class="input-group mb-2 ml-sm-2">
                                    <input id="amount" type="text" dir="ltr" class="price form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount',$product->amount) }}" required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">تومان</div>
                                    </div>
                                </div>
                                     @if ($errors->has('amount'))
                                         <span class="invalid-feedback">
                                         <strong>{{ $errors->first('amount') }}</strong>
                                         </span>
                                     @endif
                             </div>
                         </div>
                        <div class="form-group row">
                           <label for="description" class="col-md-4 col-form-label label-form">توضیحات محصول</label>
                           <div class="col-md-12" dir="rtl">
                                <textarea id="mytextarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description',$product->description) }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label label-form"> برچسب ها</label>
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
                            <div class="form-group row">
                               <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-mobile p-2">
                                ویرایش محصول
                                </button>
                               </div>
                            </div>

                    </form>
               </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="https://cdn.tiny.cloud/1/8osgbipvk7fz28bszcjpwtnjjj2iepb33l5miotgjhpgao0t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: '#mytextarea',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'raminroozdar',
        directionality : "rtl",
        language_url : '/languages/fa.js'
      });
</script>

@endsection
