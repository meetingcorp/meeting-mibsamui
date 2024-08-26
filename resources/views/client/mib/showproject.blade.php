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
                    <li><a href="{{ route('project') }}">Project</a> </li>
                    <li class="active"><a href="#">{{ $project->title }}</a> </li>
                </ul>
            </div>
        </div>
    </section>
    <section style="padding-top: 20px; padding-left:20px;  padding-right:20px;">
        <div class="text-right" style="margin-bottom:20px;">
            <h2>Project</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="content col-lg-9">
                    <!-- Blog -->
                    <div id="blog" class="single-post">
                        <!-- Post single item-->
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <div class="carousel flickity-enabled is-draggable carousel-loaded" data-items="1"
                                    data-dots="false">
                                    @php
                                        $media = $project->getMedia('project');
                                        $res = $media->sortBy(function ($med, $key) {
                                            return $med->getCustomProperty('order');
                                        });
                                    @endphp
                                    @foreach ($res as $item)
                                        <div class="polo-carousel-item">
                                            <img src="@if (!empty($item->getUrl())) {{ $item->getUrl() }} @else {{ asset('images/no-image.jpg') }} @endif"
                                                alt="image">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="post-item-description">
                                    <h2>{{ $project->title }}</h2>
                                    <div class="post-meta">
                                        <span class="post-meta-date">
                                            <i
                                                class="fas fa-calendar"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $project->created_at)->format('d F Y H:i') }}
                                            <div class="float-right fb-share-button" data-href="{{ url()->current() }}"
                                                data-layout="button_count">
                                            </div>
                                        </span>

                                    </div>
                                    {!! $project->detail !!}
                                </div>
                                <div class="form-group text-center">

                                </div>
                            </div>
                        </div>
                        <!-- end: Post single item-->
                    </div>
                </div>
                <div class="sidebar sticky-sidebar col-lg-3">

                    <div class="widget">
                        <div class="tabs">
                            <ul class="nav nav-tabs" id="tabs-posts" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab"
                                        aria-controls="featured" aria-selected="false">โปรเจคอื่นๆ</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="tabs-posts-content">
                                <div class="tab-pane fade show active" id="popular" role="tabpanel"
                                    aria-labelledby="popular-tab">
                                    <div class="post-thumbnail-list">


                                        @foreach ($all as $item)
                                            <div class="post-thumbnail-entry">
                                                <img alt=""
                                                    src="@if (empty($item->getFirstMediaUrl('project'))) {{ asset('images/no-image.jpg') }} @else {{ $item->getFirstMediaUrl('project') }} @endif">
                                                <div class="post-thumbnail-content">
                                                    <a href="{{ route('project.show', ['id' => $item->id]) }}">
                                                        {{ \Illuminate\Support\Str::limit($item->title, 100) }}</a>
                                                    <a href="{{ route('project.show', ['id' => $item->id]) }}">
                                                        <span class="post-category"><i class="fas fa-angle-right"></i>
                                                            อ่านต่อ...</span>
                                                    </a>


                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
