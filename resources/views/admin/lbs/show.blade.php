@extends('layouts.app')
@section('title', ' پیامک lbs  - ')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">  مدیریت سیستم </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.lbs') }}"> پیامک lbs </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">  پیامک شماره {{ $item->lbs->id }}  </a></li>
                    </ol>
                </nav>
                <div class="card card-default">
                    <div class="card-header">
                        پیامک شماره {{ $item->lbs->id }}
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
                                <td></td>
                            </tr>
                            <tr>
                                <td> موبایل </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td> ایمیل </td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>  کد پستی </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td> استان </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td> شهر </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td> آدرس پستی </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
@endsection
