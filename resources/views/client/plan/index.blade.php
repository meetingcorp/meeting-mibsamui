@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class=" text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_service'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="#">บริการของเรา</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>บริการของเรา</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- page title -->

    <!--=================================
    page-title -->

    <section class="content">
        <div class="container">
            <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
            @foreach($plans as $plan)
                <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="{{route('plans.show',['plan'=>$plan->id])}}">
                                    <img alt=""
                                         src="@if(empty($plan->getFirstMediaUrl('plan','thumb'))) {{asset('images/noimage.jpg')}} @else {{$plan->getFirstMediaUrl('plan','thumb')}} @endif">
                                </a>
                            </div>
                            <div class="post-item-description text-center">
                                <h2>
                                    <a href="{{route('plans.show',['plan'=>$plan->id])}}">{{\Illuminate\Support\Str::limit($plan->title,100)}}
                                    </a>
                                    <p>{{$plan->title_en}}</p>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                @endforeach
            </div>
            {!! $plans->links() !!}
        </div>
    </section>


@endsection
