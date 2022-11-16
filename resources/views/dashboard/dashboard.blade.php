<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="@yield('loc')assets/images/favicon.svg" type="image/x-icon" />
  <title>Dashboard</title>

  <!-- ========== All CSS files linkup ========= -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css"
    integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main2.css') }}">

</head>

<body>
  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper" >
    <div class="navbar-logo">
      <a href="{{route('home')}}">
        <img src="@yield('loc')assets/images/logo/logo.svg" width="180" alt="logo" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item  @yield('dashhome')">
          <a  href="{{route('QqBBKhIpDOYn8oR')}}">
            <span class="icon">
              <svg width="30" height="30" viewBox="0 0 22 22">
                <path
                  d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
              </svg>
            </span>
            <span class="text">Dashboard</span>
          </a>

        </li>
        <li class="nav-item @yield('dashusers')">
          <a href="{{route('09ktQ1IXYRvjDjJ')}}" >
            <span class="icon">
              <?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg fill="#13224F" width="30" height="30" version="1.1" id="lni_lni-users" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	 y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
<g>
	<path d="M21.5,36.4c6.8,0,12.3-5.5,12.3-12.3s-5.5-12.3-12.3-12.3S9.2,17.3,9.2,24.1S14.7,36.4,21.5,36.4z M21.5,15.3
		c4.8,0,8.8,3.9,8.8,8.8c0,4.9-3.9,8.8-8.8,8.8s-8.8-3.9-8.8-8.8C12.7,19.2,16.6,15.3,21.5,15.3z"/>
	<path d="M21.5,40.8c-7.3,0-14.3,3-19.7,8.4c-0.7,0.7-0.7,1.8,0,2.5C2.1,52,2.6,52.2,3,52.2c0.5,0,0.9-0.2,1.2-0.5
		c4.7-4.8,10.8-7.4,17.2-7.4c6.3,0,12.4,2.6,17.2,7.4c0.7,0.7,1.8,0.7,2.5,0c0.7-0.7,0.7-1.8,0-2.5C35.7,43.8,28.7,40.8,21.5,40.8z"
		/>
	<path d="M47.8,36.4c3.9,0,7-3.2,7-7s-3.2-7-7-7s-7,3.2-7,7S43.9,36.4,47.8,36.4z M47.8,25.8c1.9,0,3.5,1.6,3.5,3.5
		s-1.6,3.5-3.5,3.5s-3.5-1.6-3.5-3.5S45.9,25.8,47.8,25.8z"/>
	<path d="M62.2,46.5c-5.3-5-12.7-6.9-20.1-5c-0.9,0.2-1.5,1.2-1.3,2.1c0.2,0.9,1.2,1.5,2.1,1.3c6.2-1.6,12.4,0,16.8,4.2
		c0.3,0.3,0.8,0.5,1.2,0.5c0.5,0,0.9-0.2,1.3-0.6C62.9,48.3,62.9,47.2,62.2,46.5z"/>
</g>
</svg>

        
            </span>
            <span class="text" >Users</span>
          </a>
         
        </li>
        <li class="nav-item @yield('dashproduct')">
          <a href="{{route('SKaA6KbPoUjrHB6')}}" >
            <span class="icon">
              <?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg fill="#000000" width="30" height="30" version="1.1" id="lni_lni-dropbox" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	 y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
