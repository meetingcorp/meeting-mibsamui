@extends('client.layouts.app')
@section('content')
    {{-- header --}}
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.56),rgba(0, 0, 0, 0.6)), url({{asset(setting('image_page_title_news'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="{{route('articles.index')}}"> ประสบการณ์จากลูกค้า</a></li>
                    <li>{{$testimonial->name}}</li>
                </ul>
            </div>
            <div class="page-title">
                <h1>ประสบการณ์จากลูกค้า</h1>
            </div>
        </div>
    </section>

    {{-- content --}}
    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div class="carousel arrows-visibile testimonial testimonial-single" data-items="1" data-loop="true"
                 data-autoplay="true" data-autoplay="3500" data-arrows="false" data-dots="false" data-animate-in="fadeIn"
                 data-animate-out="fadeOut">
                <div class="testimonial-item">
                    <img
                        src="@if(!empty($testimonial->getFirstMediaUrl('testimonial'))){{ $testimonial->getFirstMediaUrl('testimonial') }}@else {{ asset('images/noimage.jpg') }} @endif"
                        alt="">
                    <p>{{$testimonial->message}}</p>
                    <span>{{$testimonial->name}}</span>
                    <span>{{$testimonial->position}}</span>
                    <span>
                         <div class="rateit" data-rateit-mode="font" data-rateit-value="{{$testimonial->rating}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="content col-lg-12">
                    <!-- Blog -->
                    <div id="blog" class="single-post">
                        <!-- Post single item-->
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <div class="post-item-description">
                                    {!! $testimonial->detail !!}
                                </div>
                            </div>
                        </div>
                        <!-- end: Post single item-->
                    </div>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-success" href="{{route('testimonials.index')}}"><i class="fas fa-arrow-left"></i> ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </section>

@endsection

