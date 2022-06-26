@extends('layouts.front')

@section('title')
lbs
@endsection
@section('css')
<link href="{{ asset('css/kamadatepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/clockpicker.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="container">
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                    <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">فرم پیام lbs</li>
                </ol>
            </nav>
        </div>

        <h1 class="h2 form-horizontal-title">فرم پیامک lbs</h1>
        <hr>
         <div class="row justify-content-center">
           <div class="col-md-8">
            @guest
                <div class="alert alert-warning text-center">
                    برای مشاهده فرم لطفا ثبت نام کنید یا در صورت عضویت وارد شوید.
                </div>
                <div>
                    <a class="btn btn-primary btn-sm" href="{{ route('register') }}">ثبت نام</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('login') }}">ورود</a>
                </div>
                <br>
                <br>
                <br>
                <br>

                @else
                <form method="POST" action="{{ route('lbs.insert') }}">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                       <label for="location" class="col-md-4 col-form-label label-form"> نام مکان </label>
                       <div class="col-md-7">
                            <select id="locations" class="postTag  form-control" multiple name="locations[]">
                                @foreach($allLocations as $location)
                                <option value="{{ $location->name }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                             @if ($errors->has('location'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('location') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="days" class="col-md-4 col-form-label label-form">  روز های هفته </label>
                        <div class="col-md-7">
                            <select name="days" id="days" class="select2  form-control{{ $errors->has('days') ? ' is-invalid' : '' }}"  name="days">
                                <option value="شنبه">شنبه</option>
                                <option value="یکشنبه">یکشنبه</option>
                                <option value="دوشنبه">دوشنبه</option>
                                <option value="سه شنبه">سه شنبه</option>
                                <option value="چهارشنبه">چهارشنبه</option>
                                <option value="پنج شنبه"> پنج شنبه</option>
                                <option value="جمعه"> جمعه</option>


                            </select>
                            @if ($errors->has('days'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('days') }}</strong>
                                     </span>
                                 @endif
                         </div>
                     </div>
                    <div class="form-group row">
                        <label for="scenario" class="col-md-4 col-form-label label-form"> نوع سناریو </label>
                        <div class="col-md-7">
                            <select id="scenario"  class="select3 form-control{{ $errors->has('scenario') ? ' is-invalid' : '' }} contact-form" name="scenario" value="{{ old('scenario') }}">
                                <option value="1">ورود</option>
                                <option value="2">خروج</option>
                            </select>
                            @if ($errors->has('scenario'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('scenario') }}</strong>
                                </span>
                            @endif
                         </div>
                     </div>
                    <div class="form-group row">
                        <label for="start_date" class="col-md-4 col-form-label label-form"> تاریخ شروع </label>
                        <div class="col-md-7">
                             <input id="start_date" type="text" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }} contact-form" name="start_date" value="{{ old('start_date') }}">
                                 @if ($errors->has('start_date'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('start_date') }}</strong>
                                     </span>
                                 @endif
                         </div>
                     </div>
                     <div class="form-group row">
                        <label for="end_date" class="col-md-4 col-form-label label-form"> تاریخ پایان </label>
                        <div class="col-md-7">
                             <input id="end_date" type="text" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }} contact-form" name="end_date" value="{{ old('end_date') }}">
                                 @if ($errors->has('end_date'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('end_date') }}</strong>
                                     </span>
                                 @endif
                         </div>
                     </div>
                     <div class="form-group row">
                        <label for="start_time" class="col-md-4 col-form-label label-form"> ساعت شروع </label>
                        <div class="col-md-7">
                             <input data-align="top" data-autoclose="true" id="start_time" type="text" class="clockpicker form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }} contact-form" name="start_time" value="{{ old('start_time') }}">
                                 @if ($errors->has('start_time'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('start_time') }}</strong>
                                     </span>
                                 @endif
                         </div>
                     </div>
                     <div class="form-group row">
                        <label for="end_time" class="col-md-4 col-form-label label-form"> ساعت پایان </label>
                        <div class="col-md-7">
                             <input  data-align="top" data-autoclose="true" id="end_time" type="text" class="clockpicker form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }} contact-form" name="end_time" value="{{ old('end_time') }}">
                                 @if ($errors->has('end_time'))
                                     <span class="invalid-feedback">
                                     <strong>{{ $errors->first('end_time') }}</strong>
                                     </span>
                                 @endif
                         </div>
                     </div>
                     <div class="form-group row">
                        <label for="count" class="col-md-4 col-form-label label-form"> تعداد </label>
                        <div class="col-md-7">
                            <input id="count" type="text" dir="ltr" class="price contact-form form-control{{ $errors->has('count') ? ' is-invalid' : '' }}" name="count" value="{{ old('count') }}" required>
                              @if ($errors->has('count'))
                                 <span class="invalid-feedback">
                                 <strong>{{ $errors->first('count') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>
                     <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label label-form">متن پیام</label>
                        <div class="col-md-7">
                             <textarea onkeyup="findType(this)" class="form-control contact-form" name="message" id="sms-area" cols="30" rows="5"></textarea>

                         </div>
                     </div>
                     <div class="form-group ">
                        <label for="body" class="col-md-4 col-form-label label-form">تعداد پیامک/کاراکتر : </label>
                        <span id="sms-count" class="badge badge-danger pt-1"></span>
                    </div>
                    <input name="messageCount" id="sms-value" type="hidden" value="">
                    <input name="language" id="sms-lang" type="hidden" value="">
                    <hr>
                    <div class="form-group row mb-0">
                       <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success btn-mobile p-2">
                           محاسبه و پرداخت
                        </button>
                       </div>
                    </div>
                    </br>
                    </br>

        </form>
            @endguest

             </div>
         </div>
    </div>

@stop
@section('js')
<script src="{{ asset('js/textCount.js') }}"></script>
<script src="{{ asset('js/kamadatepicker.js') }}"></script>
<script src="{{ asset('js/clockpicker.js') }}"></script>
<script>
    kamaDatepicker('start_date', { buttonsColor: "red"});
    kamaDatepicker('end_date', { buttonsColor: "blue"});
</script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>
<script>
    function findType(element) {
        let char = new RegExp("[\u0600-\u06FF]");
        if (char.test(element.value) === true) {
            element.style.direction =  "rtl"
            document.getElementById('sms-lang').value= 'fa'
        }
        else {
            element.style.direction =  "ltr"
            document.getElementById('sms-lang').value= 'en'
        }
    }
</script>

@endsection