<path d="M62.6,31l-10.8-7.2l10.9-7.2l0,0c0.7-0.5,1.1-1.2,1.1-2.1c0-0.8-0.5-1.5-1.2-2L47.2,2.4c-0.8-0.5-1.9-0.5-2.7,0L32,10.7l0,0
	l0,0L19.5,2.4c-0.8-0.7-2-0.7-2.9,0L1.3,12.5c-0.7,0.5-1.1,1.2-1.1,2c0,0.8,0.4,1.6,1.1,2l10.8,7.2L1.3,31c-0.7,0.5-1.1,1.2-1.1,2
	c0,0.8,0.4,1.6,1.1,2l9.3,6.2v6.6c0,0.8,0.4,1.6,1.2,2.1l18.9,11.6c0.4,0.3,0.9,0.4,1.3,0.4c0.4,0,0.9-0.1,1.2-0.4l18.9-11.5
	c0.7-0.5,1.1-1.2,1.1-2.1v-6.8l9.3-6.1c0.7-0.5,1.1-1.2,1.1-2C63.7,32.2,63.3,31.4,62.6,31z M32,32.7l-13.4-8.9l7-4.7l6.4-4.2
	l13.4,8.9L45.2,24L32,32.7z M45.9,5.7l13.4,8.9l-10.7,7.1l-13.4-8.9L45.9,5.7z M4.6,14.5l13.5-8.9l10.8,7.1l-13.4,8.9l-0.1,0l-0.1,0
	L4.6,14.5z M15.3,25.9l13.5,9l-10.8,7.1L4.6,33L15.3,25.9z M14.2,43.6l2.5,1.7c0.4,0.3,0.9,0.4,1.4,0.4c0.5,0,0.9-0.1,1.3-0.4
	l10.9-7.2v19.1l-16.1-9.9V43.6z M49.8,47.4l-16.1,9.8V38.1l10.9,7.1c0.4,0.3,0.9,0.4,1.3,0.4s0.9-0.1,1.3-0.4l2.5-1.7V47.4z
	 M46,41.9l-10.8-7.1l13.4-8.9L59.3,33L46,41.9z"/>
</svg>
 </span>
            <span class="text">Product</span>
          </a>
        </li>
        <li class="nav-item @yield('home_page')">
          <a href="{{route('YuwIiNF8LNLKlSm')}}" >
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            </span>
            <span class="text">Home page</span>
          </a>
        
        </li>
        <span class="divider">
          <hr />
        </span>
        <li class="nav-item ">
          <a href="#0" >
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM208 416c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zm272 48c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z"/></svg>
            </span>
            <span class="text">Delivery Price </span>
          </a>
          
        </li>
        <li class="nav-item @yield('dashpay')">
          <a href="{{route('3xwEBay3rvBnzaD')}}" >
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"  viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M168 336C181.3 336 192 346.7 192 360C192 373.3 181.3 384 168 384H120C106.7 384 96 373.3 96 360C96 346.7 106.7 336 120 336H168zM360 336C373.3 336 384 346.7 384 360C384 373.3 373.3 384 360 384H248C234.7 384 224 373.3 224 360C224 346.7 234.7 336 248 336H360zM512 32C547.3 32 576 60.65 576 96V416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H512zM512 80H64C55.16 80 48 87.16 48 96V128H528V96C528 87.16 520.8 80 512 80zM528 224H48V416C48 424.8 55.16 432 64 432H512C520.8 432 528 424.8 528 416V224z"/></svg>
            </span>
            <span class="text">Payments</span>
          </a>
         
        </li>
        <li class="nav-item @yield('dashorders')">
          <a href="{{route('YuwIiNF8LNLghjl')}}" >
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"  viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M128 192C110.3 192 96 177.7 96 160C96 142.3 110.3 128 128 128C145.7 128 160 142.3 160 160C160 177.7 145.7 192 128 192zM200 160C200 146.7 210.7 136 224 136H448C461.3 136 472 146.7 472 160C472 173.3 461.3 184 448 184H224C210.7 184 200 173.3 200 160zM200 256C200 242.7 210.7 232 224 232H448C461.3 232 472 242.7 472 256C472 269.3 461.3 280 448 280H224C210.7 280 200 269.3 200 256zM200 352C200 338.7 210.7 328 224 328H448C461.3 328 472 338.7 472 352C472 365.3 461.3 376 448 376H224C210.7 376 200 365.3 200 352zM128 224C145.7 224 160 238.3 160 256C160 273.7 145.7 288 128 288C110.3 288 96 273.7 96 256C96 238.3 110.3 224 128 224zM128 384C110.3 384 96 369.7 96 352C96 334.3 110.3 320 128 320C145.7 320 160 334.3 160 352C160 369.7 145.7 384 128 384zM0 96C0 60.65 28.65 32 64 32H512C547.3 32 576 60.65 576 96V416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V96zM48 96V416C48 424.8 55.16 432 64 432H512C520.8 432 528 424.8 528 416V96C528 87.16 520.8 80 512 80H64C55.16 80 48 87.16 48 96z"/></svg>                <path
                  d="M13.75 4.58325H16.5L15.125 6.41659L13.75 4.58325ZM4.58333 1.83325H17.4167C18.4342 1.83325 19.25 2.65825 19.25 3.66659V18.3333C19.25 19.3508 18.4342 20.1666 17.4167 20.1666H4.58333C3.575 20.1666 2.75 19.3508 2.75 18.3333V3.66659C2.75 2.65825 3.575 1.83325 4.58333 1.83325ZM4.58333 3.66659V7.33325H17.4167V3.66659H4.58333ZM4.58333 18.3333H17.4167V9.16659H4.58333V18.3333ZM6.41667 10.9999H15.5833V12.8333H6.41667V10.9999ZM6.41667 14.6666H15.5833V16.4999H6.41667V14.6666Z" />
             
            </span>
            <span class="text"> Orders </span>
          </a>
          
        </li>
        
        <span class="divider">
          <hr />
        </span>

        <li class="nav-item">
          <a href="notification.html">
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 96c-17.7 0-32 14.3-32 32s-14.3 32-32 32s-32-14.3-32-32C0 75 43 32 96 32h97c70.1 0 127 56.9 127 127c0 52.4-32.2 99.4-81 118.4l-63 24.5 0 18.1c0 17.7-14.3 32-32 32s-32-14.3-32-32V301.9c0-26.4 16.2-50.1 40.8-59.6l63-24.5C240 208.3 256 185 256 159c0-34.8-28.2-63-63-63H96zm48 384c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40z"/></svg>
            </span>
            <span class="text">Reports</span>
          </a>
        </li>
      </ul>
    </nav>

  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-20">
                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button>
              </div>
              <!----<div class="header-search d-none d-md-flex">
                <form action="#">
                  <input type="text" placeholder="Search..." />
                  <button><i class="lni lni-search-alt"></i></button>
                </form>
              </div>--->
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-6">
            <div class="header-right">
             
              <!-- filter start -->

              <!-- filter end -->
              <!-- profile start -->
              <div class="profile-box ml-15">
                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-info">
                    <div class="info">
                      <h6 class="text-capitalize">{{Auth::user()->name}}</h6>
                      <div class="image">
                        <svg fill="#13224F" width="30" height="30" version="1.1" id="lni_lni-user" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                          <g>
                            <path d="M32,36.4c8.2,0,14.9-6.7,14.9-14.9S40.2,6.5,32,6.5s-14.9,6.7-14.9,14.9S23.8,36.4,32,36.4z M32,10
