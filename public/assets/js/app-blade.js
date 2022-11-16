
const new_Categories = new Categories();

function Categories() {
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
         var data={
            
           
         }
            $.ajax({
       
                       type:"GET",
                       url:"http://localhost/smartshop/public/Categories",
                       data: data,
                           dataType : 'json',
                       success: function(response) {
                         
                           $.each(response.Categories,function (key,Categories) { 
                            $("#submenu-1-1").append('<li class="nav-item mega-category-menu "><a href="" class="" onclick="goto('+Categories.id+')"  data-bs-toggle="collapse"\
                            data-bs-target="#submenu-2-'+Categories.id+'" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">'+Categories.name+'</a>\
                            </li>')
                            $("#footer_cati").append('<li class="nav-item mega-category-menu" ><a href="" onclick="goto('+Categories.id+')" >'+Categories.name+'</a></li>')

                           })
                           $("#total_cart").append(''+response.cart+'')
                           $("#total_wish").append(''+response.wish+'')
                           $("#my_orders").append(''+response.my_orders+'')

                        }})
                      
 
}
function goto(str){
    window.location.href = 'http://localhost/smartshop/public/showproducts/'+str+''; 

}



