@extends('adminlte::page')
@php $page = 'เพิ่มสิทธิ์ผู้ใช้งาน' @endphp
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
                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการสิทธิ์การใช้งาน</a></li>
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
                        <form method="post" action="{{route('role.store')}}">
                            @csrf
                            <label for="name">ชื่อสิทธิ์</label>
                            <input name="name" type="text" class="form-control" required>
                            <label for="">การเข้าถึง</label>
                            <select class="js-example-basic-multiple form-control" name="permiss[]" multiple="multiple">
                                @foreach($permissions as $permiss)
                                    <option value="{{$permiss->name}}">{{$permiss->name}}</option>
                                @endforeach
                            </select><br>
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
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endpush
@endsection
