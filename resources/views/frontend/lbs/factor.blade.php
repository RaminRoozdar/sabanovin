@extends('layouts.front')

@section('title')
محاسبه و پرداخت
@endsection

@section('content')

    <div class="container">
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                    <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-dark" href="{{ route('lbs') }}">پیامک LBS</a>
                        </li>
                    <li class="breadcrumb-item active" aria-current="page"> محاسبه پیام </li>
                </ol>
            </nav>
        </div>

        <h1 class="h2 form-horizontal-title">محاسبه پیامک lbs</h1>
        <hr>
         <div class="row justify-content-center">
           <div class="col-md-10">
              <div class="card-body">
                <div class="alert alert-info">
                    <p>
                        اطلاعات پیام
                    </p>
                </div>
                <table class="table table-bordered table-condensed table-hover">
                    <tr>
                        <td> مکان </td>
                        <td>{{ $item->location }}</td>
                    </tr>
                    <tr>
                        <td>تعداد ارسال</td>
                        <td>{{ number_format($item->count ) }}</td>
                    </tr>
                    <tr>
                        <td>تعداد پیامک (شمارش کاراکتر)</td>
                        <td>{{ $item->message_count }}</td>
                    </tr>
                    <tr>
                        <td>زبان پیامک</td>
                        <td>{{ $item->language }}</td>
                    </tr>

                    <tr>
                        <td> تاریخ شروع</td>
                        <td>{{ $item->start_date }}</td>
                    </tr>
                    <tr>
                        <td>تاریخ پایان</td>
                        <td>{{ $item->end_date }}</td>
                    </tr>
                    <tr>
                        <td>ساعت شروع</td>
                        <td>{{ $start_time }}</td>
                    </tr>
                    <tr>
                        <td>ساعت پایان</td>
                        <td>{{ $item->end_time }}</td>
                    </tr>
                    <tr>
                        <td>هزینه پیامک</td>
                        <td>
                            {{ number_format($item->amount ) }} تومان
                        </td>
                    </tr>
                    <tr>
                        <td>متن پیامک</td>
                        <td>{{ $item->message }}</td>
                    </tr>
                </table>
               </div>
               <div class="card-footer">
                <form method="POST" action="{{ route('lbs.payment',['id'=> $item->id])}}">
                    @csrf
                    <div class="form-group row">
                        <label for="bank" class="col-md-4 col-form-label label-form"> انتخاب درگاه پرداخت </label>
                        <div class="col-md-7">
                            <select id="bank" name="bank" class="select2 form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}">
                                <option value="saman"{{old('bank') == 'saman' ? ' selected' : ''}}>سامان</option>
                            </select>
                        </div>
                     <br>
                     <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-sm">
                                پرداخت
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <br>
             </div>
         </div>
    </div>

@stop
@section('js')


@endsection
