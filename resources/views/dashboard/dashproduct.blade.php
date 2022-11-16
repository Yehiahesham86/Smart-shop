@extends('dashboard.dashboard')
@section('dashproduct')
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
              <h2>Products</h2>
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
                   <a href="javascript:void(0);">Products</a> 
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
                <a class="btn btn-primary" href="{{route('add_product_dashboard')}}">Add product </a>
                </div>
              <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
              
                <div class="left">
                  <p>Show <span>20</span> entries</p>
                </div>
                <div class="right">
                  <div class="table-search d-flex">
                    <form method="GET" action="{{route('SKaA6KbPoUjrHB6')}}">
                      @csrf
                      <input type="text" name="search_input" value="{{$search_input}}" placeholder="Search...">
                      <button><i class="lni lni-search-alt"></i></button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-wrapper table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                    <th><h6>Product id</h6></th>
                      <th ><h6>Name</h6></th>
                      <th class="lead-email"><h6>Price</h6></th>
                      <th class="lead-phone"><h6>Discount</h6></th>
                      <th class="lead-company"><h6>Views</h6></th>
                      <th><h6>Edit</h6></th>
                      <th><h6>Action</h6></th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody id="datatable">
                  @foreach ($products as $product)
                  <tr id="product_{{$product->id}}">
                    <td>
                    <div class="action">
                    <p>{{$product->id}}</p>
                      </div>
                    </td>
                  <td>
                    <div class="lead">
                      <div class="lead-text">
                        <p>{{$product->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p><a href="#0">${{$product->price}}</a></p>
                  </td>
                  <td>
                    <p>{{$product->discount}}%</p>
                  </td>
                  <td>
                    <p>{{$product->pop}}</p>
                  </td>
                  <td>
                  <a class="btn btn-primary" href="{{route('edit_product_dashboard',['id'=>$product->id])}}" target="_blank" >Edit</a>
                  </td>
                  <td>
                    <div class="form-check form-switch toggle-switch" id="check_{{$product->id}}">
                      @if ($product->avalability==1)
                      <input class="form-check-input" type="checkbox"  value="0" onclick="delete_product({{$product->id}})" checked id="product{{$product->id}}" >
                      @else
                      <input class="form-check-input" type="checkbox" value="1" onclick="delete_product({{$product->id}})" id="product{{$product->id}}" >

                      @endif
                     

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
                    {{ $products->appends($_GET)->links() }}
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


console.log(response);
        if(response.avalability==1){ document.getElementById('check_'+response.id+'').innerHTML = '<input class="form-check-input" type="checkbox"  value="0" checked onclick="delete_product('+response.id+')"  id="product'+response.id+'" >';
}
        else{ document.getElementById('check_'+response.id+'').innerHTML= '<input class="form-check-input" type="checkbox"  value="1"   onclick="delete_product('+response.id+')"   id="product'+response.id+'" >';
}





      }



  })
}
</script>
@endsection