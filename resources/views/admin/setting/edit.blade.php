@extends('layouts.app')


@section('title')
    تنظیمات
@stop



@section('content')

    <div class="container">
         <div class="row justify-content-center">
           <div class="col-md-3">
           @include('admin.sidebar')
           </div>
           <div class="col-md-9">
                <div class="card">
                   <div class="card-header">
                       <h1 class="h4">تنظیمات</h1>
                   </div>
                   <div class="card-body">
                    <form class="form" action="{{ route('admin.setting.update') }}" method="POST">
                        @CSRF
                        <div class="card-body">
                            <input type="hidden" name="_method" value="PUT">
                                    @foreach($settings as $setting)
                                        <div class="form-group row">
                                            <label for="{{$setting->key}}" class="col-md-4 col-form-label label-form"> {{settingMapper($setting->key)}} </label>
                                            <div class="col-md-12">
                                                <input type="text" id="{{$setting->key}}" name="{{$setting->key}}" value="{{$setting->value}}" class="form-control pnmbr edited" />
                                             </div>
                                         </div>
                                    @endforeach

                          </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ذخیره</button>
                            </div>
                      </form>
                   </div>
                </div>
             </div>
         </div>
    </div>
@stop
