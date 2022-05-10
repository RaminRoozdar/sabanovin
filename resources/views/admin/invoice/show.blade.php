@extends('layouts.app')
@section('title', ' فاکتور ها  - ')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">  مدیریت سیستم </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.invoice') }}">  فاکتور ها </a></li>
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
                                        {{number_format($item->product->amount)}}
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
                                    <th scope="row"> تاریخ ثبت سفارش </th>
                                    <td colspan="3">  {{ \Morilog\Jalali\Jalalian::forge($invoice->created_at)->format('l j %B Y')  }}
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

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    تغییر وضعیت سفارش
                                  </button>
                                </h2>
                              </div>

                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form method="post" action="{{ route('admin.invoice.update',['id' => $invoice->id]) }}" style="display:inline;">
                                        @csrf
                                        @method('post')
                                        <div class="form-group row">
                                                <label for="status" class="col-md-4 col-form-label @lang('platform.input-pull')"> وضعیت </label>
                                                <div class="col-md-7">
                                                    <select name="status" id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                                        <option value="wait"{{old('status', $invoice->status) == 'wait' ? ' selected' : ''}}>منتظر پرداخت</option>
                                                        <option value="pending"{{old('status', $invoice->status) == 'pending' ? ' selected' : ''}}>درحال بررسی</option>
                                                        <option value="paid"{{old('status', $invoice->status) == 'paid' ? ' selected' : ''}}>پرداخت شده منتظر ارسال</option>
                                                        <option value="posted"{{old('status', $invoice->status) == 'posted' ? ' selected' : ''}}>ارسال شده </option>
                                                        <option value="failed"{{old('status', $invoice->status) == 'failed' ? ' selected' : ''}}>رد شده</option>
                                                    </select>
                                                </div>
                                         </div>
                                         <div class="form-group row">
                                            <label for="tracking_code" class="col-md-4 col-form-label @lang('platform.input-pull')"> شماره پیگیری مرسوله </label>
                                            <div class="col-md-7">
                                                <input id="tracking_code" type="text" dir="ltr" class="form-control{{ $errors->has('tracking_code') ? ' is-invalid' : '' }}" name="tracking_code" value="{{ old('tracking_code', $invoice->tracking_code) }}">

                                                @if ($errors->has('tracking_code'))
                                                    <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('tracking_code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                         </div>
                                         <div class="form-group row">
                                            <label for="description" class="col-md-4 col-form-label @lang('platform.input-pull')"> توضیحات بیشتر </label>
                                            <div class="col-md-7">
                                                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description', $invoice->description)}}</textarea>
                                            </div>
                                         </div>
                                         <button type="submit" class="btn btn-sm btn-info">ثبت  تغییرات</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        مشخصات مشتری
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-condensed table-hover">
                            <tr>
                                <td>نام </td>
                                <td>{{ $invoice->user->name  }}</td>
                            </tr>
                            <tr>
                                <td> موبایل </td>
                                <td>{{ $invoice->user->mobile  }}</td>
                            </tr>
                            <tr>
                                <td> ایمیل </td>
                                <td>{{ $invoice->user->email   }}</td>
                            </tr>
                             <tr>
                                <td>  کد پستی </td>
                                <td>{{ $invoice->user->zip_code  }}</td>
                            </tr>
                            <tr>
                                <td> استان </td>
                                <td>{{ $invoice->user->province->name }}</td>
                            </tr>
                            <tr>
                                <td> شهر </td>
                                <td>{{ $invoice->user->city->name  }}</td>
                            </tr>
                            <tr>
                                <td> آدرس پستی </td>
                                <td>{{ $invoice->user->address   }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
@endsection
