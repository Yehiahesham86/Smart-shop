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
                    <h1 class="page-title">Shop</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a> <i class="lni lni-chevron-right"></i><a href="javascript:void(0)">Shop</a></li>
                   
          
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="product-sidebar">
                    <div class="single-widget search">
                        <h3>Search Product</h3>
                        <form >
                            <input type="text" placeholder="Search Here...">
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>


                    <div class="single-widget">
                        <h3> <a>All Categories</a> </h3>
                        <ul class="list">
                            @foreach ($categories as $cate)
                            <li>
                                <a class="text-capitalize" href="{{route('showproducts',['id'=>$cate->id])}}">{{$cate->name}} </a><br>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="single-widget range">
                        <h3>Min Price Range</h3>
                        <input type="range" class="form-range" name="range" id="min" step="1" min="100" max="1000"
                            value="10" onchange="rangePrimary.value=value" onclick="filter()">
                        <div class="range-inner">
                            <label>$</label>
                            <input type="text"  id="rangePrimary" placeholder="100" readonly>
                        </div>
                    </div>
                    <div class="single-widget range">
                        <h3>Max Price Range</h3>
                      
                        <input type="range" class="form-range" name="range" step="1" id="max" min="1000" max="10000"
                            value="10" onchange="rangePrimary1.value=value" onclick="filter()">
                        <div class="range-inner">
                            <label>$</label>
                            <input type="text"   id="rangePrimary1" placeholder="1000" readonly>
                        </div>
                    </div>


                

                   

                </div>

            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Sort by:</label>
                                    <select class="form-control" id="sorting">
                                        <option value="1" onclick="filter()">Popularity</option>
                                        <option value="2" onclick="filter()">Low - High Price</option>
                                        <option value="3" onclick="filter()">High - Low Price</option>
                                        <option value="4" onclick="filter()">Average Rating</option>
                                        <option value="5" onclick="filter()">A - Z Order</option>
                                        <option value="6" onclick="filter()">Z - A Order</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Fillter by Brand:</label>
                                    <select class="form-control" id="brand">
                                        <option value="0" onclick="filter()">All</option>
                                        @foreach ($brands as $brand )
                                        <option value="{{$brand->id}}" onclick="filter()">{{$brand->name}}</option>
                                        @endforeach
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab"
                                            aria-controls="nav-grid" aria-selected="true"><i
                                                class="lni lni-grid-alt"></i></button>
                                   
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-----show products ----->
                    <div class="row " id="showproduct" >
                

                        
                        
                        
                        </div>
                     
                     <!--end show products-->  
                        </div>
                    </div>
                    <!---end show products-->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                           <div class="row"> </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="pagination center">
                                        <ul class="pagination-list">
                                         
                                          
                                         

                                       
                                          
                                           
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection
@section('script')
<script >

    const new_filter=new filter() ;
    function filter() {
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
 var id ={{$id}};
         var data={
           'brand':$('#brand').val(),
            'id': id,
            'sorting': $('#sorting').val(),
            'min': $('#min').val(),
            'max': $('#max').val(),
         }
            $.ajax({
       
                       type:"POST",
                       url:"{{route('filter')}}",
                       data: data,
                           dataType : 'json',
                       success: function(response) {
                        console.log()
                        document.getElementById("showproduct").innerHTML = "";
                           $.each(response.products,function (key,proudcts) { 
                           
                            $("#showproduct").append('<div class="col-lg-4 col-md-6 col-12" >\
                        <div class="single-product">\
                            <div class="product-image" >\
                                <img   height="250px" src="../image/'+proudcts.cover_path+'"   alt="#">\
                                <div id="discount'+proudcts.id+'"></div>\
                                <div class="button">\
                                    <a href="javascript:void(0)" onclick="show('+proudcts.id+')" class="btn"><i class="lni lni-cart"></i> Details</a>\
                                </div>\
                            </div>\
                        <div class="product-info" >\
                           <div ><span class="category" >'+response.categories.name+'</span></div>\
                                <h4 class="title">\
                                    <a href="javascript:void(0)" onclick="show('+proudcts.id+')">'+proudcts.name+'</a>\
                                </h4>\
                                <ul class="review d-flex" >\
                                    <div id="review'+proudcts.id+'"></div>\
                                    <li><span >'+proudcts.rate+'  Review(s)</span></li>\
                                </ul>\
                                <div class="price" id="price'+proudcts.id+'" ></div>\
                            </div>\
                        </div>')
                    
                        for (let index = 0; index <proudcts.rate ; index++) {

                           $('#review'+proudcts.id).append('<li><i class="lni lni-star-filled"></i></li>') 
                            
                        }
                        for (let index = 0; index <(5-proudcts.rate) ; index++) {

                            $('#review'+proudcts.id).append('<li><i class="lni lni-star"></i></li>') 
 
                        }

                         if(proudcts.discount >= 1){
                           
                           
                            $("#price"+proudcts.id).append(' <span class="price">$'+(proudcts.price-proudcts.price*proudcts.discount/100)+'</span> <span class="discount-price">'+proudcts.price+'</span>') 
                            
                            $("#discount"+proudcts.id).append('<span class="sale-tag">-'+proudcts.discount+'%</span>') 
                         }
                         else{
                            
                            $("#price"+proudcts.id).append('<span class="price">$'+proudcts.price+'</span>') 

                         }


                          
                   
                          
                         
                            
                              
                           })
               
                        }})
                      
 
}
function show(str){

    window.open('http://localhost/smartshop/public/product_details/'+str+'');
}

 </script>
@endsection
