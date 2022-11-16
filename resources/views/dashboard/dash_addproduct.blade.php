@extends('dashboard.dashboard')
@section('content')
<section class="tab-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Add product</h2>
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
                <li class="breadcrumb-item"><a href="{{route('SKaA6KbPoUjrHB6')}}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  <a href="javascript:void(0);"> Add product </a>
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

    <!-- ========== form-elements-wrapper start ========== -->
    <div class="form-elements-wrapper">
      <form method="POST" action="{{route('add_product')}}" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-lg-6">
          <!-- input style start -->
          <div class="card-style mb-30">
            <h6 class="mb-25">Product Details</h6>
            <div class="input-style-1">
              <label>Product Name</label>
              <input type="text" placeholder="Name" name="name">
            </div>
            <!-- end input -->
            <div class="input-style-1">
              <label>category</label>
              <select class="form-select" name="category">
                @foreach ( $category as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach


              </select>
            </div>
            <!-- end input -->
            <!-- end input -->
            <div class="input-style-1">
              <label>Brand</label>
              <select class="form-select" name="brand">
                @foreach ( $brand as $brand )
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
              </select>
            </div>
            <!-- end input -->
            <div class="input-style-1">
              <label>Price</label>
              <input type="text" placeholder="price" name="price">
            </div>
            <!-- end input -->
            <!-- end input -->
            <div class="input-style-1">
              <label>Discount</label>
              <input type="text" placeholder="discount" name="discount">
            </div>
            <!-- end input -->
            <!-- end input -->
            <div class="input-style-1">
              <label>Type</label>
              <input type="text" placeholder="Type" name="type">
            </div>
            <!-- end input -->
            <!-- end input -->
            <div class="input-style-1">
              <label>Color</label>
              <input type="text" placeholder="Color" name="color">
            </div>
            <!-- end input -->
          </div>
          <!-- end card -->
          <!-- ======= input style end ======= -->
          <div class="card-style mb-30">
            <h6 class="mb-25">images</h6>
            <div class="input-style-1">
              <label>Cover photo</label>
              <input type="file" name="cover_path"  class="form-control">
            </div>
            <div class="input-style-1">
              <label>Details photos</label>
              <input type="file" id="images" class="form-control"  name="images[]"  multiple>
            </div>
          </div>



        </div>
        <!-- end col -->
    
        <div class="col-lg-6">
          <!-- ======= textarea style start ======= -->
          <div class="card-style mb-30">
            <h6 class="mb-25">Textarea</h6>
            <div class="input-style-1">
              <label>Discription</label>
              <textarea placeholder="Message" id="editor" name="details" rows="10"></textarea>
            </div>
            <!-- end textarea -->
            <div class="input-style-3">
              <textarea placeholder="Message" rows="5"></textarea>
              <span class="icon"><i class="lni lni-text-format"></i></span>
            </div>
            <!-- end textarea -->
             <!-- end input -->
         
          <!-- end input -->
          <div class="input-style-1">
            <button class="btn btn-primary"  type="submit" >Submit </button>
          </div>
          <div class="input-style-1" id="message_after">
            @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
         @endif
          </div>
        </div>
       
      </div>
       
          </div>
          <!-- ======= textarea style end ======= -->
         
      </div>

    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
  </div>
  <form>
  <!-- ========== form-elements-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
@endsection
@section('script')
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection