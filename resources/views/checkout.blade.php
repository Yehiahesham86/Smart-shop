@extends('layouts.app')
@section('nav')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a> <i
                            class="lni lni-chevron-right"></i>Shop <i class="lni lni-chevron-right"></i><a href="javascript:void(0)">Checkout</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
@section('loc')

@endsection
@section('content')
<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">Your Personal Details <span
                                    class="ms-3"><i class="fa-solid fa-arrow-down"></i></span></h6>
                            <section class="checkout-steps-form-content collapse" id="collapseThree"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>full Name</label>
                                            <div class="row">
                                                <div class="col-md-12 form-input form">
                                                    <input type="text" value="{{auth::user()->name}}"
                                                        placeholder="First Name">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                <input type="text" value="{{auth::user()->email}}"
                                                    placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Phone Number</label>
                                            <div class="form-input form">
                                                <input type="text" value="{{auth::user()->phone}}"
                                                    placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>






                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">next
                                                step</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">Shipping Address <span
                                    class="ms-3"><i class="fa-solid fa-arrow-down"></i></span></h6>
                            <section class="checkout-steps-form-content collapse" id="collapseFour"
                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Mailing Address</label>
                                            <div class="form-input form">
                                                <input type="text" id="address" placeholder="Mailing Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>City</label>
                                            <div class="form-input form">
                                                <input type="text" id="city" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Post Code</label>
                                            <div class="form-input form">
                                                <input type="text" id="post_code" placeholder="post_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Country</label>
                                            <div class="form-input form">
                                                <input type="text" id="country" placeholder="post_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Region/State</label>
                                            <div class="form-input form">
                                                <input type="text" id="state" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-payment-option">
                                            <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                Option </h6>
                                            <div class="payment-option-wrapper">

                                                <div class="single-payment-option">
                                                    <input type="radio" name="shipping" id="shipping-1">
                                                    <label for="shipping-1">
                                                        <p>Standerd Shipping</p>
                                                        <p>Duration: 25 h</p>
                                                        <span class="price">$10.50</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="shipping" id="shipping-2">
                                                    <label for="shipping-2">
                                                        <p>Standerd Shipping</p>
                                                        <p>Duration: 25 h</p>
                                                        <span class="price">$10.50</span>
                                                    </label>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="steps-form-btn button">
                                            <button class="btn collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">previous</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="steps-form-btn button">
                                            <button class="btn" onclick="check()">save & continue</button>

                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-12 m-2" id="check">



                                </div>
                            </section>
                        </li>
                        <li id="options">
                         
                        </li>
                        <li id="payment_info">
                           
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-sidebar">

                    <div class="checkout-sidebar-price-table mt-2">
                        <h3 class="title">Pricing Table</h3>
                        <div class="sub-total-price">
                            @foreach ($cart as $cart )
                            <div class="total-price">
                                <h6 class="value">{{$cart->qty}} x {{$cart->name}} :</h6>
                                <h6 class="price">${{$cart->total}}</h6>
                            </div>
                            @endforeach

                            <div class="total-price shipping">
                                <h6 class="value">shipping :</h6>
                                <h6 class="price">${{$ship->price}}</h6>
                            </div>

                        </div>
                        <div class="total-payable">
                            <div class="payable-price">
                                <h6 class="value">Total :</h6>
                                <h6 class="price">${{$total}}</h6>
                            </div>
                        </div>

                    </div>
                    <div class="checkout-sidebar-banner mt-30">
                        <a href="product-grids.html">
                            <img src="assets/images/banner/banner.jpg" alt="#">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    function option() {
        document.getElementById("options").innerHTML='<h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"\
aria-expanded="false" aria-controls="collapsefive">Payment Options <span class="ms-2"><i\
        class="fa-solid fa-arrow-down"></i></span></h6>\
<section class="checkout-steps-form-content collapse" id="collapsefive"\
aria-labelledby="headingFive" data-bs-parent="#accordionExample">\
<div class="row container">\
    <div class="col-md-6 col-sm-12 mt-3 ">\
            <form method="POST" action="{{route("payment")}}">\
                @csrf\
                <button class="btn btn-warning ms-5"> Pay with  <img src="assets/images/index.svg" data-v-b01da731="" alt="" role="presentation" class="ms-3"></button>\
            </form>\
    </div>\
    <div class="col-md-6 col-sm-12 mt-3 " id="visa">\
    <a class="btn btn-dark ms-5" onclick="pay()"><img src="assets/images/index5.svg" alt="" class="m-2"> Debit or Credit Card</a>\
</div>\
</div>\
</section>';
    }
    function pay(){
        document.getElementById("payment_info").innerHTML="<h6 class='title collapsed' data-bs-toggle='collapse' data-bs-target='#collapsesix'\
                                aria-expanded='false' aria-controls='collapsesix'>Payment Info <span class='ms-3'><i\
                                        class='fa-solid fa-arrow-down'></i></span></h6>\
                            <section class='checkout-steps-form-content collapse' id='collapsesix'\
                                aria-labelledby='headingFive' data-bs-parent='#accordionExample'>\
                                <div class='row'>\
                                    <div class='col-12'>\
                                        <div class='checkout-payment-form'>\
                                            <div class='single-form form-default'>\
                                                <label>Cardholder Name</label>\
                                                <div class='form-input form'>\
                                                    <input type='text' id='cardholder' placeholder='Cardholder Name'>\
                                                </div>\
                                            </div>\
                                            <div class='single-form form-default'>\
                                                <label>Card Number</label>\
                                                <div class='form-input form'>\
                                                    <input id='cardnumber' type='text'\
                                                        placeholder='0000 0000 0000 0000'>\
                                                </div>\
                                            </div>\
                                            <div class='payment-card-info'>\
                                                <div class='single-form form-default mm-yy'>\
                                                    <label>Expiration</label>\
                                                    <div class='expiration d-flex'>\
                                                        <div class='form-input form'>\
                                                            <input type='text' id='month' placeholder='MM'>\
                                                        </div>\
                                                        <div class='form-input form'>\
                                                            <input type='text' id='year' placeholder='YYYY'>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                                <div class='single-form form-default'>\
                                                    <label>CVC/CVV <span><i\
                                                                class='mdi mdi-alert-circle'></i></span></label>\
                                                    <div class='form-input form'>\
                                                        <input type='text' id='cvv' placeholder='***'>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class='col-md-4' >\
                                                <div class='steps-form-btn button' id='credit'>\
                                                    <button class='btn' onclick='call_now()'>credit card</button>\
                                                </div>\
                                            </div>\
                                            <div id='stat'></div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </section>";
                        document.getElementById("visa").innerHTML="<a class='btn btn-dark ms-5' ><img src='assets/images/index5.svg'  class='m-2'> Debit or Credit Card</a>";
                        }
    function check() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = {
            'address': $('#address').val(),
            'city': $('#city').val(),
            'post_code': $('#post_code').val(),
            'country': $('#country').val(),
            'state': $('#state').val(),
        }
        $.ajax({

            type: "POST",
            url: "{{route('checkaddress')}}",
            data: data,
            dataType: 'json',
            success: function (response) {

                if (response.validator) {
                    document.getElementById("check").innerHTML = '<label class="form-control alert alert-danger">' + response.validator + '</label>';
                }else{option();}
                





            }
        })


    }
    function call_now() {
        document.getElementById("credit").innerHTML = "<button  class='btn' >Please wait <span class='ms-3'> <i class='fas fa-spinner fa-pulse'></i><span></button>";
        credit();
    }
    function credit() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var data = {
            'cardholder': $('#cardholder').val(),
            'cardnumber': $('#cardnumber').val(),
            'month': $('#month').val(),
            'year': $('#year').val(),
            'cvv': $('#cvv').val(),
        }



        $.ajax({

            type: "POST",
            url: "{{route('stripe_payment')}}",
            data: data,
            dataType: 'json',



            success: function (response) {


                if (response.validerror) {
                    document.getElementById("stat").innerHTML = "";
                    document.getElementById("credit").innerHTML = " <button  class='btn' onclick='call_now()'>credit card</button>";

                    $("#stat").append('<label class="form-control alert alert-danger">' + response.validerror + '</label>');
                }

                else if (response.payment_failed) {
                    document.getElementById("stat").innerHTML = "";
                    document.getElementById("credit").innerHTML = " <button  class='btn' onclick='call_now()'>credit card</button>";

                    $("#stat").append('<label class="form-control alert alert-danger">' + response.payment_failed + '</label>');
                }
                else if (response.token_error) {
                    document.getElementById("stat").innerHTML = "";
                    document.getElementById("credit").innerHTML = " <button  class='btn' onclick='call_now()'>credit card</button>";

                    $("#stat").append('<label class="form-control alert alert-danger">' + response.token_error + '</label>');
                }

                else if (response.Payment_completed) {

                    goto(response.Payment_completed);
                    
                    }
                else if (response.Payment_failed2) {
                    document.getElementById("stat").innerHTML = "";
                    document.getElementById("credit").innerHTML = " <button  class='btn' onclick='call_now()'>credit card</button>";
                    $("#stat").append('<label class="form-control alert alert-danger">' + response.Payment_failed2 + '</label>');
                }



            }
        })


    }
    function goto(str){
        window.location.href = 'http://localhost/smartshop/public/index_order_details/'+str+''; 

}
</script>
@endsection