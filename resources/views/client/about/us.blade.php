@extends('client.layouts.app')

@section('content')
    <style>
        #content-custom ul{
            padding-left: 40px;
        }
    </style>
    <!-- page title -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_about'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="javascript:void(0)">เกี่ยวกับเรา</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>เกี่ยวกับเรา</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- page title -->

    <section class="p-t-50 p-b-50 " style="">
        <div class="container" id="content-custom">
            {!! setting('about_detail') !!}
        </div>
    </section>
    <!--=================================
     About-->

@endsection
