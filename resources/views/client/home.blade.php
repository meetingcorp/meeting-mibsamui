@extends('client.layouts.app')
@section('content')
    <section style="padding: 0;">
        <div class="d-none d-sm-block">
            <div class="row">
                <div class="col-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <h1 class="rotate rotate-up" style="margin-left:15px;">
                        M&nbsp;I&nbsp;B&nbsp;&nbsp;S&nbsp;T&nbsp;U&nbsp;D&nbsp;I&nbsp;O</h1>
                </div>
                <div class="col-11 col-lg-11 col-md-11 col-sm-11 col-xs-11">
                    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative flickity-enabled is-fade"
                        data-fade="true" data-items="3" data-arrows="true" data-dots="true" style="max-height: auto;">
                        @foreach ($slide as $item)
                            <div class="slide kenburns lazy-bg bg-loaded" data-bg-image="{{ asset($item->getFirstMediaUrl('banner')) }}"
                                data-bg="{{ asset($item->getFirstMediaUrl('banner')) }}" data-ll-status="loaded">
                                <div class="bg-overlay"></div>
                                <div class="bg-overlay"></div>

                                <div class="container-fluid" style="padding: 32% 0 0 4%;">
                                    <div class="slide-caption-hide" style="color: #fff;">
                                        <div class="animated visible bounceInDown animete__animated animete__bounceInDown"
                                            data-animate-delay="600" data-animate="bounceInDown">
                                            <h2 style="font-size: 40px; color:#fff;">M I B &nbsp;S t u d i o</h2>
                                            <h2 style="font-size: 30px; color:#fff;">MIB ARCHITECTURE AND CONSTRUCTION</h2>
                                            <ul style="margin-left: 50px; font-size: 24px;">
                                                <li>Design</li>
                                                <li>Architecure</li>
                                                <li>Construcion</li>
                                                <li>Interior</li>
                                                <li>Renovate</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block d-sm-none">
            <div id="slider" class="inspiro-slider slider-fullscreen dots-creative flickity-enabled is-fade"
                data-fade="true" data-items="3" data-arrows="true" data-dots="true" style="max-height: 900px;">
                @foreach($slide as $item)
                    <div class="slide kenburns lazy-bg bg-loaded" data-bg-image="{{ asset($item->getFirstMediaUrl('banner_mobile')) }}"
                        data-bg="{{ asset($item->getFirstMediaUrl('banner_mobile')) }}" data-ll-status="loaded">
                        <div class="bg-overlay"></div>
                        <div class="bg-overlay"></div>
                        <div class="container-fluid" style="padding: 80% 0 0 4%;">
                            <div class="slide-caption-hide" style="color: #fff;">
                                <div class="animated visible bounceInDown animete__animated animete__bounceInDown"
                                    data-animate-delay="600" data-animate="bounceInDown">
                                    <h2 style="font-size: 24px; color:#fff; text-align: center;">M I B &nbsp;S t u d i o</h2>
                                    <h2 style="font-size: 20px; color:#fff; text-align: center;">MIB ARCHITECTURE AND
                                        CONSTRUCTION</h2>
                                    <ul style="margin-left: 120px; font-size: 18px;">
                                        <li>Design</li>
                                        <li>Architecure</li>
                                        <li>Construcion</li>
                                        <li>Interior</li>
                                        <li>Renovate</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
