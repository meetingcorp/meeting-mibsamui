@extends('client.layouts.app')

@section('content')
    <!-- page title -->
    <section id="page-title" class=" text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('product'))}}); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home.index')}}">หน้าแรก</a></li>
                    <li><a href="#">สินค้า</a></li>
                </ul>
            </div>
            <div class="page-title">
                <h1>สินค้า</h1>
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
            @foreach($product as $product)
                <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="{{ route('product', ['product' => $product->slug]) }}">
                                    <img alt=""
                                         src="@if(empty($product->getFirstMediaUrl('product'))) {{asset('images/noimage.jpg')}} @else {{$product->getFirstMediaUrl('product')}} @endif">
                                </a>

                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$product->created_at)->format('d F Y H:i')}}</span>

                                <h2>
                                    <a href="{{route('product', ['product' => $product->slug])}}">{{\Illuminate\Support\Str::limit($product->title,100)}}
                                    </a></h2>
                                <a href="{{route('product', ['product' => $product->slug])}}" class="item-link">อ่านเพิ่มเติม
                                    <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                @endforeach
            </div>
            {{-- {!! $products->links() !!} --}}
        </div>
    </section>


@endsection
