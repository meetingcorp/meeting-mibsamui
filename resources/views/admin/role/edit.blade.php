@extends('adminlte::page')
@php $page = 'แก้ไขสิทธิ์ผู้ใช้งาน' @endphp
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
{{--                        @php dd($roles->getPermissionNames()) @endphp--}}
                        <form method="post" action="{{route('role.update',['role' => $roles->id])}}">
                            @method('PUT')
                            @csrf
                            <label for="name">ชื่อสิทธิ์</label>
                            <input name="name" type="text" class="form-control" value="{{$roles->name}}" required>
                            <label for="permiss">สิทธิ์การเข้าถึง</label>
                            <select class="permissmulti form-control" name="permiss[]" multiple="multiple">
                                @foreach($permiss as $item)
                                    <option value="{{$item->id}}"
                                            @if(in_array($item->name,$roles->getPermissionNames()->toArray())) selected @endif
                                    >{{$item->name}}</option>
                                @endforeach
                            </select>
                            <div class="btn-group mt-2">
                                <button class="btn btn-primary">บันทึก</button>&nbsp;
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
                $('.permissmulti').select2();
            });
        </script>
    @endpush
@endsection
