@extends('layouts.app')
@section('title', 'مشخصات کاربری - ')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="/">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item"><a class="text-dark" href="{{ route('dashboard') }}"> داشبورد </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a class="text-info" href="#">پروفایل من</a></li>
                    </ol>
                </nav>

        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">مشخصات کاربری</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.store') }}">
                        @csrf
                        @method('post')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label @lang('platform.input-pull')">نام و نام خانوادگی</label>

                            <div class="col-md-7">
                                <input id="name" readonly type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name',Auth::user()->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label @lang('platform.input-pull')">شماره همراه</label>

                            <div class="col-md-7">
                                <input id="mobile" readonly type="text" dir="ltr" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile',Auth::user()->mobile) }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label @lang('platform.input-pull')">آدرس ایمیل</label>

                            <div class="col-md-7">
                                <input id="email" type="email" dir="ltr" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',Auth::user()->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label @lang('platform.input-pull')">کد پستی</label>

                            <div class="col-md-7">
                                <input id="zip_code" type="text" dir="ltr" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ old('zip_code', Auth::user()->zip_code) }}" required>

                                @if ($errors->has('zip_code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province_id" class="col-md-4 col-form-label @lang('platform.input-pull')">استان</label>

                            <div class="col-md-7">
                                <select onchange="selectProvince(this.value);" class="select2 form-control{{ $errors->has('province_id') ? ' is-invalid' : '' }}" name="province_id" required>
                                @foreach($provinces as $province)
                                        <option value="{{ $province->id }}"{{ old('province_id', Auth::user()->province_id) == $province->id ? ' selected' :'' }}>{{ $province->name }}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('province_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('province_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city_id" class="col-md-4 col-form-label @lang('platform.input-pull')">شهر</label>

                            <div class="col-md-7">
                                <select id="city_id" class="select2 form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id" required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}"{{ old('city_id', Auth::user()->city_id) == $city->id ? ' selected' :'' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label @lang('platform.input-pull')">آدرس</label>

                            <div class="col-md-7">
                                <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="" required>{{ old('address', Auth::user()->address) }}</textarea>
                                <div class="alert alert-warning"><small>به عنوان مثال : </small> <small class="text-muted">خیابان قشقایی -کوچه امام رضا - پلاک1</small> </div>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    تکمیل اطلاعات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function selectProvince(province_id) {
            axios.post('{{ route('cities') }}',{'province_id':province_id}).then(function (response) {
                $('#city_id').html('');
                for (var i = 0, len = response.data.length; i < len; i++) {
                    var city = new Option(response.data[i].name, response.data[i].id, false, false);
                    $('#city_id').append(city).trigger('change');
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection
