@extends('adminlte::page')
@section('title', setting('title') . ' | แก้ไขโปรไฟล์')
@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="m-auto">แก้ไขโปรไฟล์</h3>
                </div>
                <div class="card-title">
                    <ol class="breadcrumb bg-white m-auto">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="fa fa-home fa-fw"
                                    aria-hidden="true"></i>หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขโปรไฟล์</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{ route('profile.update', ['profile' => Auth::user()->id]) }}" id="frmupdate"
                            method="post" onsubmit="return comfirmdata();">
                            @method('PUT')
                            @csrf
                            <label>ชื่อ-นามสกุล</label>
                            <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
                            <label>username</label>
                            <input class="form-control" type="text" name="username" value="{{ Auth::user()->username }}">
                            <label>email</label>
                            <input class="form-control" type="email" name="mail" value="{{ Auth::user()->email }}">
                            <label>รหัสผ่าน</label>
                            <input class="form-control" type="password" name="pass" id="pass">
                            <label>ยืนยันรหัสผ่าน</label>
                            <input class="form-control" type="password" name="passconfirm" id="passconfirm">
                        </form>
                        <div class="form-group mt-2">
                            <a class="btn btn-danger" onclick="window.history.back()">ย้อนกลับ</a>
                            <button type="submit" class="btn btn-primary" onclick="confirmupdate()">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@section('plugins.Sweetalert2', true)
@push('js')
    <script>
        function comfirmdata() {
            let pass = $('#pass').val();
            let cpass = $('#passconfirm').val();

            if (pass === cpass) {
                return true;
            }
            Swal.fire({
                title: 'รหัสผ่านไม่ตรงกัน',
                icon: 'warning',
            })
            return false;
        }

        function confirmupdate() {
            Swal.fire({
                icon: 'info',
                title: 'ท่านต้องการบันทึกข้อมูลหรือไม่ !!',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
            }).then((results) => {
                if (results.isConfirmed) {
                    frmupdate.submit();
                } else {

                }
            });
        }
    </script>
@endpush
@endsection
