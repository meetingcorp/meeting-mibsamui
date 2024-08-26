@extends('adminlte::page')
@php $page = 'แก้ไขแบนเนอร์' @endphp
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
                        <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการแบนเนอร์</a></li>
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
                        <form method="post" action="{{route('banner.update',['banner' => $banner->id])}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <label for="title">แบนเนอร์</label>
                            <input name="title" type="text" class="form-control" value="{{$banner->title}}" required>
                            <label for="img">รูปภาพ</label><br>
                            <img src="@if($banner->getFirstMediaUrl('banner')) {{$banner->getFirstMediaUrl('banner')}} @else {{asset('images/no-image.jpg')}} @endif"
                                  height="200" id="showimg"><br>
							<span class="text-danger">**รูปภาพขนาด 1920x700 pixel**</span>
                            <div class="input-group mt-1">
                                <input name="imgs" type="file" class="custom-file-input" id="imgInp">
                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                            </div>
                            <div class="mt-4">
                                <label for="img2">รูปภาพโมบาย</label><br>
                                <img src="@if($banner->getFirstMediaUrl('banner_mobile')) {{$banner->getFirstMediaUrl('banner_mobile')}} @else {{asset('images/no-image.jpg')}} @endif"
                                      height="200" id="showimg2"><br>
								<span class="text-danger">**รูปภาพขนาด 500x700 pixel**</span>
                                <div class="input-group mt-1">
                                    <input name="imgs2" type="file" class="custom-file-input" id="imgInp2">
                                    <label class="custom-file-label" for="imgInp2">เพิ่มรูปภาพ</label>
                                </div>
                            </div>
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
    @push('js')
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    showimg.src = URL.createObjectURL(file)
                }
            }
            imgInp2.onchange = evt => {
                const [file] = imgInp2.files
                if (file) {
                    showimg2.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush
@endsection
