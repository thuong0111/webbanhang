<header>
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav>
                <div class="header-top">
                    <div class="col-6">
                        <a href=""><i  class="fa fa-phone"></i>0384588072</a>
                        <a href=""><i  class="fa fa-envelope"></i> hotro@gmail.com</a>
                        <a href=""><i  class="fa fa-clock"></i> Từ thứ 2 - thứ 7</a>
                    </div>
                    <div class="col-6 text-right">
                        <a href=""><i  class="social fab fa-facebook-square"></i></a>
                        <a href=""><i  class="social fab fa-twitter"></i></a>
                        <a href=""><i  class="social fab fa-instagram"></i></a>
                        {{-- <a href="#" data-toggle="modal" data-target="#loginbox"> --}}
                            {{-- @if (Auth::check())
                            {{Auth::user()->name}}
                            @else
                            <i  class="social fa fa-users"></i>
                            @endif --}}
                            @auth
                                <div class="top-nav clearfix" style="display:inline-flex;">
                                    <!--search & user info start-->
                                    <ul class="nav pull-right top-menu">

                                        <!-- user login dropdown start-->
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                    {{Auth::user()->name}}
                                            </a>
                                            <ul class="dropdown-menu extended logout">
                                                <li><a href="{{route('profile')}}" style="color:#9ca71e"><i class=" fa fa-suitcase" style="margin-right: 25px;"></i>Profile</a></li>
                                                <li><a href="" style="color:#9ca71e"><i class="fa fa-cog" style="margin-right: 20px;"></i> Cài đặt</a></li>
                                                <li><a href="{{route('logout')}}" style="color:#9ca71e"><i class="fa fa-key" style="margin-right: 25px;"></i>Logout</a></li>
                                            </ul>
                                        </li>
                                        <!-- user login dropdown end -->
                                    </ul>
                                    <!--search & user info end-->
                                </div>
                                {{-- <a href="{{route('logout')}}">Logout</a> --}}
                            @endauth

                            @guest
                                <a href="{{route('login_user')}}">Login</a>
                            @endguest
                        </a>
                    </div>
                </div>
            </nav>

            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="/template/images/logo3.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="/">
                            <i class="fa fa-home"></i> Home</a> 
                        </li>

                        {!! $menusHtml !!}

                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    {{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div> --}}
                    <form action="/timkiem" method="GET">
                    <div class="logo"style="border-radius: 16px">
                        <input type="text" style="border-radius: 16px;width:300px;padding-left:18px" id="myInput" name="key" placeholder="Search..." a href=""><i class="zmdi zmdi-search" style="position: relative;
                        margin-left: -24px;"></i></a>
                    </div>
                     </form>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart" style="font-size: 25px;"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <nav>
        <div class="header-top">
            <div class="col-6">
                <a href=""><i  class="fa fa-phone"></i>0384588072</a>
                <a href=""><i  class="fa fa-envelope"></i> hotro@gmail.com</a>
                <a href=""><i  class="fa fa-clock"></i> Từ thứ 2 - thứ 7</a>
            </div>
            <div class="col-6 text-right">
                <a href=""><i  class="social fab fa-facebook-square"></i></a>
                <a href=""><i  class="social fab fa-twitter"></i></a>
                <a href=""><i  class="social fab fa-instagram"></i></a>
                <a href="#" data-toggle="modal" data-target="#loginbox"><i  class="social fa fa-users"></i></a>
            </div>
        </div>
    </nav>
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/"><img src="/template/images/logo3.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" 
                data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu">
                <a href="/">Home</a>
            </li>
            {!! $menusHtml !!}    
            
            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    {{-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search"> --}}
        <div class="container-search-header">
            <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <form action="/timkiem" method="GET">
                        <div class="logo"style="border-radius: 16px">
                            <input type="text" style="border-radius: 16px;width:500px;padding-left:18px; margin-left: -24px;" id="myInput" name="key" placeholder="Search..." a href="">
                                {{-- <i class="zmdi zmdi-search" style="position: relative;">
                                </i> --}}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</header>
