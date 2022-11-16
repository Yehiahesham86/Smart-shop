@extends('layouts.app')
@section('nav')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Wishlist</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a> <i
                            class="lni lni-chevron-right"></i><a href="javascript:void(0)">Wishlist</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="m-5">
    <div class="container">
    <div class="row " id="showproduct">

    </div>
</div>
</section>
@endsection
@section('script')
    <script>
         const new_index=new index() ;
         function index() {
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
        
            $.ajax({
       
                       type:"get",
                       url:"{{route('wishlist_index')}}",
                   
                           dataType : 'json',
                       success: function(response) {
                        console.log(response);
                        $.each(response.wish,function (key,wish) { 
                            show(wish.product_id);
                         
                        })
                              
                           }
               
                        })
                      
 
}

    function show(id) {
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
         var data={
            'id': id,
         }
            $.ajax({
       
                       type:"POST",
                       url:"{{route('wishlist_show')}}",
                       data: data,
                           dataType : 'json',
                       success: function(response) {
                           $.each(response.products,function (key,proudcts) { 
                           
                            $("#showproduct").append('<div class="col-lg-3 col-md-6 col-12" >\
                        <div class="single-product">\
                            <div class="product-image" >\
                                <img   height="250px" src="image/'+proudcts.cover_path+'"   alt="#">\
                                <div id="discount'+proudcts.id+'"></div>\
                                <div class="button">\
                                    <a href="javascript:void(0)" onclick="goto('+proudcts.id+')" class="btn"><i class="lni lni-cart"></i> Details</a>\
                                </div>\
                            </div>\
                        <div class="product-info" >\
                                <h4 class="title">\
                                    <a href="javascript:void(0)" onclick="goto('+proudcts.id+')">'+proudcts.name+'</a>\
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
function goto(str){

window.open('http://localhost/smartshop/public/product_details/'+str+'');
}
    </script>
@endsection