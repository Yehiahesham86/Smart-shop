@extends('dashboard.dashboard')
@section('content')
<section class="tab-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>Add Area</h2>
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
                  <li class="breadcrumb-item"><a href="{{route('YuwIiNF8LNLKlSm')}}">Home Page</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="javascript:void(0);"> Add Area </a>
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
        <form method="POST" action="{{route('add_area')}}" >
          @csrf
        <div class="row">
          <div class="col-lg-6">
            <!-- input style start -->
            <div class="card-style mb-30">
              
                <div class="input-style-1">
                  <label>Choose Area</label>
                 <select class="form-select" name="area">
                  <option value="area1">Area 1</option>
                  <option value="area2">Area 2</option>
                  <option value="area3">Area 3</option>
                  <option value="area4">Area 4</option>
                 </select>
                </div>

            
              <div class="input-style-1">
                <label for="exampleDataList" class="form-label">Choose Product</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" name="product_id" placeholder="Type to search...">
                <datalist id="datalistOptions">
                    @foreach ($products as $products)
                    <option value="{{$products->id}}">{{$products->name}} -(color:{{$products->color}}) - (type:{{$products->type}})</option>
                    @endforeach
                </datalist>
              </div>

              <div class="input-style-1">
                <label>Head Title</label>
                <input type="text" placeholder="Head Title" name="headtitle">
              </div>
              <!-- end input -->
              <!-- end input -->
              <div class="input-style-1">
                <label>Note</label>
                <input type="text" placeholder="Note" name="note">
              </div>
              <!-- end input -->
            </div>
            <!-- end card -->
            <!-- ======= input style end ======= -->
            <div class="card-style mb-30">
              <h6 class="mb-25">images</h6>
              <div class="input-style-1">
                <label>Background photo</label>
                <input type="file" id="images" class="form-control"  name="images" >
              </div>
            </div>
          </div>
          <!-- end col -->
          <div class="col-lg-6">
            <!-- ======= textarea style start ======= -->
           <div class="card-style mb-30">
              <h6 class="mb-25">Textarea</h6>
              <div class="input-style-1" >
                <label>Discription</label>
                <textarea placeholder="Message" id="editor" name="details" rows="10"></textarea>
              </div>
              <!-- end textarea -->
             
           
            
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
    function area(str){
        if (str=1) {
            
        }
        else if(str=2){

        }
        else if(str=3){

        }
        else if(str=4){

        }
    }
</script>
@endsection