<!DOCTYPE html>
<html lang="zxx">

<head>
    <title> Shop Demo </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Lorem ipsum dolor sit,Nulla pellentesque dolor ipsum laoreet eleifend integer,Pellentesque maximus libero.Lorem ipsum dolor sit,Nulla pellentesque dolor ipsum laoreet eleifend integer,Pellentesque maximus libero." />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

    <!-- /vue -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- /vue -->

</head>

<body>
<div class="main1-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <!-- nav -->
            <div class="top-w3pvt d-flex">
                <div id="logo">
                    <h1> <a href="{{route('home')}}"><span class="log-w3pvt">S</span>HOPP</a> <label class="sub-des">Online Store</label></h1>
                </div>

                <div class="forms ml-auto">
                    @guest
                        <a href="/login" class="btn"><span class="fa fa-user-circle-o"></span> Sign In</a>
                        <a href="/register" class="btn"><span class="fa fa-pencil-square-o"></span> Sign Up</a>

                    @else
                        <a href="/dashboard" class="btn"><span class="fa fa-dashboard"></span> Dashboard</a>

                        {{--<a  class="btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="fa fa-dashboard"></span> Dashboard
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('users.edit') }}" class="btn"> <i class="fa fa-pencil-square-o"></i> My Account</a>
                        </div> --}}

                        <a class="btn" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out"></span> Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                    <a href="{{route('cart.index')}}" class="btn"><span class="fa fa-shopping-cart"></span> <bold>{{ Cart::count() }} item(s)</bold></a>
                </div>
            </div>
            <div class="nav-top-wthree">
                <nav>
                    <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu">
                        <li class="{{Request::path() === '/' ? 'active' : ''}}"><a href="/">Home</a></li>
                        <li class="{{Request::path() === 'about' ? 'active' : ''}}"><a href="/about">About Us</a></li>
                        <li class="{{Request::path() === 'shop' ? 'active' : ''}}"><a href="/shop">Shop</a></li>
                        <li class="{{Request::path() === 'cart' ? 'active' : ''}}"><a href="/cart">Cart</a></li>
                        <li class="{{Request::path() === 'contact' ? 'active' : ''}}"><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
                <!-- //nav -->
                <div class="search-form ml-auto">
                    <div class="form-w3layouts-grid">
                        <form action="{{route('search')}}" method="get" class="newsletter">
                            <input class="search" type="search" name="query" id="query"  value="{{ request()->input('query') }}" placeholder="Search here..." required="">
                            <button class="btn search-btn" value=""><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>
</div>
    
    <!-- //header -->

@yield ('content')
@yield ('extra-js')
@yield ('extra-js2')

    <!--/shipping-->
    <section class="shipping-wthree">
        <div class="shiopping-grids d-lg-flex">
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"><span class="fa fa-truck" aria-hidden="true"></span>
                </div>
                <div class="icon-gd-info">
                    <h3>FREE SHIPPING</h3>
                    <p>On all order over $100</p>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd sec text-center">
                <div class="icon-gd"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>FREE Gifts</h3>
                    <p>For All New Customers</p>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"> <span class="fa fa-gift" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>MEMBER DISCOUNT</h3>
                    <p>Register &amp; save up to 20%</p>
                </div>

            </div>
        </div>

    </section>
    <!--//shipping-->

    <!-- footer -->
    <div class="footer_agileinfo_topf py-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-3 footer_wthree_gridf mt-lg-5">
                    <h2><a href="{{route('home')}}"><span>S</span>HOPP
                        </a> </h2>
                    <label class="sub-des2">Online Store</label>
                </div>
                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-4">
                    <ul class="footer_wthree_gridf_list">
                        <li>
                            <a href="{{route('home')}}"><span class="fa fa-angle-right" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="/about"><span class="fa fa-angle-right" aria-hidden="true"></span> About</a>
                        </li>
                        <li>
                            <a href="{{route('shop.index')}}"><span class="fa fa-angle-right" aria-hidden="true"></span> Shop</a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-sm-4 mt-3">
                    <ul class="footer_wthree_gridf_list">

                        <li>
                            <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> Privacy & Policy </a>
                        </li>
                        <li>
                            <a href="/contact"><span class="fa fa-angle-right" aria-hidden="true"></span> Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-sm-4 mt-3">
                    <ul class="footer_wthree_gridf_list">
                        <li>
                            <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> Dashboard </a>
                        </li>

                        <li>
                            <a href="{{route('cart.index')}}"><span class="fa fa-angle-right" aria-hidden="true"></span> Cart </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="w3ls-fsocial-grid">
                <h3 class="sub-w3ls-headf">Like us on Facebook</h3>
                <div class="social-ficons">
                    <ul>
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        {{--<li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                        <li><a href="#"><span class="fa fa-google"></span>Google</a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="move-top text-center mt-lg-4 mt-3">
                <a href="#home"><span class="fa fa-angle-double-up" aria-hidden="true"></span></a>
            </div>
        </div>
    </div>
    <!-- //footer -->

    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p>© 2019 Store. All rights reserved
            <!--  <a href="#"> W3layouts.</a> -->
        </p>

    </div>
    <!-- //copyright -->

</body>

</html>