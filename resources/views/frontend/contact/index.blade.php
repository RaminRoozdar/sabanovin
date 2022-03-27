@extends('layouts.front')


@section('content')

    <div class="container">
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                    <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">فرم تماس با ما</li>
                </ol>
            </nav>
        </div>

        <h1 class="h2 form-horizontal-title">فرم تماس با ما</h1>
        <hr>
         <div class="row justify-content-center">
           <div class="col-md-8">
                <form method="POST" action="#">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                               <label for="name" class="col-md-4 col-form-label label-form">نام و نام خانوادگی</label>
                               <div class="col-md-7">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} contact-form" name="name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="mobile" class="col-md-4 col-form-label label-form">شماره موبایل</label>
                               <div class="col-md-7">
                                    <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }} contact-form" name="mobile" value="{{ old('mobile') }}" required>
                                        @if ($errors->has('mobile'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="email" class="col-md-4 col-form-label label-form">آدرس ایمیل</label>
                               <div class="col-md-7">
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} contact-form" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="description" class="col-md-4 col-form-label label-form">موضوع پیام</label>
                               <div class="col-md-7">
                                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} contact-form" name="description" value="{{ old('description') }}" required>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="text" class="col-md-4 col-form-label label-form">موضوع پیام</label>
                               <div class="col-md-7">
                                    <textarea class="form-control contact-form" name="text" value="{{ old('text') }}" ></textarea>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-mobile p-2">
                                   ارسال پیام
                                </button>
                               </div>
                            </div>
                            </br>
                            </br>
                </form>
             </div>
         </div>
    </div>

@stop
