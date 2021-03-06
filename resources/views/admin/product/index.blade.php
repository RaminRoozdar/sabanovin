@extends('layouts.app')

@section('title')
 باز خورد ها
@endsection

@section('content')

<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">
          <div class="card">

            <div class="card-header">
                محصولات
                <a class="float-left btn btn-sm btn-success" href="{{ route('admin.product.create') }}">ایجاد محصول جدید</a>
            </div>

         <div class="card-body">



           @foreach ($items as $item)

           <div class="card">
            <div class="card-body col-md-12 row">
                <div class="col-md-4">
                    <img width="100" height="100" src="{{ Storage::url($item->image) }}" alt="">
                </div>

                <div class="col-md-4">

                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">موجودی : {{ $item->count }}</p>
                    <p class="card-text">قیمت :{{number_format($item->amount)}}</p>

                </div>

               <div class="col-md-4">

                <form action="{{route('admin.product.disable',['id' => $item->id])}}" method="POST">



                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm float-left ml-2">
                    <i class="fa fa-trash"></i>
                    غیرفعال
                    </button>
                    <a href="{{ route('admin.product.edit',['id' => $item->id]) }}" class="btn btn-warning btn-sm float-left"><i class="fa fa-edit"></i> ویرایش </a>

                </form>

               </div>


            </div>
        </div>

           @endforeach



         </div>


        <div class="card-footer">


            {!! $items->links() !!}

        </div>
        </div>
   </div>
</div>



@stop
