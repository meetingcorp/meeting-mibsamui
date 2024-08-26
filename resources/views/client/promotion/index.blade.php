@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(167, 141, 116, 0.5),rgba(167, 141, 116, 0.5)), url({{asset(setting('image_page_title_news'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="#">โปรโมชั่น</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>โปรโมชั่น</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
            <form class="site-search" action="{{route('promotions.index')}}">
                <div class="form-group">
                    <input name="search" type="search" class="form-control p-15" placeholder="ค้นหา">
                </div>
                <div class="form-group clearfix">
                    <div class="submit-button float-right">
                        <a class="btn btn-secondary" href="#"> ค้นหา</a>
                    </div>
                </div>
            </form>
            @if(request('search'))
                <h6 class="mb-20">ค้นหา: {{request('search')}}</h6>
            @endif
        </div>
    </section>
    <!-- page title -->

    <!--=================================
    page-title -->

    <section class="content">
        <div class="container">
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
            @foreach($promotions as $promotion)
                <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="{{route('promotions.show',['promotion'=>$promotion->slug])}}">
                                    <img alt=""
                                         src="@if(empty($promotion->getFirstMediaUrl('promotion','thumb'))) {{asset('images/noimage.jpg')}} @else {{$promotion->getFirstMediaUrl('promotion','thumb')}} @endif">
                                </a>

                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$promotion->created_at)->format('d F Y H:i')}}</span>

                                <h2>
                                    <a href="{{route('promotions.show',['promotion'=>$promotion->slug])}}">{{\Illuminate\Support\Str::limit($promotion->title,100)}}
                                    </a></h2>
                                {{\Illuminate\Support\Str::limit($promotion->short_detail,100)}}
                                <a href="{{route('promotions.show',['promotion'=>$promotion->slug])}}" class="item-link">อ่านเพิ่มเติม
                                    <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                @endforeach
            </div>
            {!! $promotions->links() !!}
        </div>
    </section>


@endsection
