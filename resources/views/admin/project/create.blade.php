@extends('adminlte::page')
@php $page = 'เพิ่มโปรเจค' @endphp
@section('title', setting('title') . ' | ' . $page)
@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css"
        integrity="sha512-CmjeEOiBCtxpzzfuT2remy8NP++fmHRxR3LnsdQhVXzA3QqRMaJ3heF9zOB+c1lCWSwZkzSOWfTn1CdqgkW3EQ=="
        crossorigin="anonymous" /> --}}
@endpush
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
                    <div class="form-group">
                        <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="title">หัวข้อ</label>
                            <input name="title" type="text" class="form-control" required>
                            <label for="detail">รายละเอียด</label><br>
                            <textarea name="detail" id="detail"></textarea><br>
                            <label for="img">รูปภาพ</label><br>
                            <div class="dropzone image-preview " id="imageDropzone">
                                <div class="dz-message">
                                    <i class="fas fa-upload"></i><br>
                                    <span>อัพโหลดรูปภาพของคุณ!</span>
                                </div>
                            </div><br>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
            integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
            crossorigin="anonymous"></script>
        <script>
            tinymce.init({
                selector: '#detail',
                plugins: 'responsivefilemanager print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'image | responsivefilemanager | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                height: 350,
                relative_urls: false,
                remove_script_host: false,
                convert_urls: true,
                external_filemanager_path: "{{ asset('vendor/responsive_filemanager/filemanager') }}/",
                filemanager_title: "File manger",
                external_plugins: {
                    "responsivefilemanager": "{{ asset('vendor/responsive_filemanager/tinymce/plugins/responsivefilemanager/plugin.min.js') }}",
                    "filemanager": "{{ asset('vendor/responsive_filemanager/filemanager/plugin.min.js') }}"
                },
            });

            Dropzone.prototype.defaultOptions.dictRemoveFile =
                "<i class=\"fa fa-trash ml-auto mt-2 fa-1x text-danger\"></i> ลบรูปภาพ";
            Dropzone.autoDiscover = false;
            var uploadedImageMap = {}
            $('#imageDropzone').dropzone({
                url: "{{ route('uploadimg') }}",
                // maxFilesize: 2, // MB
                addRemoveLinks: true,
                dictCancelUpload: 'ยกเลิกอัพโหลด',
                acceptedFiles: 'image/*',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(file, response) {
                    $(file.previewElement).append('<input type="hidden" name="image[]" value="' + response.name +
                        '">')
                    uploadedImageMap[file.name] = response.name
                },
                init: function() {
                    this.on('removedfile', (file) => {
                        let data = { 
                            '_token': '{{ csrf_token() }}',
                            'name': file.name,
                        }

                        $.ajax({
                            type: 'post',
                            url: "{{route('delimg')}}",
                            data: data,
                            success: (response) => {
                                
                            }
                        });
                    });
                }
            });
            $(function() {
                $("#imageDropzone").sortable({
                    items: '.dz-preview',
                    cursor: 'move',
                    opacity: 0.5,
                    containment: '#imageDropzone',
                    distance: 20,
                    tolerance: 'pointer'
                });
            });
            //!------------------------------

            $("input").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });

            $("#checkAll").click(function() {
                $(".treeview").hummingbird("checkAll");
            });
            $("#uncheckAll").click(function() {
                $(".treeview").hummingbird("uncheckAll");
            });


            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#treeview li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        </script>
    @endpush
@endsection
