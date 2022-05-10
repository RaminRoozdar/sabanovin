@extends('layouts.app')
@section('title', 'لیست فاکتور ها - ')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> پنل کاربری </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">لیست فاکتور ها</a></li>
                    </ol>
                </nav>
                <div class="card card-default">
                    <div class="card-header"> لیست فاکتور ها

                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">عنوان</th>
                                <th scope="col" class="text-center">تاریخ ایجاد</th>
                                <th scope="col" class="text-center">وضعیت فاکتور</th>

                                <th scope="col" class="text-center">اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($items && count($items) > 0)
                                @foreach($items as $item)
                                <tr>
                                    <td scope="row" class="text-center">
                                   فاکتور شماره   {{ $item->id }}
                                    </td>
                                    <td class="text-center">
                                        {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format('l j %B Y')  }}
                                    </td>
                                    <td class="text-center">
                                        {{ constant('App\Enums\InvoiceEnum::STATUS_'.strtoupper($item->status).'_TEXT')}}
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-danger btn-sm btn-font-size" href="{{ route('user.invoice.show' , ['id' => $item->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <td colspan="4">
                                        <span>هیچ اطلاعاتی برای نمایش وجود ندارد.</span>
                                    </td>
                                </tr>
                                @endif



                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
