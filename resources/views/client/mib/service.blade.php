@extends('client.layouts.app')
@section('content')
    <section id="page-title" data-bg-parallax="{{asset(setting('aboutus'))}}">
        <div class="bg-overlay"></div>
        <div class="bg-overlay"></div>
        <div class="container" style="margin-top:10%; margin-bottom:5%; ">
            <div class="page-title">
                <h1>Service</h1>
                <span>The most happiest time of the day!.</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li class="active"><a href="#">Service</a> </li>
                </ul>
            </div>
        </div>
    </section>

    <div style="padding:0 15px 0 15px;">
        <div class="text-right" style="margin-bottom:20px; margin-top:25px;">
            <h2>Our Service</h2>
        </div>
        <div class="grid-3-columns" data-margin="15" data-item="grid-item" data-lightbox="gallery">
            @foreach ($service as $item)
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ $item->getFirstMediaUrl('service') }}"
                        data-lightbox="gallery-image"><img src="{{ $item->getFirstMediaUrl('service') }}"
                            style="border: 2px solid #dfdfdf; "></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection