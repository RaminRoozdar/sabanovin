
@extends('layouts.app')

@section('title')
فاکتور
@endsection

@section('head')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<style>
    tr{
        font-size: 14px;
    }
   td{
       font-size: 12px !important;
   }
</style>
@endsection
@section('content')

<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">

          <div class="card card-default">
            <div class="card-header"> فاکتور ها

            </div>

            <div class="card-body ">
                <div class="list-group">
                    <a href="{{ route('admin.invoice.pendding') }}" class="list-group-item list-group-item-action">فاکتور های در حال بررسی</a>
                    <a href="{{ route('admin.invoice.paid') }}" class="list-group-item list-group-item-action ">فاکتور های منتظر ارسال</a>
                    <a href="{{ route('admin.invoice.posted') }}" class="list-group-item list-group-item-action">فاکتور های ارسال شده</a>
                  </div>

            </div>
        </div>

        </div>
   </div>
</div>



@stop
@section('js')

@endsection
