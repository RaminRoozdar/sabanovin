@extends('layouts.front')

@section('title')
محاسبه اقساط
@endsection
@section('content')

    <div class="container">
        <div class="breadcrumb-container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-white font-size-breadcrumb">
                    <li class="breadcrumb-item">
                    <a class="text-dark" href="/">خانه</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> محاسبه اقساط دستگاه </li>
                </ol>
            </nav>
        </div>

        <h1 class="h2 form-horizontal-title">محسابه قسط</h1>
        <hr>
         <div class="row justify-content-center">
           <div class="col-md-8">
                <div class="alert alert-info">
                    <p>
                       محاسبه اقساط درخواست شما به صورت جدول زیر می باشد
                    </p>
                    قیمت ها به تومان می باشد
                </div>
                <table class="table table-bordered table-condensed table-hover">
                    <tr>
                        <td> قیمت نقدی دستگاه </td>
                        <td>{{ number_format($cash_price)   }} </td>
                    </tr>
                    <tr>
                        <td>پیش پرداخت</td>
                        <td>{{ number_format($prepayment) }}</td>
                    </tr>
                    <tr>
                        <td>تعداد اقساط</td>
                        <td>{{ $count  }}</td>
                    </tr>
                    <tr>
                        <td> مانده بدون سود اقساط</td>
                        <td>{{ number_format($left_over) }}</td>
                    </tr>
                    <tr>
                        <td> سود هر ماه</td>
                        <td>{{ number_format($monthly_profit) }}</td>
                    </tr>
                    <tr>
                        <td>  جمع مانده و سود اقساط </td>
                        <td>{{ number_format($total) }}</td>
                    </tr>
                    <tr>
                        <td>  مبلغ هر چک</td>
                        <td>{{ number_format($check_price) }}</td>
                    </tr>
                </table>

           </div>
         </div>
    </div>

@stop
