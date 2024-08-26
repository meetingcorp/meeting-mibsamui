@extends('adminlte::page')
@php $page = 'เพิ่มสินค้า' @endphp
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
                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการสินค้า</a></li>
                    <li class="breadcrumb-item active">{{$page}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-cyan">
                <div class="card-header">
                    <b>เพิ่มสินค้า</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                @csrf
                                <label for="title">ชื่อสินค้า</label>
                                <input name="title" type="text" class="form-control" required> <br/>
                                <label for="categorys">หมวดหมู่</label>
                                <select name="categorys[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                    @foreach($cate as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select><br/><br/>
                                <label for="price">ราคา</label>
                                <input name="price" type="number" class="form-control" required><br/>
                                <label>ราคาพิเศษ</label>
                                <input type="number" name="spacialprice" class="form-control"><br>
                                <label for="shortdetail">เนื้อหาย่อย</label><br>
                                <textarea class="form-control" name="shortdetail" id="shortdetail" cols="30" rows="3"></textarea>
                                <br>
                                <label for="detail">รายละเอียด</label><br>
                                <textarea class="form-control" name="detail" id="detail" cols="30" rows="10"></textarea><br>
                                <label for="img">รูปภาพ</label><br>
								<span class="text-danger">**รูปภาพขนาด 300x300 pixel**</span>
                                <div class="input-group mt-1">
                                    <input name="imgs[]" type="file" class="custom-file-input" id="imgInp" multiple>
                                    <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                </div>
                                <br/>
                                <label>seo tag</label>
                                <input class="form-control" type="text" name="metatag">
                                <label>seo description</label>
                                <input class="form-control" type="text" name="metadesc">
                                <div class="btn-group mt-2">
                                    <button class="btn btn-primary"><i class="fas fa-save mr-2"></i>เพิ่มข้อมูล</button>&nbsp;
                                    <a class="btn btn-danger" onclick="history.back();"><i class="fas fa-arrow-alt-circle-left mr-2"></i>ย้อนกลับ</a>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-cyan">
                <div class="card-header">
                    <b>แสดงรูปภาพ</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                    <div class="card-body text-center">
                        <div>
                            <img class="card-img" src="{{asset('images/no-image.jpg')}}" id="showimg"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @section('plugins.Select2', true)
    @push('js')
        <script>
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    showimg.src = URL.createObjectURL(file)
                }
            }

            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });

            tinymce.init({
                selector: '#detail',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>
    @endpush
@endsection
