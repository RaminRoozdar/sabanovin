@extends('layouts.app')
@section('title', ' فاکتور ها  - ')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">  پنل کاربری </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.invoice') }}">  فاکتور ها </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">  فاکتور شماره {{ $invoice->id }}  </a></li>
                    </ol>
                </nav>
                <div class="card card-default">
                    <div class="card-header">
                        فاکتور شماره {{ $invoice->id }}   /  به نام {{ $invoice->user->name }}
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">شناسه محصول</th>
                                <th scope="col" class="text-center">محصول</th>
                                <th scope="col" class="text-center">تعداد</th>
                                <th scope="col" class="text-center">قیمت (تومان)</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($items && count($items) > 0)
                                @foreach($items as $item)
                                <tr>
                                    <td scope="row" class="text-center">
                                    {{ $item->id }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->product->title }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="text-center">
                                        {{number_format($item->amount)}}
                                    </td>

                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="row">مبلغ کل فاکتور</th>
                                    <td colspan="3">  {{number_format($total)}}  تومان  </td>
                                  </tr>
                                  <tr>
                                    <th scope="row"> وضعیت سفارش </th>
                                    <td colspan="3">  {{ constant('App\Enums\InvoiceEnum::STATUS_'.strtoupper($invoice->status).'_TEXT')}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">  شماره پیگیری مرسوله </th>
                                    <td colspan="3">  {{ $invoice->tracking_code }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">  توضیحات بیشتر </th>
                                    <td colspan="3">  {{ $invoice->description }}
                                    </td>
                                  </tr>
                                @else
                                <tr>
                                    <td colspan="4">
                                        <span>هیچ اطلاعاتی برای نمایش وجود ندارد.</span>
                                    </td>
                                </tr>
                                @endif



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
