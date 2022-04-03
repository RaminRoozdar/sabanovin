@extends('layouts.front')


@section('content')

    <div class="container">
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                    <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">فرم محاسبه اقساط</li>
                </ol>
            </nav>
        </div>

        <h1 class="h2 form-horizontal-title">فرم محاسبه اقساط</h1>
        <hr>
         <div class="row justify-content-center">
           <div class="col-md-8">
                <form method="POST" action="#">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                               <label for="cash_price" class="col-md-4 col-form-label label-form"> قیمت نقدی دستگاه </label>
                               <div class="col-md-7">
                                    <input id="cash_price" type="text"dir="ltr" class="price form-control{{ $errors->has('cash_price') ? ' is-invalid' : '' }} contact-form" name="cash_price" value="{{ old('cash_price') }}" required>
                                        @if ($errors->has('cash_price'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cash_price') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="prepayment" class="col-md-4 col-form-label label-form">  پیش پرداخت  </label>
                               <div class="col-md-7">
                                    <input id="prepayment" type="text" dir="ltr" class="price1 form-control{{ $errors->has('prepayment') ? ' is-invalid' : '' }} contact-form" name="prepayment" value="{{ old('prepayment') }}" required>
                                        @if ($errors->has('prepayment'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('prepayment') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="count" class="col-md-4 col-form-label label-form">  تعداد اقساط  </label>
                                <div class="col-md-7">
                                    <select class="form-control contact-form" name="count">
                                        <option value="2">دو ماهه</option>
                                        <option value="4">چهار ماهه</option>
                                     </select>
                                         @if ($errors->has('count'))
                                             <span class="invalid-feedback">
                                             <strong>{{ $errors->first('count') }}</strong>
                                             </span>
                                         @endif
                                 </div>
                             </div>
                            <hr>
                            <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-mobile p-2">
                                محاسبه اقساط
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
