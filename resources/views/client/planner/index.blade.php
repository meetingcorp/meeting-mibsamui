@extends('client.layouts.app')

@section('content')

    <!-- page title -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_about'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="{{route('about.us')}}">เกี่่ยวกับเรา</a></li>
                    <li><a href="#">{{$planner->fullname}}</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>{{$planner->fullname}}</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- page title -->

    <section class="content  mb-0">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-3">
                    <img style="width: 100%" src="@if(!empty($planner->getFirstMediaUrl('planner'))){{ $planner->getFirstMediaUrl('planner') }}@else {{asset('images/noimage.jpg')}} @endif">
                </div>
                <div class="col-md-9">
                    <h3>
                        {{$planner->quote}}
                    </h3>

                </div>
                <div class="col-md-12 mt-4">
                    {!! $planner->detail !!}
                </div>
            </div>
        </div>
    </section>
@endsection
