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
          <h1 class="page-title">Order Details : {{$payment->payment_id}} </h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <ul class="breadcrumb-nav">
          <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a> <i class="lni lni-chevron-right"></i><a
              href="{{route('myorders')}}">My order</a> <i class="lni lni-chevron-right"></i><a
              href="javascript:void(0)">Order Details</a></li>


        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Thanks for your Order, <span
                style="color: #3077d3;">{{auth::user()->name}}</span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #3077d3;">Receipt</p>
            </div>
            <!--details-->
            <div id="details">
              @foreach ( $order_products as $order_products)
              <div class="card shadow-0 border mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 col-sm-12  justify-content-center align-items-center">
                      <div class="row">
                        <div class="col-md-3 col-sm-12">
                          <img src="../image/{{$order_products->product->cover_path}}" class="img-fluid">
                        </div>
                        <div class="col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0">{{$order_products->product->name}}</p>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{$order_products->product->color}}</p>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">Type: {{$order_products->product->type}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-12 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Qty:{{$order_products->qty}}</p>
                    </div>
                    <div class="col-md-2 col-sm-12 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">${{$order_products->price}}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach


            </div>

            <!---- details-->
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="row d-flex align-items-center">
                    <div class="col-md-2">
                      <p class="text-muted mb-0 small">Track Order</p>
                    </div>
                    <div class="col-md-10">
                      <div class="progress" style="height: 6px; border-radius: 16px;">
                        <div class="progress-bar" role="progressbar" @if($order->status=='preparing')
                          style="width:33.33333333333334%; border-radius: 16px; background-color: #3077d3;"
                          @elseif ($order->status=='outfordelivary')
                          style="width:66.66666666666667%; border-radius: 16px; background-color: #3077d3;"
                          @else
                          style="width:100%; border-radius: 16px; background-color: #3077d3;"
                          @endif
                          ></div>
                      </div>
                      <div class="d-flex justify-content-around mb-1">
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Preparing</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>

            </div>

            <div class="d-flex justify-content-between pt-2">
              <p class="text-muted mb-0">Invoice Number : {{$payment->id}}</p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Invoice Date : {{$payment->updated_at}}</p>

            </div>

            <div class="d-flex justify-content-between mb-5">

            </div>
            <!----end details-->
          </div>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color:  #3077d3; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">${{$payment->amount}}</span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script>

  function order_details() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = {{ $order-> id
  }};
  var data = {

    'id': id,

  }
  $.ajax({

    type: "post",
    url: "{{route('order_details')}}",
    data: data,
    dataType: 'json',
    success: function (response) {

      document.getElementById("details").innerHTML = "";
      $.each(response.order_products, function (key, order_products) {
        $("#details").append('<div class="card shadow-0 border mb-4">\
            <div class="card-body">\
              <div class="row">\
                <div class="col-md-8 col-sm-12  justify-content-center align-items-center" id="card_details'+ order_products.product_id + '">\
                </div>\
                  <div class="col-md-2 col-sm-12 text-center d-flex justify-content-center align-items-center">\
                    <p class="text-muted mb-0 small">Qty: '+ order_products.qty + ' </p>\
                  </div>\
                  <div class="col-md-2 col-sm-12 text-center d-flex justify-content-center align-items-center">\
                    <p class="text-muted mb-0 small">$'+ order_products.price + '</p>\
                  </div>\
                </div>\
             </div>\
          </div>');
        details(order_products.product_id);
      })

    }
  })
    }

  function details(str) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var data = {

      'id': str,

    }
    $.ajax({

      type: "post",
      url: "{{route('details')}}",
      data: data,
      dataType: 'json',
      success: function (response) {


        $.each(response.product, function (key, product) {
          $("#card_details" + str).append('<div class="row">\
        <div class="col-md-3 col-sm-12">\
                    <img src="../image/'+ product.cover_path + '" class="img-fluid" >\
                  </div>\
                  <div class="col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center">\
                    <p class="text-muted mb-0">'+ product.name + '</p>\
                  </div>\
                  <div class="col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center">\
                    <p class="text-muted mb-0 small">White</p>\
                  </div>\
                  <div class="col-md-3 col-sm-12 text-center d-flex justify-content-center align-items-center">\
                    <p class="text-muted mb-0 small">Type: 64GB</p>\
                  </div>\
                  </div>');
        })

      }
    })
  }
</script>
@endsection