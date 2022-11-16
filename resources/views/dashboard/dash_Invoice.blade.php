@extends('dashboard.dashboard')
@section('loc')
../
@endsection
@section('content')
<section>
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title d-flex align-items-center flex-wrap mb-30">
            <h2 class="mr-40">Invoice</h2>

          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="javascript:void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <a href="javascript:void(0);">Invoice</a>

                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- Invoice Wrapper Start -->
    <div class="invoice-wrapper" id="invoice_content">
      <div class="row">
        <div class="col-12">
          <div class="invoice-card card-style mb-30">
            <div class="invoice-header">
              <div class="invoice-for">
                <p class="text-sm">
                  <img src="../assets/images/logo/logo.svg" height="60" alt="" />
                </p>
              </div>
              <div class="invoice-logo">
                <img src="assets/images/invoice/uideck-logo.svg" alt="" />
              </div>
              <div class="invoice-date">
                <p><span>Date Issued:</span> {{$payment->updated_at}}</p>
                <p><span>Order ID:</span> #{{$order->id}}</p>
              </div>
            </div>
            <div class="invoice-address">
              <div class="address-item">
                <h5 class="text-bold">To :</h5>
                <h1 class="text-uppercase">{{$order->user->name}}</h1>
                <div class="text-uppercase">
                <h4>{{$address->address}}</h4> 
                <h4>{{$address->city}}, {{$address->state}}, {{$address->post_code}}</h4>
                <h4>{{$address->country}}</h4>
                </div>
            
              </div>

            </div>
            <div class="table-responsive">
              <table class="invoice-table table">
                <thead>
                  <tr>
                    <th class="service">
                      <h6 class="text-sm text-medium">Product_id</h6>
                    </th>
                    <th class="desc">
                      <h6 class="text-sm text-medium">Product_name</h6>
                    </th>
                    <th class="qty">
                      <h6 class="text-sm text-medium">Type</h6>
                    </th>
                    <th class="qty">
                      <h6 class="text-sm text-medium">Color</h6>
                    </th>
                    <th class="qty">
                      <h6 class="text-sm text-medium">Qty</h6>
                    </th>
                    <th class="amount">
                      <h6 class="text-sm text-medium">Price</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($ordered_product as $ordered_product)
                 <tr>
                  <td>
                    <p class="text-sm">{{$ordered_product->product->id}}</p>
                  </td>
                  <td>
                    <p class="text-sm">
                      {{$ordered_product->product->name}}
                    </p>
                  </td>
                  <td>
                    <p class="text-sm">
                      {{$ordered_product->product->type}}
                    </p>
                  </td>

                  <td>
                    <p class="text-sm">
                      {{$ordered_product->product->color}}
                    </p>
                  </td>

                  <td>
                    <p class="text-sm">{{$ordered_product->qty}}</p>
                  </td>
                  <td>
                    <p class="text-sm">${{$ordered_product->price}}</p>
                  </td>
                </tr>
                 @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h6 class="text-sm text-medium">Subtotal</h6>
                    </td>
                    <td>
                      <h6 class="text-sm text-bold">${{$ordered_product_sum}}</h6>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h6 class="text-sm text-medium">Shipping Charge</h6>
                    </td>
                    <td>
                      <h6 class="text-sm text-bold">Free</h6>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h4>Total</h4>
                    </td>
                    <td>
                      <h4>${{$payment->amount}}</h4>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          
          </div>
          <!-- End Card -->
        </div>
        <!-- ENd Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- Invoice Wrapper End -->
  </div>
  <!-- end container -->
</section>
<div class="invoice-action">
  <ul class="
        d-flex
        flex-wrap
        align-items-center
        justify-content-center
      ">
    <li class="m-2">
      <button  class="main-btn primary-btn btn-hover" onclick="printDiv()">
        Print Invoice
      </button>
    </li>
  </ul>
</div>
@endsection
@section('script')
<script>

		function printDiv(){
			var printContents = document.getElementById('invoice_content').innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	
 
</script>
@endsection