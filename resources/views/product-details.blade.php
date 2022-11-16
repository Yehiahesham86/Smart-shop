@extends('layouts.app')
@section('loc')
../
@endsection
@section('nav')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{$product_details->name}}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a> <i
                            class="lni lni-chevron-right"></i> <a href="javascript:void(0)">Shop</a>
                        <i class="lni lni-chevron-right"></i><a href="javascript:void(0)">Single Product</a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src="../image/{{$product_details->cover_path}}" id="current" width="600px"
                                    height="350" alt="#">
                            </div>
                            <div class="images">
                                @foreach ($photos as $photos )


                                <img src="../image/{{$photos->path}}" class="img" alt="#">

                                @endforeach
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{$product_details->name}}</h2>
                        <p class="category"><i class="lni lni-tag"></i>Brand : {{$brand->name}}</p>
                        @if ($product_details->discount >0)
                        <h3 class="price">
                            ${{$product_details->price-$product_details->discount*$product_details->price/100}}<span>${{$product_details->price}}</span>
                        </h3>
                        @else
                        <h3 class="price">${{$product_details->price}}</h3>
                        @endif
                        <p class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group color-option">
                                    <label class="title-label" for="size">Choose color</label>
                                    <div class="single-checkbox checkbox-style-1">
                                        <input type="checkbox" id="checkbox-1" checked="">
                                        <label for="checkbox-1"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-2">
                                        <input type="checkbox" id="checkbox-2">
                                        <label for="checkbox-2"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-3">
                                        <input type="checkbox" id="checkbox-3">
                                        <label for="checkbox-3"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-4">
                                        <input type="checkbox" id="checkbox-4">
                                        <label for="checkbox-4"><span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">
                                    <label for="color">Quantity</label>
                                    <select class="form-control" id="qty">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-4 col-md-4 col-12">
                                    @if (!Auth::guest())
                                    <!----->

                                    @if (is_null($cart))

                                    <div class="button cart-button" id="doneadd">
                                        <button class="btn" style="width: 100%;"
                                            onclick="addtocart({{$product_details->id}})"> <i
                                                class="fas fa-cart-plus"></i>Add to Cart</button>
                                    </div>

                                    @else
                                    <div class="button cart-button" id="doneadd">
                                        <button class="btn" style="width: 100%;" onclick="delcart({{$cart->id}})"> <i
                                                class="fa fa-check-circle"></i>Added to cart</button>
                                    </div>
                                    @endif



                                    <!----->
                                    @else
                                    <div class="button ">
                                        <a class="btn" style="width: 100%;" href="{{route('login')}}">Add to Cart</a>
                                    </div>
                                    @endif


                                </div>

                                <div class="col-lg-4 col-md-4 col-12">

                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button" id="wishbtn">

                                        @if (!Auth::guest())
                                        <!---->
                                        @if (is_null($wish))
                                        <button class="btn" onclick="add({{$product_details->id}})"><i
                                                class="lni lni-heart"></i> To Wishlist</button>

                                        @else
                                        <button class="btn btn-primary text-white" onclick="del({{$wish->id}})"><i
                                                class="fa fa-check-circle"></i>Wishlisted</button>

                                        @endif

                                        <!---->
                                        @else

                                        <a href="{{route('login')}}" class="btn"><i class="lni lni-heart"></i> To
                                            Wishlist</a>

                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="m-2" id="doneadd"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="info-body custom-responsive-margin">
                            {!!$product_details->discription!!} 
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="info-body">
                            <h4>Specifications</h4>
                            <ul class="normal-list">
                                <li><span>Weight:</span> 35.5oz (1006g)</li>
                                <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                <li><span>Operating Frequency:</span> 2.4GHz</li>
                                <li><span>Manufacturer:</span> GoPro, USA</li>
                            </ul>
                            <h4>Shipping Options:</h4>
                            <ul class="normal-list">
                                <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <section>

                <div class="row  section">
                    <h3 class="justify-content-start m-2">similar products</h3>
                    @foreach ($similar as $similar)


                    <div class="col-lg-3 col-md-4 col-6">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="../image/{{$similar->cover_path}}" alt="#" width="300px" height="300px">
                                @if ($similar->discount>0)
                                <span class="sale-tag">-{{$similar->discount}}%</span>
                                @endif
                                <div class="button">
                                    <a target="_blank" href="{{route('product_details',['id'=>$similar->id])}}"
                                        class="btn"><i class="lni lni-cart"></i>Details</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{$categories->name}}</span>
                                <h4 class="title">
                                    <a target="_blank"
                                        href="{{route('product_details',['id'=>$similar->id])}}">{{$similar->name}}</a>
                                </h4>
                                <ul class="review">
                                    @for ($i=0 ;$i<$similar->rate; $i++)
                                        <li><i class="lni lni-star-filled"></i></li>
                                        @endfor
                                        <li><span>{{$similar->rate}} Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    @if ($similar->discount >0)
                                    <div class="price">${{$similar->price - $similar->discount*$similar->price/100}}
                                        <span class="discount-price">{{$similar->price}}</div>
                                    @else
                                    <div class="price">${{$similar->price}}</div>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>


                    @endforeach

                </div>
            </section>
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="single-block give-review">
                        <h4>{{$product_details->rate}} (Overall)</h4>
                        <ul>
                            <li>
                                <span>5 stars - {{$stars5}}</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                            </li>
                            <li>
                                <span>4 stars - {{$stars4}}</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>3 stars - {{$stars3}}</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>2 stars - {{$stars2}}</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                            <li>
                                <span>1 star - {{$star1}}</span>
                                <i class="lni lni-star-filled"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                                <i class="lni lni-star"></i>
                            </li>
                        </ul>
                        @if (!Auth::guest())
                        @if (is_null($review))
                        <button type="button" class="btn review-btn">
                            <i class="fa-solid fa-lock ms-2"></i> Leave a Review (Not purchased)
                        </button>
                        @else
                        <button type="button" class="btn review-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Leave a Review
                        </button>
                        @endif

                        @else
                        <a type="button" href="{{route('login')}}" class="btn review-btn">
                            <i class="fa-solid fa-lock ms-2"></i> Leave a Review
                        </a>
                        @endif



                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="single-block">
                        <div class="reviews">
                            <h4 class="title">Latest Reviews</h4>
                           
                            @foreach ( $reviews as $reviews )     
                            <div class="single-review">
                                <img src="@yield('loc')/assets/images/blog/comment1.jpg" alt="#">
                                <div class="review-info">
                                    <h4>{{$reviews->subject}}
                                        <span>{{$reviews->user_name}}
                                        </span>
                                    </h4>
                                    <ul class="stars">
                                        @for ($i=0 ;$i<$reviews->rate; $i++)
                                        <li><i class="lni lni-star-filled"></i></li>
                                        @endfor
                                    </ul>
                                    <p>{{$reviews->discription}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if (!Auth::guest())
@if (is_null($review))

@else
<div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-name">Your Name</label>
                            <input class="form-control" type="text" id="review-name" readonly
                                value="{{auth::user()->name}}" required="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-email">Your Email</label>
                            <input class="form-control" type="email" id="review-email" readonly
                                value="{{auth::user()->email}}" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-subject">Subject</label>
                            <input class="form-control" type="text" id="review-subject" required="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-rate">Rating</label>
                            <select class="form-control" id="review-rate">
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="review-message">Review</label>
                    <textarea class="form-control" id="review-message" rows="8" required=""></textarea>
                </div>
            </div>
            
            <div class="modal-footer">
                <div id="state"></div>
                <button type="button" class="ms-5 btn btn-primary" onclick="addreview()">Submit Review</button>
            

            </div>
        </div>
    </div>
</div>
@endif

@else

@endif


@endsection
@section('script')
<script>
    function add(str) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = {

            'product_id': str,

        }
        $.ajax({

            type: "POST",
            url: "{{route('wishlist_add')}}",
            data: data,
            dataType: 'json',
            success: function (response) {

                document.getElementById("wishbtn").innerHTML = "";


                $("#wishbtn").append('<button class="btn btn-primary text-white" onclick="del(' + response.del + ')"><i class="fa fa-check-circle"></i>Wishlisted</button>');






            }



        })
    }

    function del(str) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = {

            'id': str,

        }
        $.ajax({

            type: "POST",
            url: "{{route('wishlist_delete')}}",
            data: data,
            dataType: 'json',
            success: function (response) {

                document.getElementById("wishbtn").innerHTML = "";

                document.getElementById("wishbtn").innerHTML = '<button class="btn" onclick="add(' + response.add + ')"><i class="lni lni-heart"></i> To Wishlist</button>';







            }



        })
    }

    function addtocart(str) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = {

            'product_id': str,
            'qty': $('#qty').val(),

        }
        $.ajax({

            type: "POST",
            url: "{{route('addtocart')}}",
            data: data,
            dataType: 'json',
            success: function (response) {

                document.getElementById("doneadd").innerHTML = "";
                $("#doneadd").append('<button class="btn" style="width: 100%;" onclick="delcart(' + response.addcart + ')" > <i class="fa fa-check-circle"></i>Added to cart</button>');








            }



        })
    }

    function delcart(str) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = {

            'id': str,

        }
        $.ajax({

            type: "POST",
            url: "{{route('deletecart')}}",
            data: data,
            dataType: 'json',
            success: function (response) {

                document.getElementById("doneadd").innerHTML = "";
                $("#doneadd").append('<button class="btn" style="width: 100%;" onclick="addtocart(' + response.addcart + ')" > <i class="fas fa-cart-plus"></i>Add to Cart</button>');








            }



        })
    }

    function addreview() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = {{ $product_details-> id
    }}
    var data = {

        'product_id': id,
        'subject': $('#review-subject').val(),
        'discription': $('#review-message').val(),
        'rate': $('#review-rate').val(),

    }
    $.ajax({

        type: "POST",
        url: "{{route('add_review')}}",
        data: data,
        dataType: 'json',
        success: function (response) {

          
            if (response.validerror) {
                    document.getElementById("state").innerHTML = "";

                    $("#state").append('<label class="form-control alert alert-danger"> <i class="fa-solid fa-circle-xmark"></i> ' + response.validerror + '</label>');
                }
                else{
                    document.getElementById("state").innerHTML = "";

                    $("#state").append('<label class="form-control alert alert-success"> <i class="fa-solid fa-circle-check"></i> Thanks For Review </label>');

                }






        }



    })
    }
</script>
@endsection