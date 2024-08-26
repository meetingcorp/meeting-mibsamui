@extends('adminlte::page')
@php $page = 'แก้ไขสินค้า' @endphp
@section('title', setting('title') . ' | ' . $page)
@section('content')
    <div class="row">
        <div class="pl-4 pt-4">
            <h3>{{ $page }}</h3>
            <ol class="breadcrumb float-right" style="background-color: transparent;">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="fa fa-home fa-fw" aria-hidden="true"></i>
                        หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" onclick="history.back()">จัดการสินค้า</a></li>
                <li class="breadcrumb-item active">{{ $page }}</li>
            </ol>
        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-cyan">
                    <div class="card-header">
                        <b>แก้ไขสินค้า</b>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form method="post" action="{{ route('product.update', ['product' => $product->id]) }}"
                                enctype="multipart/form-data" id="frmupdate">
                                @method('PUT')
                                @csrf
                                <label for="title">ชื่อสินค้า</label>
                                <input name="title" type="text" value="{{ $product->title }}" class="form-control"
                                    required> <br />
                                <label for="categorys">หมวดหมู่</label>
                                <select name="categorys[]" class="catemulti form-control" multiple="multiple">
                                    @foreach ($procate as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array(
                                                $item->title,
                                                $product->product_category()->pluck('title')->toArray(),
                                            )) selected @endif>{{ $item->title }}
                                        </option>
                                    @endforeach
                                </select><br /><br />
                                <label for="price">ราคาปกติ</label>
                                <input name="price" type="number" class="form-control"
                                    value="{{ $product->normal_price }}" required><br />
                                <label for="spacialprice">ราคาพิเศษ</label>
                                <input name="spacialprice" id="spacialprice" class="form-control"
                                    value="{{ $product->spacial_price }}">
                                <br><label for="shortdetail">เนื้อหาย่อย</label><br>
                                <textarea class="form-control" name="shortdetail" id="shortdetail" cols="30" rows="3">{{ $product->short_detail }}</textarea>
                                <br>
                                <label for="detail">รายละเอียด</label><br>
                                <textarea class="form-control" name="detail" id="detail" rows="20">{{ $product->detail }}</textarea><br>
                                <label for="img">รูปภาพ</label><br>
                                <span class="text-danger">**รูปภาพขนาด 300x300 pixel**</span>
                                <div class="input-group mt-1">
                                    <input name="imgs[]" type="file" class="custom-file-input" id="imgInp" multiple>
                                    <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                </div>
                                <br />
                                <label>seo tag</label>
                                <input type="text" name="metatag" class="form-control"
                                    value="{{ $product->meta_tag }}">
                                <label>seo description</label>
                                <input type="text" name="metadesc" class="form-control"
                                    value="{{ $product->meta_description }}">
                            </form>
                            <div class="btn-group mt-2">
                                <button class="btn btn-primary" onclick="confirmupdate()"><i class="fas fa-save mr-2"></i>บันทึก</button>&nbsp;
                                <a class="btn btn-danger" onclick="history.back();"><i
                                        class="fas fa-arrow-alt-circle-left mr-2"></i>ย้อนกลับ</a>
                            </div>
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
                            <img class="card-img"
                                src="@if ($product->getFirstMediaUrl('product')) {{ asset($product->getFirstMediaUrl('product')) }}
                                @else{{ asset('image/no-image.jpg') }} @endif"
                                id="showimg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@push('js')
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                showimg.src = URL.createObjectURL(file)
            }
        }

        $(document).ready(function() {
            $('.catemulti').select2();
        });
        tinymce.init({
            selector: '#detail',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });

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
