@extends('dashboard.dashboard')
@section('dashpay')
active
@endsection
@section('content')
<section class="table-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>Payments</h2>
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
                   <a href="javascript:void(0);">Payments</a> 
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

      <!-- ========== tables-wrapper start ========== -->
      <div class="tables-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-30">
              <h6 class="mb-10"></h6>
              <div class="left">     
               
                </div>
              <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
              
                <div class="left">
                  <form method="GET" action="{{route('3xwEBay3rvBnzaD')}}">
                    @csrf
                    @if($status=='all')
                    <select class="form-select" name="status">
                    <option Value="all" selected>ALL</option>
                    <option Value="approved">Approved</option>
                    <option Value="canceled">Canceled</option>
                    </select>
                    @elseif ($status=='approved')
                    <select class="form-select" name="status">
                      <option Value="all" >ALL</option>
                      <option Value="approved" selected>Approved</option>
                      <option Value="canceled">Canceled</option>
                    </select> 
                      @elseif ($status=='canceled')
                      <select class="form-select" name="status">
                        <option Value="all" >ALL</option>
                        <option Value="approved" >Approved</option>
                        <option Value="canceled" selected>Canceled</option>
                      </select> 
                      @endif
                </div>
              
                <div class="right">
                  <div class="table-search d-flex">
            
                      <input type="text" value="@isset($search_input){{$search_input}}@endisset" placeholder="Search..." name="search_input">
                      <button><i class="lni lni-search-alt"></i></button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-wrapper table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                    <th class="lead-text"><h6>Invoice id</h6></th>
                      <th ><h6>payment_id</h6></th>
                      <th ><h6>Price</h6></th>
                      <th ><h6>User_id</h6></th>
                      <th ><h6>Order_id</h6></th>
                      <th ><h6>Status</h6></th>
                      <th><h6>Invoice</h6></th>
                      <th><h6>Action</h6></th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody id="datatable">
                  @foreach ($Payments as $Payment)
                  <tr id="payment_{{$Payment->id}}">
                    <td>
                    <p>{{$Payment->id}}</p>
                    </td>
                  <td>
                    <p>{{$Payment->payment_id}}</p>
                  </td>
                  <td>
                    ${{$Payment->amount}}  
                  </td>
                  <td>
                    <p>{{$Payment->user_id}}</p>
                  </td>
                  <td>
                  <a href="{{url("/YuwIiNF8LNLghjl?search_input={$Payment->order->id}&status=all")}}"><p>{{$Payment->order->id}}</p></a>
                  </td>
                  <td id="payment_update_{{$Payment->id}}">
                   <p>{{$Payment->payment_status}}</p> 
                 
                  </td>
                  <td>
                    <a class="btn btn-primary" href="{{route('wwjD0qvJPOMLIAb',['id'=>$Payment->id])}}">Invoice</a>
                  </td>
                  <td>
                    <div class="action">
                      <button  class="text-danger" onclick="canceled_payment({{$Payment->id}})">
                        <i class="lni lni-trash-can"></i>
                      </button >
                    </div>
                  </td>
                </tr>
                  @endforeach
                    <!-- end table row -->
                  
                  </tbody>
                </table>
                <!-- end table -->
              </div>
              <div class="pt-10 d-flex flex-wrap justify-content-between">
                <div class="left">
                  <p class="text-sm text-gray"></p>
                </div>
                <div class="right table-pagination">
                  <ul class="d-flex justify-content-end align-items-center">
                    {{ $Payments->appends($_GET)->links() }}

                  </ul>
                </div>
              </div>
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
  </section>
@endsection
@section('script')
<script>
 
function canceled_payment(str) {
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
      url: "{{route('canceled_payment_dashboard')}}",
      data: data,
      dataType: 'json',
      success: function (response) {

          document.getElementById('payment_update_'+response.id+'').innerHTML = '<p>'+response.payments.payment_status+'</p>';


      }



  })
}
</script>
@endsection