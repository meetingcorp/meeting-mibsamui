@extends('adminlte::page')
@section('title', setting('title') . ' | ตั้งค่าหน้าเว็บไซต์')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endpush
@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="m-auto">ตั้งค่าหน้าเว็บไซต์</h4>
                </div>
                <div class="card-title">
                    <ol class="breadcrumb bg-white m-auto">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home fa-fw"
                                    aria-hidden="true"></i>หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ตั้งค่าหน้าเว็บไซต์</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary card-tabs">
                <form method="post" action="{{ route('setting.store') }}" enctype="multipart/form-data" id="frmstore">
                    @csrf
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            {{-- <li class="pt-2 px-3">
                                <h3 class="card-title">Card Title</h3>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill"
                                    href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home"
                                    aria-selected="true">หน้าหลัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile"
                                    aria-selected="false">รูปภาพ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages"
                                    aria-selected="false">social</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-img-tab" data-toggle="pill"
                                    href="#custom-tabs-two-img" role="tab" aria-controls="custom-tabs-two-img"
                                    aria-selected="false">รูปภาพที่เกี่ยวข้อง</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                    href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings"
                                    aria-selected="false">SEO</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                                aria-labelledby="custom-tabs-two-home-tab">
                                <div class="mb-3">
                                    <label for="title">ชื่อเว็บไซต์</label>
                                    <input class="form-control" type="text" name="title"
                                        value="{{ setting('title') }}">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-two-profile-tab">
                                <div class="mb-3">
                                    <label>Favicon</label>
                                    <span class="text-danger">**รูปภาพขนาด 100x100 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <img src="{{ asset(setting('favicon')) }}" id="showimg1"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="favicon" type="file" class="custom-file-input"
                                                    id="imgInp1">
                                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>โลโก้ Login</label>
                                    <span class="text-danger">**รูปภาพขนาด 500x500 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <img src="{{ asset(setting('logologin')) }}" id="showimg2"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="logologin" type="file" class="custom-file-input"
                                                    id="imgInp2">
                                                <label class="custom-file-label" for="customfile">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>โลโก้ Navbar (Admin)</label>
                                    <span class="text-danger">**รูปภาพขนาด 150x150 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <img src="{{ asset(setting('logonav')) }}" id="showimg3"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="logonav" type="file" class="custom-file-input"
                                                    id="imgInp3">
                                                <label class="custom-file-label" for="customfile">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="mb-3">
                                    <label>โลโก้ Header (Client)</label>
                                    <span class="text-danger">**รูปภาพขนาด 150x150 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <img src="{{ asset(setting('logoheader')) }}" id="showlogoheader"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="logoheader" type="file" class="custom-file-input"
                                                    id="logoheader">
                                                <label class="custom-file-label" for="customfile">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>OG Image</label>
                                    <span class="text-danger">**รูปภาพขนาด 150x150 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <img src="{{ asset(setting('ogimage')) }}" id="showogimage"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="ogimage" type="file" class="custom-file-input"
                                                    id="ogimage">
                                                <label class="custom-file-label" for="customfile">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-img" role="tabpanel"
                                aria-labelledby="custom-tabs-two-img-tab">
                                <div class="mb-3">
                                    <label>Service</label>
                                    <span class="text-danger">**รูปภาพขนาด 1920x1080 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12 mb-3">
                                            <img src="{{ asset(setting('aboutus')) }}" id="showimg4"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="aboutus" type="file" class="custom-file-input"
                                                    id="imgInp4">
                                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Project</label>
                                    <span class="text-danger">**รูปภาพขนาด 1920x1080 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12 mb-3">
                                            <img src="{{ asset(setting('product')) }}" id="showimg5"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="product" type="file" class="custom-file-input"
                                                    id="imgInp5">
                                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Contact</label>
                                    <span class="text-danger">**รูปภาพขนาด 1920x1080 pixel**</span>
                                    <div class="row align-items-center">
                                        <div class="col-12 mb-3">
                                            <img src="{{ asset(setting('news')) }}" id="showimg6"
                                                style="max-height: 100px; width: auto;">
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input name="news" type="file" class="custom-file-input"
                                                    id="imgInp6">
                                                <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="aboutus_info">เกี่ยวกับเรา (text)</label>
                                    <textarea name="aboutus_info" id="aboutus_info" class="form-control">{{ setting('aboutus_info') }}</textarea>
                                </div>
                                <label for="facebook_embed">เฟสบุค embed</label>
                                <textarea name="facebook_embed" id="facebook_embed" class="form-control" cols="30" rows="3">{{ setting('facebook_embed') }}</textarea> --}}
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-two-messages-tab">
                                <div class="mb-3">
                                    <label for="tel1">เบอร์โทรศัพท์</label>
                                    <input class="form-control" type="text" name="tel1"
                                        value="{{ setting('telle') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="facebook_info">Facebook</label>
                                    <input class="form-control" type="text" name="facebook_info"
                                        value="{{ setting('facebook_info') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="line_info">Line</label>
                                    <input class="form-control" type="text" name="line_info"
                                        value="{{ setting('line_info') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="map_info">Google Map</label>
                                    <textarea class="form-control" name="map_info" id="map_info" cols="30" rows="3">{{ setting('map_info') }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel"
                                aria-labelledby="custom-tabs-two-settings-tab">
                                <div class="mb-3">
                                    <label for="">SEO Keyword</label>
                                    <input class="form-control" type="text" name="meta_keyword" id="meta_keyword"
                                        value="{{ setting('meta_keyword') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="">SEO Description</label>
                                    <input class="form-control" type="text" name="meta_description"
                                        id="meta_description" value="{{ setting('meta_description') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-footer text-right">
                    <div class="btn-group mt-auto">
                        <button class="btn btn-primary" onclick="confirmupdate()"><i
                                class="fas fa-save mr-2"></i>บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@section('plugins.Sweetalert2', true)
@push('js')
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                showimg1.src = URL.createObjectURL(file)
            }
        }

        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                showimg2.src = URL.createObjectURL(file)
            }
        }

        imgInp3.onchange = evt => {
            const [file] = imgInp3.files
            if (file) {
                showimg3.src = URL.createObjectURL(file)
            }
        }
        imgInp4.onchange = evt => {
            const [file] = imgInp4.files
            if (file) {
                showimg4.src = URL.createObjectURL(file)
            }
        }
        imgInp5.onchange = evt => {
            const [file] = imgInp5.files
            if (file) {
                showimg5.src = URL.createObjectURL(file)
            }
        }
        imgInp6.onchange = evt => {
            const [file] = imgInp6.files
            if (file) {
                showimg6.src = URL.createObjectURL(file)
            }
        }
        ogimage.onchange = evt => {
            const [file] = ogimage.files
            if (file) {
                showogimage.src = URL.createObjectURL(file)
            }
        }
		logoheader.onchange = evt => {
            const [file] = logoheader.files
            if (file) {
                showlogoheader.src = URL.createObjectURL(file)
            }
        }
        tinymce.init({
            selector: '#aboutus_info',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar_mode: 'floating',
            height: '400px',
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
                    frmstore.submit();
                }
            });
        }
    </script>
@endpush
@endsection