c6.3,0,11.4,5.1,11.4,11.4c0,6.3-5.1,11.4-11.4,11.4c-6.3,0-11.4-5.1-11.4-11.4C20.6,15.2,25.7,10,32,10z"></path>
                            <path d="M62.1,54.4c-8.3-7.1-19-11-30.1-11s-21.8,3.9-30.1,11C1.1,55,1,56.1,1.7,56.9c0.6,0.7,1.7,0.8,2.5,0.2
c7.7-6.5,17.6-10.1,27.9-10.1s20.2,3.6,27.9,10.1c0.3,0.3,0.7,0.4,1.1,0.4c0.5,0,1-0.2,1.3-0.6C63,56.1,62.9,55,62.1,54.4z"></path>
                          </g>
                        </svg>
                        <span class="status"></span>
                      </div>
                    </div>
                  </div>
                  <i class="lni lni-chevron-down"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                  <li>
                    <a href="{{route('myprofile')}}">
                      <i class="lni lni-user"></i> View Profile
                    </a>
                  </li>
                  
                  <li> <a class="dropdown-item" href="{{ route('logout') }}" 
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="lni lni-exit"></i> {{ __('Logout') }}
                        </a></li>
                        
                </ul>
              </div>
              <!-- profile end -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== header end ========== -->

    <!-- ========== section start ========== -->
   @yield('content')
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 order-last order-md-first">
            <div class="copyright text-center text-md-start">
              
            </div>
          </div>
          <!-- end col-->
          
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST"
  class="d-none">
  @csrf
</form>
  <!-- ========= All Javascript files linkup ======== -->
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

  <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
  <script src="{{ asset('assets/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/fullcalendar.js')}}"></script>
  <script src="{{ asset('assets/js/jvectormap.min.js')}}"></script>
  <script src="{{ asset('assets/js/world-merc.js')}}"></script>
  <script src="{{ asset('assets/js/polyfill.js')}}"></script>
  <script src="{{ asset('assets/js/main2.js')}}"></script>

  @yield('script')
</body>

</html>