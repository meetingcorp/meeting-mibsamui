<div class="">
    <header id="header" data-transparent="true" class="dark submenu-light" data-fullwidth="true" style="position: absolute;">
        <div class="header-inner">
            <div class="container">
                <div id="logo" style="padding-left: 150px;">
                    <a href="{{url('/')}}">
                        <span class="logo-default "><img src="{{asset(setting('logoheader'))}}" height="70" style="margin-top:-20px;"></span>
                        <span class="logo-dark "><img src="{{asset(setting('logoheader'))}}" height="70" style="margin-top: -20px; "></span>
                        <span class="logo-responsive"><img src="{{asset(setting('logoheader'))}}" height="60"></span>
                    </a>
                </div>
                <div id="mainMenu-trigger" style="float: left">
                    <a class="lines-button x"><span class="lines"></span> </a>
                </div>
                <div class="header-extras" style="float: right; margin-right: 100px;">
                    <div class="d-none d-sm-block header-extras mt-1 social-icons social-icons-medium social-icons-border social-icons-rounded social-icons-colored-hover" style="padding: 5px;">
                        <ul>
                            <li class="social-facebook">
                                <a target="_blank" href="{{setting('facebook_info')}}">
                                    <i class="fab fa-facebook-f" style="color:white;"></i>
                                </a>
                            </li>
                            <li class="social-instagram">
                                <a target="_blank" href="{{setting('line_info')}}">
                                    <i class="fab fa-line" style="color:white;"></i>
                                </a>
                            </li>
                            <li class="social-digg">
                                <a target="_blank" href="tel:{{setting('telle')}}">
                                    <i class="fas fa-phone" aria-hidden="true" style="color:white;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="mainMenu" class="menu-center mt-2">
                    <div class="container">
                        <nav>
                            <ul>
                                <li>
                                    <a style="font-family: 'Prompt', sans-serif; font-size: 18px !important; " href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                    <a style="font-family: 'Prompt', sans-serif; font-size: 18px !important; " href="{{route('service')}}">Service</a>
                                </li>
                                <li>
                                    <a style="font-family: 'Prompt', sans-serif; font-size: 18px !important; " href="{{route('project')}}">Project</a>
                                </li>
                                <li>
                                    <a style="font-family: 'Prompt', sans-serif; font-size: 18px !important; " href="{{route('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>