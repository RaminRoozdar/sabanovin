
@extends('layouts.front')


@section('title')
 فروشگاه {{ settings()->get('SITE_TITLE') }}
@stop



@section('content')
   <div class="container-fluid">
       <div class="container">
         <div class="table-responsive">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                  <tr>
                    <th scope="col">محصول</th>
                    <th scope="col">موجودی</th>
                    <th scope="col">قیمت</th>
                    <th scope="col" style="width:15%">تعداد</th>
                    <th scope="col">جمع</th>
                    <th scope="col">عملیات</th>
                  </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['amount'] * $details['quantity'] @endphp
                     <tr data-id="{{ $id }}">
                       <th data-th="Product" scope="row">{{ $details['title'] }}</th>
                       <td data-th="Count">{{ $details['count'] }}</td>
                       <td data-th="Amount">{{number_format($details['amount'])}}</td>
                       <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                       </td>
                       <td  data-th="Subtotal"> {{number_format($details['amount'] * $details['quantity'])}}  </td>
                       <td class="actions">
                         <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                       </td>

                     </tr>
                   @endforeach
                   @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-left"><h4><strong>جمع کل :   {{number_format($total)}}   تومان</strong></h4></td>
                        <td colspan="3" class="text-right">
                            <a href="{{ route('information') }}" class="btn btn-sm btn-info"> ادامه خرید <i class="fa fa-angle-left"></i></a>
                            <a href="{{ route('shop') }}" class="btn btn-sm btn-warning">خروج</a>
                        </td>
                    </tr>

                </tfoot>
              </table>
        </div>
       </div>
   </div>

@stop
@section('js')

<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });


</script>

@stop
