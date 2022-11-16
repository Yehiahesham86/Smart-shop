@extends('layouts.app')
@section('nav')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a><i class="lni lni-chevron-right"></i><a href="javascript:void(0)">Shop</a>   <i class="lni lni-chevron-right"></i><a href="javascript:void(0)">My Cart</a></li>
                    
                  
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="shopping-cart section">
    <div class="container">
        <!---start cart --->
        <div class="cart-list-head">

            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 d-flex justify-content-center">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-12 ">
                        <p>Price</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-12">
                        <p class="ms-1">Total</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>
            <!----start list-->
            <div id="show">





            </div>
            <!---end list-->

        </div>
        <!---end cart-->
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul id="total">
                                   
                                </ul>
                                <div class="button">
                                    @if (is_null(Auth::user()->email_verified_at))
                                    <a href="{{route('myprofile')}}" class="btn">Checkout (verify email)</a>
                                    @else
                                    <a href="{{route('checkout')}}" class="btn">Checkout</a>

                                    @endif

                                    <a href="{{route('showproducts',['id'=>1])}}" class="btn btn-alt">Continue
                                        shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        const new_show = new show();
         function show(){
        $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
         
         
            $.ajax({
       
                       type:"Get",
                       url:"{{route('showcart')}}",
                           dataType : 'json',
                       success: function(response) {
                        document.getElementById("total").innerHTML = "";
                            document.getElementById("show").innerHTML = "";
                            $.each(response.cart,function (key,cart) {

                            $("#show").append('<div class="cart-single-list">\
                <div class="row align-items-center">\
                    <div class="col-lg-1 col-md-1 col-12">\
                        <a href="product-details.html"><img src="image/'+cart.cover_path+'" alt="#" class="w-100 h-100"></a>\
                    </div>\
                    <div class="col-lg-4 col-md-4 col-12">\
                        <h5 class="product-name"><a href="product-details.html">\
                            '+cart.name+'</a></h5>\
                        <p class="product-des">\
                            <span><em>Type:</em> '+cart.type+'</span>\
                            <span><em>Color:</em> '+cart.color+'</span>\
                        </p>\
                    </div>\
                    <div class="col-lg-2 col-md-2 col-12">\
                        <div class="count-input">\
                            <input class="form-control form-control-lg " type="text" value="'+cart.qty+'" id="qty'+cart.id+'" onchange="updatecart('+cart.id+')">\
                        </div>\
                    </div>\
                    <div class="col-lg-1 col-md-1 col-12">\
                        <p>$'+cart.price+'</p>\
                    </div>\
                    <div class="col-lg-1 col-md-1 col-12">\
                        <p>$'+cart.discount+'</p>\
                    </div>\
                    <div class="col-lg-1 col-md-1 col-12">\
                        <p>$'+cart.total+'</p>\
                    </div>\
                    <div class="col-lg-1 col-md-1 col-12">\
                        <a class="btn btn-danger" onclick="deletecart('+cart.id+')"><i class="lni lni-close"></i></a>\
                    </div>\
                </div>\
            </div>');

           })
           $("#total").append('<li>Cart total<span>$'+response.price+'</span></li>\
                                <li>Shipping<span>Free</span></li>\
                                <li>You Save<span>$'+response.discount+'</span></li>\
                                <li class="last">You Pay<span>$'+response.total+'</span></li>');
           
                        }
                    
                    
                    
                    })
    }

        function deletecart(str){
        $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
         var data={
          
            'id': str,
          
         }
            $.ajax({
       
                       type:"POST",
                       url:"{{route('deletecart')}}",
                       data: data,
                           dataType : 'json',
                       success: function(response) {
         
                        
                         show();

                       
                        }
                    
                    
                    
                    })
    }
    function updatecart(str){
        $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
         var data={
          
            'id': str,
            'qty':$('#qty'+str).val()
          
         }
            $.ajax({
       
                       type:"POST",
                       url:"{{route('updatecart')}}",
                       data: data,
                           dataType : 'json',
                       success: function(response) {
                        
                        
                         show();
                       
                       
                       
                       
                       
                       
                        }
                    
                    
                    
                    })
    }
    </script>
@endsection