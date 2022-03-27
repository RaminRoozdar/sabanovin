@extends('layouts.app')

@section('title')
 مشتریان
@endsection

@section('content')

<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">
          <div class="row">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-dark" href="/">{{ config('platform.name') }}</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="admin.dashboard">مدیریت سیستم</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-dark" href="{{ route('admin.customer') }}">مشتریان</a></li>
                            </ol>
                        </nav>
                    </div>
          </div>
          <div class="float-right">
                <h3> مشتریان </h3>
          </div>
          <div class="float-left">
             <a class="btn btn-success" href="{{ route('admin.customer.create') }}"> ایجاد مشتری جدید </a>
          </div>
         <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>عنوان</th>
            <th> لینک </th>
            <th width="280px">عملیات</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td class="small">{{ $item->title }}</td>
            <td class="small">{{ $item->link }}</td>
            <td>
                <form action="{{route('admin.customer.delete',['id' => $item->id])}}" method="POST">

                    <a class="btn btn-danger btn-sm" href="{{route('admin.customer.edit',['id' => $item->id])}}">
                    <i class="fa fa-edit"></i>
                    </a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $items->links() !!}
        </div>
   </div>
</div>



@stop
