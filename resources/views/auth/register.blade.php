@extends('layouts.front')
@section('title')
ورود به سامانه
@endsection
@section('content')

<div class="container">
    <h1 class="h3 form-horizontal-title"> عضویت در سایت </h1>
    <hr>
    </br>
     <div class="row justify-content-center">
       <div class="col-md-8">
            <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-center label-form">نام و نام خانوادگی</label>

                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror contact-form" name="name" value="{{ old('name') }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-center label-form"> موبایل </label>

                        <div class="col-md-6">
                            <input id="mobile" type="mobile" dir="ltr" class="form-control @error('mobile') is-invalid @enderror contact-form" name="mobile" required>

                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-center label-form">رمز عبور</label>

                        <div class="col-md-6">
                            <input id="password" dir="ltr" type="password" class="form-control @error('password') is-invalid @enderror contact-form" name="password" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                عضویت در سایت
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-dark">ورود به سایت</a>
                        </div>
                    </div>
                </form>
                </br>
                </br>
       </div>
     </div>
</div>


@endsection
