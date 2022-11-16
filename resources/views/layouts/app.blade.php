<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ShopGrids</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="@yield('loc')assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <!-- CSS only -->
@yield('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.min.css" />

    <link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">


</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    @yield('preloader')

    <!-- Start Header Area -->
    <header class="header navbar-area  ">
        <!-- Start Topbar -->
        <div class="topbar bg-dark ">

        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{route('home')}}">
                            {!! Html::image('assets/images/logo/logo.svg') !!}

                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">

                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+100) 568 487 6321</span>
                                </h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                @if (Route::has('login'))

                                <div class="top-end">
                                    @auth
                                    <div class="user">
                                        <ul class="d-flex">
                                            <div class="dropdown">
                                                <a class="btn btn-primary dropdown-toggle text-capitalize" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="lni lni-user"></i> Hello {{ Auth::user()->name }}
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="{{route('myprofile')}}"><i class="fa-solid fa-circle-user"></i> My Profile</a></li>
                                                   
                                                    <li><a class="dropdown-item" href="{{route('myorders')}}">     <i class="fa-solid fa-truck"></i>  My orders</a></li>

                                                    <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                          <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                                        </a></li>
                                                        
                                                </ul>
                                            </div>



                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                    </div>
                                    </li>
                                    </ul>
                                </div>

                                @else
                                <ul class="user-login d-flex">
                                    <li>
                                        <a class="btn btn-primary m-1" href="{{ route('login') }}">LogIn</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li>
                                        <a class="btn btn-primary m-1" href="{{ route('register') }}">Register</a>
                                    </li>
                                    @endif
                                </ul>
                                @endauth
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-8 col-md-6 col-md-6 col-12">
                    <div class="nav-inner  justify-content-end">

                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn btn btn-lg" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">

                                <ul id="nav" class="navbar-nav ms-auto">
                                    <!-- Start Mega Category Menu -->
                                    <li class="nav-item border-bottom">
                                        <a class="dd-menu collapsed  " href=""
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">All Categories</a>
                                        <ul class="sub-menu collapse border" id="submenu-1-1">
                                            <!--DB_catigories-->


                                            <!--END DB-->
                                        </ul>

                                    </li>
                                    <li class="nav-item"><a href="{{route('home')}}" class="@yield('home')"
                                            aria-label="Toggle navigation">Home</a> </li>
                                    <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                    <li class="nav-item"><a class="@yield('contact')" href="{{route('contact_us')}}">contact Us</a></li>
                                       
                                    @if (!Auth::guest())
                                    @if (auth::user()->role == '2IsMJXAEa84z' or auth::user()->role == 'GQNkMkboa9fd')
                                    <li class="nav-item"><a href="{{route('QqBBKhIpDOYn8oR')}}">Dashboard</a></li>
                                    @endif
                                        @endif

                                </ul>


                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                @if (!Auth::guest())

                <div class=" col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- Start Nav Social -->
                    
                    <div class="navbar-cart">
                        <div class="wishlist">
                            <a href="{{route('myorders')}}">
                                <i class="fa-solid fa-truck"></i>
                                <span class="total-items" id="my_orders"></span>
                            </a>
                        </div>
                       
                        <div class="wishlist ">
                            <a href="{{route('wishlist')}}">
                                <i class="fa-solid fa-heart"></i>
                                <span class="total-items" id="total_wish"></span>
                            </a>
                        </div>
                        <div class="cart-items">
                            <a href="{{route('mycart')}}" class="main-btn">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="total-items" id="total_cart"></span>
                            </a>
                          
                        </div>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
            @endif


        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->
    @yield('nav')
    @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">

                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row ms-5">
                      
                        <div class="col-lg-4 col-md-6 col-12  ">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: +1 (900) 33 169 7720</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">support@shopgrids.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                       <!-- <div class="col-lg-3 col-md-6 col-12">
                             Single Widget 
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            End Single Widget 
                        </div>-->
                        <div class="col-lg-3 col-md-6 col-12 ms-2 ">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul id="footer_cati">
                             
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        
                    </div>
            
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="@yield('loc')assets/images/footer/credit-cards-footer.png" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">

                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <!-- JavaScript Bundle with Popper -->
    
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/js/glightbox.min.js"></script>
    <script src="@yield('loc')assets/js/app-blade.js"></script>
    <script src="@yield('loc')assets/js/main.js"></script>
   

    @yield('script')

</body>


</html>