<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO TAG default --}}
    <meta name="description" content="@yield('meta_tag_description',setting('meta_description'))">
    <meta name="keywords" content="@yield('meta_tag_keyword',setting('meta_keyword'))">


    <title>@if(empty(setting('title'))) {{ config('app.name', 'Meeting') }} @else {{setting('title')}} @endif</title>
    <link rel="shortcut icon"
          href="@if(empty(setting('favicon'))) {{asset('images/noimage.jpg')}} @else {{asset(setting('favicon'))}} @endif"/>

    @yield('meta_og',view('client.meta-og-default'))

    <link href="{{asset('css/client/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('css/client/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/client/my_style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link href="{{asset('fonts/client/myfont.css')}}" rel="stylesheet">
    <link href="{{asset('css/client/kc.fab.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/client/rateit/rateit.css')}}" rel="stylesheet">
    {{-- font awsome  --}}
    <script src="https://kit.fontawesome.com/d8d8ef309d.js" crossorigin="anonymous"></script>
</head>
<style>
    .mega-menu .menu-links > li > a {
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }

    #scrollTop {
        right: 32px !important;
    }

    .floating-container {
            position: fixed;
            width: 100px;
            height: 140px;
            bottom: 0;
            right: 0;
            margin: 120px 25px;
        }

        .floating-container .floating-button {
            position: absolute;
            width: 65px;
            height: 65px;
            background: #2cb3f0;
            bottom: 0;
            border-radius: 50%;
            left: 0;
            right: 0;
            margin: auto;
            color: white;
            line-height: 65px;
            text-align: center;
            font-size: 23px;
            z-index: 100;
            box-shadow: 0 10px 25px -5px rgba(44, 179, 240, 0.6);
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .floating-container .float-element {
            position: relative;
            display: block;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: 15px auto;
            color: white;
            font-weight: 500;
            text-align: center;
            line-height: 50px;
            z-index: 0;
            opacity: 0;
            -webkit-transform: translateY(100px);
            transform: translateY(100px);
        }

        .floating-container .float-element .material-icons {
            vertical-align: middle;
            font-size: 16px;
        }

        .floating-container .float-element:nth-child(1) {
            background: #42A5F5;
            box-shadow: 0 20px 20px -10px rgba(66, 165, 245, 0.5);
        }

        .floating-container .float-element:nth-child(2) {
            background: #4CAF50;
            box-shadow: 0 20px 20px -10px rgba(76, 175, 80, 0.5);
        }

        .floating-container .float-element:nth-child(3) {
            background: #FF9800;
            box-shadow: 0 20px 20px -10px rgba(255, 152, 0, 0.5);
        }

        .subbtn2 {
            width: 50px;
            height: 50px;
            background: red;
            bottom: 0;
            border-radius: 50%;
            left: 0;
            right: 0;
            margin: auto;
            color: white;
            line-height: 50px;
            text-align: center;
            font-size: 23px;
            z-index: 100;
            cursor: pointer;
        }

        .rotate {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .rotate-up {
            transform: translateX(-50%) translateY(-50%) rotate(-90deg)
        }

        .rotate-down {
            transform: translateX(-50%) translateY(-50%) rotate(90deg)
        }

        /*.kc_fab_wrapper {
        right: 6px;
        bottom: 70px;
        }*/
</style>
<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-230657368-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-230657368-1');
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=1121652038270968&autoLogAppEvents=1"
        nonce="3MfEOMmh"></script>
<div class="body-inner">
    @include('client.layouts.header')
    @yield('content')
</div>


{{-- @include('client.layouts.footer') --}}
<!-- Contact Section End -->
<div class="kc_fab_wrapper" >

</div>


<!-- Google recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- custom -->
<script src="{{asset('js/client/jquery.js')}}"></script>
<script src="{{asset('js/client/plugins.js')}}"></script>
<!--Template functions-->
<script src="{{asset('js/client/functions.js')}}"></script>
<script src="{{asset('js/client/kc.fab.min.js')}}"></script>
<script src="{{asset('plugins/client/rateit/jquery.rateit.min.js')}}"></script>
<script>
    var links = [{
            "bgcolor": "#484848",
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
@stack('js')
</body>
</html>

