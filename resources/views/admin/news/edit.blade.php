@extends('adminlte::page')
@php $page = 'แก้ไขข่าวสาร' @endphp
@section('title' ,setting('title').' | '.$page)
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endpush

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
                        <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการข่าวสาร</a></li>
                        <li class="breadcrumb-item active">{{$page}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-cyan">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="{{route('news.update',['news' => $news->id])}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <label for="title">หัวเรื่อง</label>
                            <input name="title" type="text" class="form-control" id="title" onkeyup="updatetitle()" required value="{{$news->title}}">
                            <label for="shortdetail">รายละเอียดย่อย</label><br>
                            <textarea class="form-control" name="sortdetail" id="shortdetail" cols="30" rows="3">{{$news->short_detail}}</textarea>
                            <label for="title">รายละเอียด</label>
                            <textarea name="detail" id="detail" class="form-control">{{$news->detail}}</textarea>
                            <label for="img">รูปภาพ</label><br>
                            <img src="@if($news->getFirstMediaUrl('news')) {{$news->getFirstMediaUrl('news')}} @else {{asset('image/no-image.jpg')}} @endif"
                                 width="200" height="200" id="showimg"><br>
							<span class="text-danger">**รูปภาพขนาด 350x300 pixel**</span>
                            <div class="input-group mt-1">
                                <input name="imgs" type="file" class="custom-file-input" id="imgInp">
                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                            </div>
                            <label for="metatag">meta tag</label>
                            <input type="text" name="metatag" id="metatag" class="form-control" value="{{$news->metatag}}">
                            <label for="metades">meta description</label>
                            <input type="text" name="metades" id="metades" class="form-control" value="{{$news->metadescription}}">
                            <div class="btn-group mt-2">
                                <button class="btn btn-success">บันทึกข้อมูลข้อมูล</button>&nbsp;
                                <a class="btn btn-danger" onclick="history.back();">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-outline card-cyan">
                <div class="card-body">
                    <div class="form-group">
                        <h4>Preview</h4>
                        <div class="container border">
                            <div class="text-center">
                                <img src="@if($news->getFirstMediaUrl('news')) {{$news->getFirstMediaUrl('news')}} @else {{asset('image/no-image.jpg')}} @endif"
                                id="desktopshow" style="width: 100%;">
                            </div>
                            <div>
                                <h5 id="subtitle">{{$news->title}}</h5>
                                <p id="subdetail">
                                    {!! $news->short_detail !!}
                                </p>
                            </div>
                        </div>
                        <a href="{{route('news', ['news' => $news->slug])}}" target="_blank" data-toggle="tooltip" title="ดูหน้าเว็บ"><i class="fa fa-eye"></i> open in web</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files;
                if (file) {
                    showimg.src = URL.createObjectURL(file);
                    desktopshow.src = URL.createObjectURL(file);
                }
            }
            function updatetitle(){
                var data = document.getElementById('title').value;
                document.getElementById('subtitle').innerHTML = data;
            }

            function updatedetail(){
                var data = document.getElementById('detail').value;
                if(data.length > 5){
                    data = data.substring(0,5)+'...';
                }
                // console.log(data);
                document.getElementById('subdetail').innerHTML = data;
            }
            tinymce.init({
                selector: '#detail',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            })
        </script>
    @endpush
@endsection
