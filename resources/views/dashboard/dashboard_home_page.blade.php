@extends('dashboard.dashboard')
@section('home_page')
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
              <h2>Home Page</h2>
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
                   <a href="javascript:void(0);">Home Page</a> 
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
             
              <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
              
                <div class="left">            
                  <a class="btn btn-primary" href="{{route('oySuuFab6nhMmUw')}}">Add Area </a>
                  <a class="btn btn-primary ms-2 me-2" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category </a>
                  <a class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Add Brand </a>
                  </div>
                <div class="right">
                  <div class="table-search d-flex">
                    <form method="GET" action="">
                      @csrf
                      <input type="text" name="search_input" value="" placeholder="Search...">
                      <button><i class="lni lni-search-alt"></i></button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-wrapper table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                    <th><h6>Area name</h6></th>
                      <th ><h6>Head Title</h6></th>
                      <th class="lead-email"><h6>Price</h6></th>
                      <th class="lead-phone"><h6>Note</h6></th>
                      <th class="lead-company"><h6>Edit</h6></th>
                      <th><h6>Action</h6></th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody id="datatable">
                  
                  <tr id="">
                    <td>
                    <div class="action">
                    <p></p>
                      </div>
                    </td>
                  <td>
                    <div class="lead">
                      <div class="lead-text">
                        <p></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>$</p>
                  </td>
                  
                  <td>
                    <p></p>
                  </td>
                  <td>
                  <a class="btn btn-primary" href="" target="_blank" >Edit</a>
                  </td>
                  <td>
                   
                  </td>
                </tr>
                  
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
 

  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
          <label for="category" class="form-label">Add Category</label>
          <input type="text" class="form-control" id="category" placeholder="Enter Category Name">
          <div class="m-3" id="cate"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="cate()" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="add_category()">ADD category</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel2">Add Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
          <label for="brand" class="form-label">Add Brand</label>
          <input type="text" class="form-control" id="brand" placeholder="Enter Brand Name">
          <div class="m-3" id="brand_div"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="brand_div()" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="add_brand()">ADD Brand</button>
        </div>
      </div>
    </div>
  </div>
 
@endsection
@section('script')
    <script>
 function add_category() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var data = {

      'name':$('#category').val(),

      


  }
  $.ajax({

      type: "POST",
      url: "{{route('addcategory')}}",
      data: data,
      dataType: 'json',
      success: function (response) {
        document.getElementById('cate').innerHTML = "<label class='form-control alert alert-success'>Category Added Successfully </label>";
      }






  })
}
function cate() {
  document.getElementById('cate').innerHTML = "";

}

function brand_div() {
  document.getElementById('brand_div').innerHTML = "";

}
function add_brand() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var data = {

      'name':$('#brand').val(),

  }
  $.ajax({

      type: "POST",
      url: "{{route('addbrand')}}",
      data: data,
      dataType: 'json',
      success: function (response) {
        document.getElementById('brand_div').innerHTML = "<label class='form-control alert alert-success'>Brand Added Successfully </label>";
      }


  })
}

    </script>
@endsection