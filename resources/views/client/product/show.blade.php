@extends('client.layouts.app')
@section('meta_tag_keyword',$product->meta_keyword)
@section('meta_tag_description',$product->meta_description)
@section('meta_og')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$product->title}}"/>
    <meta property="og:description" content="{{$product->detail}}"/>
    <meta property="og:image"
          content="@if(!empty($product->getFirstMediaUrl('product'))) {{$product->getFirstMediaUrl('product')}} @else {{asset('images/noimage.jpg')}} @endif"/>
@endsection
@section('content')

    <!--=================================
page-title-->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('product'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home.index')}}">หน้าแรก</a></li>
                    <li><a href="{{route('product.all')}}">สินค้า</a></li>
                    <li>{{$product->title}}</li>
                </ul>
            </div>
            <div class="page-title">
                <h1>สินค้า</h1>
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
                                    <img alt="image" src="@if(!empty($product->getFirstMediaUrl('product'))) {{$product->getFirstMediaUrl('product')}} @else {{asset('images/noimage.jpg')}} @endif">
                                </a>

                                <div class="post-item-description">
                                    <h2>{{$product->title}}</h2>
                                    <div class="post-meta">
                                        <span class="post-meta-date">
                                            <i class="fas fa-calendar"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$product->created_at)->format('d F Y H:i')}}
                                            <div class="float-right fb-share-button"
                                                 data-href="{{url()->current()}}"
                                                 data-layout="button_count">
                                        </div>
                                        </span>

                                    </div>
                                    <span>ราคา : </span>
                                    {{ number_format($product->normal_price )}}
                                    <p>{{$product->short_detail}}</p>
                                    {!! $product->detail !!}
                                </div>
                                <div class="form-group text-center">
                                    <a href="asd">
                                        <img src="https://orchid.meeting.co.th/image/line.png" class="mt-2" style="max-width: 250px; height: auto">
                                    </a>
                                    <a href="https://www.facebook.com/">
                                        <img src="https://orchid.meeting.co.th/image/messenger.png" class="mt-2" style="max-width: 250px; height: auto">
                                    </a>
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
                                       aria-controls="featured" aria-selected="false">ผลิตภัณฑ์อื่นๆ</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="tabs-posts-content">
                                <div class="tab-pane fade show active" id="popular" role="tabpanel"
                                     aria-labelledby="popular-tab">
                                    <div class="post-thumbnail-list">


                                        @foreach($products as $product)
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="@if(empty($product->getFirstMediaUrl('product'))) {{asset('images/noimage.jpg')}} @else {{$product->getFirstMediaUrl('product')}} @endif">
                                                <div class="post-thumbnail-content">
                                                    <a href="{{route('product', ['product' => $product->slug])}}"> {{\Illuminate\Support\Str::limit($product->title,100)}}</a>
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

