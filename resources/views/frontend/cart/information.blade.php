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
        <div class="row mb-2">

            <div class="col-md-12">

            </div>
        </div>

        <div class="row justify-content-center mb-2">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                اطلاعات تکمیلی
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-info pull-left" href="{{ route('cart') }}">سبد خرید من </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" id="information" action="{{ route('store.information') }}">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label @lang('platform.input-pull')">نام و نام خانوادگی</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name',Auth::user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label @lang('platform.input-pull')">شماره تماس</label>

                                <div class="col-md-7">
                                    <input id="mobile" readonly type="text" dir="ltr" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile', Auth::user()->mobile) }}" required>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mobile') }}</strong>
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
                                <label for="address" class="col-md-4 col-form-label @lang('platform.input-pull')">آدرس پستی</label>

                                <div class="col-md-7">
                                    <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="" required>{{ old('address', Auth::user()->address) }}</textarea>

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
                                        ثبت اطلاعات و پرداخت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
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
