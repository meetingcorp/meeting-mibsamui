@extends('adminlte::page')
@php $pagename = 'จัดการ Service' @endphp
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
                    <a href="{{route('service.create')}}" class="btn btn-primary"><i class="fa fa-plus"> เพิ่มข้อมูล</i></a>
                    <div class="mt-4">
                        <table id="table" class="table table-striped dataTable no-footer dtr-inline text-center nowrap" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>##</th>
                                <th>หัวเรื่อง</th>
                                <th>รูปภาพ</th>
                                <th>การมองเห็น</th>
                                <th width="10%">ลำดับ</th>
                                <th>การจัดการ</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@push('js')
    <script>
        var table;
        $(document).ready( function () {
            table = $('#table').DataTable({
                responsive: true,
                processing: true,
                scrollX: true,
                scrollCollapse: true,
                autoWidth: true,
                language: {
                    'loadingRecords': '&nbsp;',
                    'processing': '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
                },
                serverSide: true,
                ajax: "{{route('service.index')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'} ,
                    {data: 'title'},
                    {data: 'img'},
                    {data: 'switches'},
                    {data: 'sorting'},
                    {data: 'btn'},
                ],
            });
        });

        function deleteConfirmation(id) {
                Swal.fire({
                    icon: 'info',
                    title: 'ท่านต้องการลบข้อมูลใช่หรือไม่',
                    text: 'หากลบข้อมูลแล้วจะไม่สามารถกู้คืนกลับมาได้',
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก',
                    showLoaderOnConfirm: true,
                    animation: false,
                    preConfirm: (e) => {
                        return new Promise(function (resolve) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'DELETE',
                                url: "{{url('admin/service')}}/" + id,
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (results) {
                                    if (results.status === true) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: results.message,
                                            animation: false,
                                        })
                                        table.ajax.reload();
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: results.message,
                                            animation: false,
                                        })
                                    }

                                }
                            });
                        })
                    },
                });
        }

        function publish(ele){
                var data = ele.value;
                var frmdata = {
                    'data': ele.value
                };
                if(data == 1){
                    ele.value = 0;
                }else{
                    ele.value = 1;
                }

                $.ajax({
                    type: 'get',
                    url: "{{url('admin/service/publish')}}/"+ele.id,
                    data: frmdata,
                    success: function (response){
                        if (response.status === true) {
                            Swal.fire({
                                position: 'top-right',
                                icon: 'success',
                                title: response.message,
                                toast: true,
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                position: 'top-right',
                                icon: 'error',
                                title: response.message,
                                toast: true,
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }

            function sort(ele){
                var frmdata = {
                    'data': ele.value
                };
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/service/sort')}}/"+ele.id,
                    data: frmdata,
                    success: function (response){
                        if (response.status === true) {
                            Swal.fire({
                                position: 'top-right',
                                icon: 'success',
                                title: response.message,
                                toast: true,
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                position: 'top-right',
                                icon: 'error',
                                title: response.message,
                                toast: true,
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }
    </script>
@endpush
@endsection
