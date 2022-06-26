
@extends('layouts.app')

@section('title')
 درخواست های  lbs من
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

<div class="row justify-content-center">
    <div class="col-md-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ config('platform.name') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> پنل کاربری </a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">  درخواست های  lbs من </a></li>
            </ol>
        </nav>
        <div class="card card-default">
            <div class="card-header">  درخواست های  lbs من

                <a class="btn btn-sm btn-danger pull-left" href="{{ route('lbs') }}"><i class="fa fa-plus"></i> درخواست جدید lbs</a>
            </div>

            <div class="card-body">

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>سناریو</th>
                            <th>مکان</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        </div>
   </div>
</div>



@stop
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function () {

      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        sScrollX: "100%",
        sScrollXInner: "110%",
        bScrollCollapse: true,
        ajax: '{{ route('lbs.list.data') }}',
        columns: [
            {data: 'id'},
            {data: 'scenario'},
            {data: 'location'},
            {data: 'start_date'},
            {data: 'end_date'},
            {data: 'status'},
        ],
        oLanguage:{
            "sEmptyTable":     "هیچ داده ای در جدول وجود ندارد",
            "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
            "sInfoEmpty":      "نمایش 0 تا 0 از 0 رکورد",
            "sInfoFiltered":   "(فیلتر شده از _MAX_ رکورد)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "نمایش _MENU_ رکورد",
            "sLoadingRecords": "در حال بارگزاری...",
            "sProcessing":     "در حال پردازش...",
            "sSearch":         "جستجو:",
            "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
            "oPaginate": {
                "sFirst":    "ابتدا",
                "sLast":     "انتها",
                "sNext":     "بعدی",
                "sPrevious": "قبلی"
            },
            "oAria": {
                "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
            }
        }
      });

    });
  </script>
@endsection
