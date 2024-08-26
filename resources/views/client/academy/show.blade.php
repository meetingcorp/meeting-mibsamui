@extends('client.layouts.app')
@section('meta_tag_keyword',$academy->meta_keyword)
@section('meta_tag_description',$academy->meta_description)
@section('meta_og')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$academy->title}}"/>
    <meta property="og:description" content="{{$academy->detail}}"/>
    <meta property="og:image"
          content="@if(!empty($academy->getFirstMediaUrl('academy'))) {{$academy->getFirstMediaUrl('academy')}} @else {{asset('images/noimage.jpg')}} @endif"/>
@endsection
@section('content')

    <!--=================================
page-title-->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_wealth_academy'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('client.home')}}">หน้าแรก</a></li>
                    <li><a href="{{route('academies.index')}}"> Wealth Academy</a></li>
                    <li>{{$academy->title}}</li>
                </ul>
            </div>
            <div class="page-title">
                <h1>Wealth Academy</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>

    <!--=================================
    page-title -->

    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="content col-lg-9">
                    <!-- Blog -->
                    <div id="blog" class="single-post">
                        <!-- Post single item-->
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <a href="javascript:void(0)" data-lightbox="gallery-image">
                                    <img alt="image" src="@if(!empty($academy->getFirstMediaUrl('academy'))) {{$academy->getFirstMediaUrl('academy')}} @else {{asset('images/noimage.jpg')}} @endif">
                                </a>

                                <div class="post-item-description">
                                    <h2>{{$academy->title}}</h2>
                                    <div class="post-meta">
                                        <span class="post-meta-date">
                                            <i class="fas fa-calendar"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$academy->created_at)->format('d F Y H:i')}}
                                            <div class="float-right fb-share-button"
                                                 data-href="{{url()->current()}}"
                                                 data-layout="button_count">
                                        </div>
                                        </span>

                                    </div>
                                    <p>{{$academy->short_detail}}</p>
                                    {!! $academy->detail !!}
                                </div>


                            </div>
                        </div>
                        <!-- end: Post single item-->
                    </div>
                </div>
                <!-- end: content -->
                <!-- Sidebar-->
                <div class="sidebar sticky-sidebar col-lg-3">

                    <div class="widget">
                        <div class="tabs">
                            <ul class="nav nav-tabs" id="tabs-posts" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab"
                                       aria-controls="featured" aria-selected="false">อื่นๆ</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="tabs-posts-content">
                                <div class="tab-pane fade show active" id="popular" role="tabpanel"
                                     aria-labelledby="popular-tab">
                                    <div class="post-thumbnail-list">


                                        @foreach($academies as $academy)
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="@if(empty($academy->getFirstMediaUrl('academy','thumb'))) {{asset('images/noimage.jpg')}} @else {{$academy->getFirstMediaUrl('academy','thumb')}} @endif">
                                                <div class="post-thumbnail-content">
                                                    <a href="{{route('academies.show',['academy'=>$academy->id])}}"> {{\Illuminate\Support\Str::limit($academy->title,100)}}</a>
                                                    <span class="post-category"><i
                                                            class="fas fa-angle-right"></i> อ่านต่อ...</span>

                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--end: widget tags -->
                </div>
                <!-- end: Sidebar-->
            </div>
        </div>
    </section>

@endsection

