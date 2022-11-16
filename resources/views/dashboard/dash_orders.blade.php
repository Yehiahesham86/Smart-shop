@extends('dashboard.dashboard')
@section('dashorders')
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
              <h2>Orders</h2>
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
                   <a href="javascript:void(0);">Orders</a> 
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
                  <form method="GET" action="{{route('YuwIiNF8LNLghjl')}}">
                    @csrf
                    @if($status=='all')
                    <select class="form-select" name="status">
                    <option Value="all" selected>ALL</option>
                    <option Value="preparing">Preparing</option>
                    <option Value="outfordelivary">Out for Delivary</option>
                    <option Value="delivered" >Delivered</option>
                    <option Value="canceled" >Canceled</option>
                    </select>
                    @elseif ($status=='preparing')
                    <select class="form-select" name="status">
                      <option Value="all" >ALL</option>
                      <option Value="preparing" selected>Preparing</option>
                      <option Value="outfordelivary">Out for Delivary</option>
                      <option Value="delivered" >Delivered</option>
                      <option Value="canceled">Canceled</option>
                    </select> 
                      @elseif ($status=='outfordelivary')
                      <select class="form-select" name="status">
                        <option Value="all" >ALL</option>
                        <option Value="preparing"  >Preparing</option>
                        <option Value="outfordelivary" selected>Out for Delivary</option>
                        <option Value="delivered" >Delivered</option>
                        <option Value="canceled">Canceled</option>
                      </select> 
                      @elseif ($status=='delivered')
                      <select class="form-select" name="status">
                        <option Value="all" >ALL</option>
                        <option Value="preparing" >Preparing</option>
                        <option Value="outfordelivary" >Out for Delivary</option>
                        <option Value="delivered" selected>Delivered</option>
                        <option Value="canceled">Canceled</option>
                        @elseif ($status=='canceled')
                        <select class="form-select" name="status">
                          <option Value="all" >ALL</option>
                          <option Value="preparing" >Preparing</option>
                          <option Value="outfordelivary" >Out for Delivary</option>
                          <option Value="delivered" >Delivered</option>
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
                    <th class="lead-text"><h6>Order id</h6></th>
                      <th ><h6>payment_id</h6></th>
                      <th ><h6>Price</h6></th>
                      <th ><h6>User_id</h6></th>
                      <th ><h6>Status</h6></th>
                      <th><h6>Invoice</h6></th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody id="datatable">
                  @foreach ($orders as $order)
                  <tr id="orders_{{$order->id}}">
                    <td>
                    <p>{{$order->id}}</p>
                    </td>
                  <td>
                       <a href="{{url("/3xwEBay3rvBnzaD?status=all&search_input={$order->payment->payment_id}")}}"> <p>{{$order->payment->payment_id}}</p></a>
                  </td>
                  <td>
                    ${{$order->payment->amount}}  
                  </td>
                  <td>
                    <p> {{$order->user_id}}</p>
                  </td>
                  <td>
                    <div class="container">
                      @if ($order->status=='canceled')
                      <p>Canceled<p>
                        @else
                        @if ($order->status=='preparing')
                        <select class="form-select" id="status_{{$order->id}}">
                          <option Value="preparing" selected>Preparing</option>
                          <option Value="outfordelivary" onclick="update_order({{$order->id}})">Out for Delivary</option>
                          <option Value="delivered" onclick="update_order({{$order->id}})">Delivered</option>
                        </select> 
                          @elseif ($order->status=='outfordelivary')
                          <select class="form-select" id="status_{{$order->id}}">
                            <option Value="preparing" onclick="update_order({{$order->id}})" >Preparing</option>
                            <option Value="outfordelivary" selected>Out for Delivary</option>
                            <option Value="delivered" onclick="update_order({{$order->id}})">Delivered</option>
                          </select> 
                          @else
                          <select class="form-select" id="status_{{$order->id}}">
                            <option Value="preparing" onclick="update_order({{$order->id}})">Preparing</option>
                            <option Value="outfordelivary" onclick="update_order({{$order->id}})">Out for Delivary</option>
                            <option Value="delivered" selected>Delivered</option>
                          </select> 
                          @endif
                      @endif
                    

                  </div>
                  </td>
                  <td>
                    <a class="btn btn-primary" href="{{route('wwjD0qvJPOMLIAb',['id'=>$order->payment_id])}}">Invoice</a>
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
                    {{ $orders->appends($_GET)->links() }}

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
  function delete_product(str) {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var data = {

      'id': str,
      'avalability':$('#product'+str+'').val(),


  }
  $.ajax({

      type: "POST",
      url: "{{route('delete_product_dashboard')}}",
      data: data,
      dataType: 'json',
      success: function (response) {

        if(response.avalability==1){ document.getElementById('check_'+response.id+'').innerHTML = '<input class="form-check-input" type="checkbox"  value="0" checked onclick="delete_product('+response.id+')"  id="product'+response.id+'" >';
}
        else{ document.getElementById('check_'+response.id+'').innerHTML= '<input class="form-check-input" type="checkbox"  value="1"   onclick="delete_product('+response.id+')"   id="product'+response.id+'" >';
}


      }

  })
}


</script>
@endsection