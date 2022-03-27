
@extends('layouts.app')
@section('title')
جزئیات مطلب
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
                           <a class="btn btn-primary" href="{{ route('admin.article') }}"> برگشت</a>
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
                                <td> گروه</td>
                                <td>{{ $item->category->title  }}</td>
                            </tr>
                             <tr>
                                <td> ایجاد کننده</td>
                                <td>{{ $item->user->name  }}</td>
                            </tr>
                            <tr>
                                <td> توضیح کوتاه</td>
                                <td>{{ $item->description  }}</td>
                            </tr>
                            <tr>
                                <td> متن </td>
                                <td>{!! $item->text  !!}</td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="col-md-4">
		                         <strong>تصویر مطلب :</strong>
	                        	 <br/>

	                        </div>
                            <div class="col-md-8">
                               <img class="w-100"  src="/app/images/{{ $item->image }}" />
                            </div>

                        </div>
                        <div class="col-md-12 mt-2">
                             <div id="accordion">
                                    <div class="card card-info mb-2">
                                        <div class="card-header" data-toggle="collapse" href="#collapseOne"><i class="fa fa-image"></i>  ویرایش تصویر </div>

                                        <div class="card-body collapse" id="collapseOne" data-parent="#accordion">
                                            <form method="POST" action="{{route('admin.article.updateImage',['id' => $item->id])}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <div class="col-md-12">
                                                   <input id="image" type="file" dir="ltr" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }} contact-form" name="image" value="{{ old('image') }}">
                                                     @if ($errors->has('image'))
                                                    <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                    @endif
                                               </div>
                                                <button type="submit" class="btn btn-primary btn-mobile btn-sm mt-2"><i class="fa fa-send"></i> ویرایش</button>
                                            </form>
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
