@extends('layouts.front')


@section('content')

    <div class="container">
        <h1 class="h3 form-horizontal-title">ورود به سایت </h1>
        <hr>
        </br>
         <div class="row justify-content-center">
           <div class="col-md-8">
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-center label-form">موبایل</label>

                            <div class="col-md-6">
                                <input id="login" type="login" dir="ltr" class="form-control @error('login') is-invalid @enderror contact-form" name="login" value="{{ old('login') }}" required>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-center label-form">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror contact-form" name="password" required autocomplete="current-password">

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
                                    ورود به سایت
                                </button>
                            </div>
                        </div>
                    </form>
                    </br>
                    </br>
           </div>
         </div>
    </div>

@stop
