@extends('adminlte::page')
@php $page = 'เพิ่ม Permission' @endphp
@section('title' ,setting('title').' | '.$page)

@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="m-auto">{{$page}}</h3>
                </div>
                <div class="card-title">
                    <ol class="breadcrumb bg-white m-auto">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="fa fa-home fa-fw" aria-hidden="true"></i>หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการ Permission</a></li>
                        <li class="breadcrumb-item active">{{$page}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="max-width: 60%;">
                        <form method="post" action="{{route('permission.store')}}">
                            @csrf
                            <label for="name">permission</label>
                            <input name="name" type="text" class="form-control" required>
                            <div class="btn-group mt-2">
                                <button class="btn btn-primary">เพิ่มข้อมูล</button>&nbsp;
                                <a class="btn btn-danger" onclick="history.back();">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('plugins.Select2', true)
@push('js')

@endpush
@endsection
