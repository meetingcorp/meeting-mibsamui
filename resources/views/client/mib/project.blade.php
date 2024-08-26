@extends('client.layouts.app')
@section('content')
    <section id="page-title" data-bg-parallax="{{ asset(setting('product')) }}">
        <div class="bg-overlay"></div>
        <div class="bg-overlay"></div>
        <div class="container" style="margin-top:10%; margin-bottom:5%;">
            <div class="page-title">
                <h1>Project</h1>
                <span>The most happiest time of the day!.</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li class="active"><a href="#">Project</a> </li>
                </ul>
            </div>
        </div>
    </section>
    <section style="padding-top: 20px; padding-left:20px;  padding-right:20px;">
        <div class="text-right" style="margin-bottom:20px;">
            <h2>Project</h2>
        </div>
        <div class="grid-layout grid-3-columns grid-loaded" data-margin="20" data-item="grid-item" data-lightbox="gallery">
            @foreach ($project as $item)
                <div class="grid-item">
                    <a class="image-hover-zoom" style="cursor: pointer;"
                        href="{{route('project.show', ['id' => $item->id])}}">
                        <img src="@if ($item->getFirstMediaUrl('project')) {{ $item->getFirstMediaUrl('project') }}
                        @else
                        {{ asset('images/no-image.jpg') }} @endif
                        "
                            style="max-width: 100%;">
                    </a>
                </div>
            @endforeach
        </div>

    </section>
@endsection
