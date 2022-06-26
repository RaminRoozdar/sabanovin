
@extends('layouts.app')

@section('title')
ارسال پیامک lbs
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
            <div class="card-header">پیامک lbs

                <a href="{{ route('admin.lbs.location') }}" class="btn btn-primary btn-sm pull-left"><i class="fa fa-plus-circle"></i> لیست مکان ها </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>سناریو</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
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
        ajax: '{{ route('admin.lbs.data') }}',
        columns: [
            {data: 'id'},
            {data: 'scenario'},
            {data: 'start_date'},
            {data: 'end_date'},
            {data: 'status'},
            {data: 'action', orderable: false, searchable: false}
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
