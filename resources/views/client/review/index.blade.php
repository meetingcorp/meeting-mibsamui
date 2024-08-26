@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(167, 141, 116, 0.5),rgba(167, 141, 116, 0.5)), url({{asset(setting('image_page_title_review'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="{{route('reviews.index')}}">รีวิว</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>รีวิว</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- page title -->

    <section id="page-content">
        <div class="container">

            <nav class="grid-filter gf-outline" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="*">ทั้งหมด</a></li>
                    @foreach($review_categories as $cat)
                        <li><a href="#" data-category=".review-{{$cat->id}}">{{$cat->name}}</a></li>
                    @endforeach

                </ul>
                <div class="grid-active-title">ทั้งหมด</div>
            </nav>

            <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="30">
                @foreach($reviews as $review)
                    <div
                        class="portfolio-item shadow img-zoom  @foreach($review->categories()->pluck('id') as $id)
                        {{ 'review-'.$id }}
                        @endforeach">
                        <div class="portfolio-item-wrap">
                            @php
                                $i=1;
                            @endphp
                            @foreach($review->images as $key => $image)
                                @if($i>1)
                                    @break
                                @endif
                                <div class="portfolio-image">
                                    <a href="#"><img src="{{$image->getUrl('thumb')}}" alt=""></a>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            <div class="portfolio-description" data-lightbox="gallery">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($review->images as $key => $image)
                                    <a title="{{$review->title}}" data-lightbox="gallery-image"
                                       href="{{$image->getUrl()}}" @if($i>1) class="hidden" @endif>
                                        <i class="icon-copy"></i>
                                    </a>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
