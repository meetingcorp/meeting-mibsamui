@extends('client.layouts.app')
@section('content')
    <section id="page-title" data-bg-parallax="{{ asset(setting('news')) }}">
        <div class="bg-overlay"></div>
        <div class="bg-overlay"></div>
        <div class="container" style="margin-top:10%; margin-bottom:5%;">
            <div class="page-title">
                <h1>Contact</h1>
                <span>The most happiest time of the day!.</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li class="active"><a href="#">Contact</a> </li>
                </ul>
            </div>
        </div>
    </section>
    <footer id="footer" style="margin-top: -30px;;">
        <div class="footer-content">
            <div class="container">
                <div class="text-center" style="margin-bottom:-20px; margin-top:-15px;">
                    <p style="font-size:36px; color:#000000 !important;">MIB <span
                            style="font-size: 36px; color:#000000;">Studio</span></p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12" style="padding-top: 40px;">
                        <form action="{{ route('notify') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for=name>Name</label>
                                    <input type="text" aria-required="true" class="form-control required" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Email">Email</label>
                                    <input type="email" aria-required="true" class="form-control required" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for=subject>Your Title</label>
                                    <input type="text" aria-required="true" class="form-control required" name="title" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Email">Your Subject</label>
                                    <textarea type="text" require row="10" style="height:150px;" class="form-control required" name="subject"></textarea>
                                </div>
                            </div>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <button class="btn btn-dark mt-2" style="border-radius:4px; font-size:12px;" type="submit"><i
                                    class="fa fa-paper-plane"></i>&nbsp;&nbsp;ส่ง</button>
                        </form>
                    </div>


                    <div class="col-lg-6 d-none d-sm-block" style="padding:40px 15px 0 15px;">
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-clock-o" aria-hidden="true"
                                    style="font-size:45px; margin:30px 0 0 30px;"></i>
                            </div>
                            <div class="col-5">
                                <label style="font-weight: bold; font-size:16px; margin:0 0 0 40px;">วันทำการ<br>
                                    <p style="font-size:14px;">ทุกวัน<br>
                                        10.00 AM - 19.00 PM
                                    </p>
                                </label>
                            </div>
                            <div class="col-1">
                                <i class="fa fa-map-marker" aria-hidden="true"
                                    style="font-size:45px; margin:30px 0 0 -5px;"></i>
                            </div>
                            <div class="col-5">
                                <label style="font-weight: bold; font-size:16px; margin: 0 0 0 -5px;">ที่อยู่<br>
                                    <p style="font-size:14px;"> 107/65 อำเภอเกาะสมุย<br>สุราษฎร์ธานี 84310 <br>โทรศัพท์ :
                                        {{setting('telle')}}
                                    </p>
                                </label>
                            </div>

                        </div>
                        <div style="width: 100%; border-radius: 50px;">
                            {!! setting('map_info') !!}
                        </div>
                    </div>

                    <div class="col-sm-12 d-block d-sm-none" style="padding:30px 15px 0 15px;">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-clock-o" aria-hidden="true"
                                            style="font-size:60px; margin:15px 0 0 32px;"></i>
                                    </div>
                                    <div class="col-8">
                                        <label style="font-weight: bold; font-size:16px;">วันทำการ<br>
                                            <p style="font-size:14px;">ทุกวัน<br>
                                                10.00 AM - 19.00 PM
                                            </p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-map-marker" aria-hidden="true"
                                            style="font-size:60px; margin:15px 0 0 40px;"></i>
                                    </div>
                                    <div class="col-8">
                                        <label style="font-weight: bold; font-size:16px;">ที่อยู่<br>
                                            <p style="font-size:14px;"> 107/65 อำเภอเกาะสมุย<br>สุราษฎร์ธานี 84310
                                                <br>โทรศัพท์ : {{setting('telle')}}
                                            </p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%; border-radius: 50px;">
                            {!! setting('map_info') !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">© 2022 MIB STUDIO ALL RIGHTS RESERVED.
                    <a href="#" target="_blank" rel="noopener">DESIGNED BY MEETING CREATIVE</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
