@extends('adminlte::page')
@php $page = 'แก้ไข Service' @endphp
@section('title', setting('title') . ' | ' . $page)

@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="m-auto">{{ $page }}</h3>
                </div>
                <div class="card-title">
                    <ol class="breadcrumb bg-white m-auto">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="fa fa-home fa-fw"
                                    aria-hidden="true"></i>หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการโปรเจค</a></li>
                        <li class="breadcrumb-item active">{{ $page }}</li>
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
                        <form method="post" action="{{ route('service.update', ['service' => $data->id]) }}"
                            enctype="multipart/form-data" id="frmupdate">
                            @method('PUT')
                            @csrf
                            <label for="title">หัวข้อ</label>
                            <input name="title" type="text" class="form-control" value="{{ $data->title }}" required>
                            <label for="img">รูปภาพ</label><br>
                            <img src="@if ($data->getFirstMediaUrl('service')) {{ $data->getFirstMediaUrl('service') }}
                            @else{{ asset('images/no-image.jpg') }} @endif"
                                style="max-height: 200px; width: auto;" id="showimg"><br>
                            <span class="text-danger">**รูปภาพขนาด 1080x1920 pixel**</span>
                            <div class="input-group mt-1">
                                <input name="imgs" type="file" class="custom-file-input" id="imgInp">
                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                            </div>
                        </form>
                        <div class="btn-group mt-2">
                            <button class="btn btn-primary" onclick="confirmupdate()">บันทึกข้อมูล</button>&nbsp;
                            <a class="btn btn-danger" onclick="history.back();">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('plugins.Sweetalert2', true)
    @push('js')
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    showimg.src = URL.createObjectURL(file)
                }
            }

            function confirmupdate() {
                Swal.fire({
                    title: 'ท่านต้องการบันทึกข้อมูลหรือไม่ !!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'บันทึก',
                    cancelButtonText: 'ยกเลิก',
                    showLoaderOnConfirm: true,
                }).then((results) => {
                    if (results.isConfirmed) {
                        frmupdate.submit();
                    }
                });
            }
        </script>
    @endpush
@endsection
