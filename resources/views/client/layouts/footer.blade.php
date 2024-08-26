<!--=================================
 footer -->
<!-- start: Footer -->
<footer id="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="col-2">
                            <h1 style="float: right;"><i class="icon-map-pin"></i>
                            </h1>
                        </div>
                        <div class="col-10">
                            <span
                                style="font-weight: bold;">Address<br></span>
                            <span>
                                ORCHID HEALTHCARE CO.,Ltd<br>
                                บริษัท ออร์คิด เฮลธ์แคร์ จำกัด<br>
                                508/26 ถนนสุคนธสวัสดิ์ แขวงลาดพร้าว<br>
                                เขตลาดพร้าว กรุงเทพฯ 10230</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h1 style="float: right;"><i class="icon-phone"></i>
                            </h1>
                        </div>
                        <div class="col-10">
                            <span
                                style="font-weight: bold;">Contact<br></span>
                            <p>โทรศัพท์ : 044-342-545</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <div class="social-icons social-icons-medium social-icons-border social-icons-rounded social-icons-colored-hover">
                                <ul>
                                    <li class="social-facebook">
                                        <a target="_blank" href="{{ setting('facebook_info') }}">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="social-line">
                                        <a target="_blank" href="{{ setting('line_info') }}">
                                            <i class="fab fa-line"></i>
                                        </a>
                                    </li>
                                    <li class="social-digg">
                                        <a href="tel:{{ setting('telle') }}">
                                            <i class="icon-phone"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="text-center mt-4">
                        <img alt="image" src="{{ asset('images/lineqr-code.png') }}"
                            style="margin-right: 20px; max-width: 150px; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="copyright-content" style="background-color: #103A72">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="font-size: 16px;">
                    <div class="copyright-text" style="color: white;">
                        © 2022 ORCHID HEALTHCARE DESIGNED BY
                        <a href="https://meeting.co.th/" style="color: white;"> MEETING CREATIVE.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end: Footer -->

<style>
    .kc_fab_wrapper {
        right: 6px;
        bottom: 70px;
    }
</style>

@push('js')
    <script>
        var links = [{
                "bgcolor": "#0a2946",
                "icon": "<i class='fas fa-comment-dots'></i>"
            },

            @if (setting('telle') != '#')
                {
                    "url": "{{ setting('telle') }}",
                    "bgcolor": "#DB4A39",
                    "color": "#fffff",
                    "icon": "<i class='fas fa-mobile-alt'></i>",
                    "target": "_blank",
                    "title": "{{ setting('telle') }}"
                },
            @endif

            // @if (setting('info_telephone2') != '#')
            //     {
            //         "url": "{{ setting('info_telephone2') }}",
            //         "bgcolor": "#DB4A39",
            //         "color": "#fffff",
            //         "icon": "<i class='fas fa-phone'></i>",
            //         "target": "_blank",
            //         "title": "{{ setting('info_telephone2') }}"
            //     },
            // @endif

            @if (setting('facebook_info') != '#')
                {
                    "url": "{{ setting('facebook_info') }}",
                    "bgcolor": "#3B5998",
                    "color": "#fffff",
                    "icon": "<i class='fab fa-facebook-f'></i>",
                    "target": "_blank",
                    "title": "facebook"
                },
            @endif

            @if (setting('line_info') != '#')
                {
                    "url": "{{ setting('line_info') }}",
                    "bgcolor": "green",
                    "color": "#fffff",
                    "icon": "<i class='fab fa-line'></i>",
                    "target": "_blank",
                    "title": "line"
                },
            @endif
        ]
        $('.kc_fab_wrapper').kc_fab(links);
    </script>
@endpush
