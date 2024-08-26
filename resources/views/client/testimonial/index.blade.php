@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_news'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="#">ประสบการณ์จากลูกค้า</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>ประสบการณ์จากลูกค้า</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- page title -->

    <section class="content">
        <div class="container">


            <div class="comments" id="comments">
                <div class="comment-list">
                    @foreach($testimonials as $testimonial)
                        <div class="comment" id="comment-{{$testimonial->id}}">
                            <div class="image">
                                <img style="width: 100%; height: 100%" alt="" src="@if(!empty($testimonial->getFirstMediaUrl('testimonial'))){{ $testimonial->getFirstMediaUrl('testimonial') }}@else {{ asset('images/noimage.jpg') }} @endif" class="avatar">
                            </div>
                            <div class="text">
                                <h5 class="name">{{$testimonial->name}}</h5>
                                <span class="comment_date">{{$testimonial->position}}</span>
                                <br>
                                <span class="comment_date">
                                     <div class="rateit" data-rateit-mode="font"
                                          data-rateit-value="{{$testimonial->rating}}"
                                          data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                </span>
                                <div class="text_holder">
                                    " {{$testimonial->message}} "
                                    <br>
                                    {!! $testimonial->detail !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>

            {!! $testimonials->links() !!}
        </div>
    </section>


@endsection
