@extends('layouts.app')

@section('title')
اسلایدر
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
                 اسلایدر

                <a class="float-left btn btn-sm btn-success" href="{{ route('admin.slider.create') }}">ایجاد اسلایدر جدید</a>
            </div>

         <div class="card-body">



           @foreach ($items as $item)

           <div class="card">
            <div class="card-body col-md-12 row">
                <div class="col-md-4">
                    <img width="100" height="100" src"{{ Storage::url($item->image) }}" =alt="">
                </div>

                <div class="col-md-8">

                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text"><a href="">{{ $item->link }}</a></p>

                </div>

               <div class="col-md-12">

                <form action="{{route('admin.slider.delete',['id' => $item->id])}}" method="POST">



                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm float-left ml-2">
                    <i class="fa fa-trash"></i>
                    حذف
                    </button>
                    <a href="{{ route('admin.slider.edit',['id' => $item->id]) }}" class="btn btn-warning btn-sm float-left"><i class="fa fa-edit"></i> ویرایش </a>

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
