@extends('adminlte::page')
@php $page = 'เพิ่ม Service' @endphp
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
                        <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการโปรเจค</a></li>
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
                        <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
                            @csrf
                            <label for="title">หัวข้อ</label>
                            <input name="title" type="text" class="form-control" required>
                            <label for="img">รูปภาพ</label><br>
                            <img src="{{asset('images/no-image.jpg')}}" style="max-height: 200px; width: auto;" id="showimg"><br>
							<span class="text-danger">**รูปภาพขนาด 1080x1920 pixel**</span>
                            <div class="input-group mt-1">
                                <input name="imgs" type="file" class="custom-file-input" id="imgInp">
                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                            </div>
                            <div class="btn-group mt-2">
                                <button class="btn btn-primary">เพิ่มข้อมูล</button>&nbsp;
                                <button class="btn btn-danger" onclick="history.back();">ย้อนกลับ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    showimg.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush
@endsection
