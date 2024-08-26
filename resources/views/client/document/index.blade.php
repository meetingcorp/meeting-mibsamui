@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_document'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="#">เอกสารดาวน์โหลดฟรี</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>เอกสารดาวน์โหลดฟรี</h1>
            </div>
        </div>
    </section>
    <!-- page title -->

    <!--=================================
    page-title -->

    <section class="content">
        <div class="container">
            <div id="" class="row">
                @foreach($files as $file)
                    <div class="col-md-6">
                        @if($file->extension=='xlsx')
                            <a href="{{asset('uploads/files/'.$file->file_name)}}" target="_blank">
                                <h4 class="font-weight-normal"><i class="fas fa-file-excel text-success mr-2"></i> {{$file->name}}</h4>
                            </a>
                        @elseif($file->extension=='pdf')
                            <a href="{{asset('uploads/files/'.$file->file_name)}}" target="_blank">
                                <h4 class="font-weight-normal"><i class="fas fa-file-pdf text-danger mr-2"></i> {{$file->name}}</h4>
                            </a>
                        @else
                            <a href="{{asset('uploads/files/'.$file->file_name)}}" target="_blank">
                                <h4 class="font-weight-normal"><i class="fas fa-file-excel text-success mr-2"></i> {{$file->name}}</h4>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
