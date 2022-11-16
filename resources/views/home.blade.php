@extends('layouts.app')
@section('preloader')
        <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- /End Preloader -->
@endsection
@section('loc')
    
@endsection
@section('content')
      <!-- Start Hero Area -->


      <section class="hero-area">
        <div class="container">
           

            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(assets/images/hero/slider-bg1.jpg);">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(assets/images/hero/slider-bg2.jpg);">
                                <div class="content">
                                    <h2><span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <h3><span>Combo Only:</span> $590.00</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('assets/images/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                    <button class="btn btn-primary m-2">Shop now</button>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Popular Product</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                
                @foreach ($products as $products)


                <div class="col-lg-3 col-md-4 col-6">

                    <div class="single-product">
                        <div class="product-image">
                            <img src="image/{{$products->cover_path}}" alt="#" width="300px" height="300px">
                            @if ($products->discount>0)
                            <span class="sale-tag">-{{$products->discount}}%</span>
                            @endif
                            <div class="button">
                                <a target="_blank" href="{{route('product_details',['id'=>$products->id])}}"
                                    class="btn"><i class="lni lni-cart"></i>Details</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a target="_blank"
                                    href="{{route('product_details',['id'=>$products->id])}}">{{$products->name}}</a>
                            </h4>
                            <ul class="review">
                                @for ($i=0 ;$i<$products->rate; $i++)
                                    <li><i class="lni lni-star-filled"></i></li>
                                    @endfor
                                    @for ($i=0 ;$i<(5-$products->rate); $i++)
                                    <li><i class="lni lni-star"></i></li>
                                    @endfor
                                    <li><span>{{$products->rate}} Review(s)</span></li>
                            </ul>
                            <div class="price">
                                @if ($products->discount >0)
                                <div class="price"><span class="price">${{$products->price - $products->discount*$products->price/100}}</span>
                                    <span class="discount-price">{{$products->price}}</div>
                                @else
                                <div class="price"><span class="price">${{$products->price}}</span></div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>


                @endforeach
                
                
                
                
              
                
                
                
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->


    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('assets/images/banner/banner-1-bg.jpg')">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                        style="background-image:url('assets/images/banner/banner-2-bg.jpg')">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!-- Start special-offer Area -->
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Special Offer</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">

                            <div class="single-product">
                                <div class="product-image">
                                    <img src="assets/images/products/product-3.jpg" alt="#">
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Camera</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">WiFi Security Camera</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$399.00</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-12">

                            <div class="single-product">
                                <div class="product-image">
                                    <img src="assets/images/products/product-8.jpg" alt="#">
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Laptop</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">Apple MacBook Air</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$899.00</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-12">

                            <div class="single-product">
                                <div class="product-image">
                                    <img src="assets/images/products/product-6.jpg" alt="#">
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Speaker</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">Bluetooth Speaker</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star"></i></li>
                                        <li><span>4.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$70.00</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="single-banner right"
                        style="background-image:url('assets/images/banner/banner-3-bg.jpg');margin-top: 30px;">
                        <div class="content">
                            <h2>Samsung Notebook 9 </h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="price">
                                <span>$590.00</span>
                            </div>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="offer-content">
                        <div class="image">
                            <img src="assets/images/offer/offer-image.jpg" alt="#">
                            <span class="sale-tag">-50%</span>
                        </div>
                        <div class="text">
                            <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$200.00</span>
                                <span class="discount-price">$400.00</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
                                eiusmod tempor labores.</p>
                        </div>
                        <div class="box-head">
                            <div class="box">
                                <h1 id="days">135</h1>
                                <h2 id="daystxt">Days</h2>
                            </div>
                            <div class="box">
                                <h1 id="hours">19</h1>
                                <h2 id="hourstxt">Hours</h2>
                            </div>
                            <div class="box">
                                <h1 id="minutes">30</h1>
                                <h2 id="minutestxt">Minutes</h2>
                            </div>
                            <div class="box">
                                <h1 id="seconds">17</h1>
                                <h2 id="secondstxt">Secondes</h2>
                            </div>
                        </div>
                        <div style="background: rgb(204, 24, 24);" class="alert">
                            <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End special-offer Area -->
    <!-- Start brands Area -->
    <section class="brands">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Popular Brands</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="tns-outer" id="tns2-ow">
                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                            class="current">24 to 28</span> of 8</div>
                    <div id="tns2-mw" class="tns-ovh">
                        <div class="tns-inner" id="tns2-iw">
                            <div class="brands-logo-carousel d-flex align-items-center justify-content-between  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                id="tns2" style="transform: translate3d(-76.6667%, 0px, 0px);">
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/06.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/01.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/02.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/05.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/06.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item0" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/01.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item1" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/02.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item2" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item3" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item4" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/05.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item5" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/06.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item6" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item" id="tns2-item7" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/01.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/02.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned tns-slide-active">
                                    <img src="assets/images/brands/05.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned tns-slide-active">
                                    <img src="assets/images/brands/06.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned tns-slide-active">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned tns-slide-active">
                                    <img src="assets/images/brands/04.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned tns-slide-active">
                                    <img src="assets/images/brands/01.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/02.png" alt="#">
                                </div>
                                <div class="brand-logo tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <img src="assets/images/brands/03.png" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End brands Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->

@endsection
@section('home')
    active
@endsection
