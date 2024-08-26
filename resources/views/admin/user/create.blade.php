@extends('adminlte::page')
@php $pagename = 'เพิ่มผู้ใช้งาน' @endphp
@section('title', setting('title').' | '.$pagename)

@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="m-auto">{{$pagename}}</h3>
                </div>
                <div class="card-title">
                    <ol class="breadcrumb bg-white m-auto">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="fa fa-home fa-fw" aria-hidden="true"></i>หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการผู้ใช้งาน</a></li>
                        <li class="breadcrumb-item active">{{$pagename}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="{{route('users.store')}}" onSubmit="return checkpass()" name="frmuser">
                            @csrf
                            <label for="name">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                            <label for="username">username</label>
                            @error('username')
                                <span class="text-danger">** {{$message}}</span>
                            @enderror
                            <input class="form-control" type="text" name="username" value="{{old('username')}}" required>
                            <label for="email">อีเมล</label>
                            @error('email')
                                <span class="text-danger">** {{$message}}</span>
                            @enderror
                            <input type="email" name="email" class="form-control" placeholder="example@meeting.com" value="{{old('email')}}" required>
                            <label for="userrole">สิทธิ์ผู้ใช้งาน</label>
                            <select name="userrole" id="userrole" class="form-control">
                                @foreach($roles as $rol)
                                    @if(Auth::user()->hasRole('supreme administrator'))
                                        <option value="{{$rol->name}}">{{$rol->name}}</option>
                                    @else
                                        @if($rol->name == 'supreme administrator')

                                        @else
                                            <option value="{{$rol->name}}">{{$rol->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                            <label for="password">รหัสผ่าน</label>
                            <input type="password" name="password" class="form-control" minlength="6" required>
                            <label for="comfirmpass">ยืนยันรหัสผ่าน</label>
                            <input type="password" name="comfirmpass" class="form-control" minlength="6" required>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">เพิ่ม</button>&nbsp;
                                <a onclick="history.back()" class="btn btn-danger">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @section('plugins.Sweetalert2', true)
    @push('js')
        <script>
            function checkpass(){
                var pass1 = document.forms['frmuser']['password'].value;
                var pass2 = document.forms['frmuser']['comfirmpass'].value;
                // alert(pass1 == pass2);
                if(pass1 === pass2){
                    return true;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'ผิดพลาด',
                    text: 'รหัสผ่านไม่ถูกต้อง',
                    animation: false,
                });
                document.forms['frmuser']['password'].focus();
                return false;
            }

        </script>
    @endpush
@endsection
