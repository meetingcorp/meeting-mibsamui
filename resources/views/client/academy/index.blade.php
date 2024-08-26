@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class=" text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_wealth_academy'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="#">Wealth Academy</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>Wealth Academy</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- page title -->

    <!--=================================
    page-title -->

    <section class="content">
        <div class="container">
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
            @foreach($academies as $academy)
                <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="{{route('academies.show',['academy'=>$academy->id])}}">
                                    <img alt=""
                                         src="@if(empty($academy->getFirstMediaUrl('academy','thumb'))) {{asset('images/noimage.jpg')}} @else {{$academy->getFirstMediaUrl('academy','thumb')}} @endif">
                                </a>

                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$academy->created_at)->format('d F Y H:i')}}</span>

                                <h2>
                                    <a href="{{route('academies.show',['academy'=>$academy->id])}}">{{\Illuminate\Support\Str::limit($academy->title,100)}}
                                    </a></h2>
                                <a href="{{route('academies.show',['academy'=>$academy->id])}}" class="item-link">อ่านเพิ่มเติม
                                    <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                @endforeach
            </div>
            {!! $academies->links() !!}
        </div>
    </section>


@endsection
