<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Models\categories;
use App\Models\product;
use App\Models\photos;
use App\Models\brand;
class show_products extends Controller
{
    public function index(Request $request,$id){
        $categories=categories::select('*')->get();
        $brands=brand::select('*')->get();
        $arr['categories']=$categories;
        $arr['id'] = $id;
        $arr['brands'] = $brands;
        return view('products',$arr);
    }
      

    public function filter(Request $request){
       
        if($request->brand > 0){ 
             switch ($request->sorting) {
            case '1':
                $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->where('brand',$request->brand)->orderBy('pop', 'desc')->get();
                $categories=categories::select('name')->where('id',$request->id)->first();
                return response()->json(['products'=>$products,'categories'=>$categories] );
                break;
                 case '2':
                     $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->where('brand',$request->brand)->orderBy('price', 'asc')->get();
                     $categories=categories::select('name')->where('id',$request->id)->first();
                     return response()->json(['products'=>$products,'categories'=>$categories] );
                     break;
                     case '3':
                         $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->where('brand',$request->brand)->orderBy('price', 'desc')->get();
                         $categories=categories::select('name')->where('id',$request->id)->first();
                         return response()->json(['products'=>$products,'categories'=>$categories] );
                         break;
                         case '4':
                             $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->where('brand',$request->brand)->orderBy('rate', 'desc')->get();
                             $categories=categories::select('name')->where('id',$request->id)->first();
                             return response()->json(['products'=>$products,'categories'=>$categories] );
                             break;
                             case '5':
                                 $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('categories_id',$request->id)->where('price','>=',$request->min)->where('brand',$request->brand)->where('price','<=',$request->max)->orderBy('name', 'asc')->get();
                                 $categories=categories::select('name')->where('id',$request->id)->first();
                                 return response()->json(['products'=>$products,'categories'=>$categories] );
                                 break;
                                 case '6':
                                     $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->where('brand',$request->brand)->orderBy('name', 'desc')->get();
                                     $categories=categories::select('name')->where('id',$request->id)->first();
                return response()->json(['products'=>$products,'categories'=>$categories] );
                                     break;
          
         }}
        else{
            switch ($request->sorting) {
                case '1':
                    $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->orderBy('pop', 'desc')->get();
                    $categories=categories::select('name')->where('id',$request->id)->first();
                     return response()->json(['products'=>$products,'categories'=>$categories] );
                    break;
                     case '2':
                         $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->orderBy('price', 'asc')->get();
                         $categories=categories::select('name')->where('id',$request->id)->first();
                return response()->json(['products'=>$products,'categories'=>$categories] );
                         break;
                         case '3':
                             $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->orderBy('price', 'desc')->get();
                             $categories=categories::select('name')->where('id',$request->id)->first();
                             return response()->json(['products'=>$products,'categories'=>$categories] );
                             break;
                             case '4':
                                 $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->orderBy('rate', 'desc')->get();
                                 $categories=categories::select('name')->where('id',$request->id)->first();
                                 return response()->json(['products'=>$products,'categories'=>$categories] );
                                 break;
                                 case '5':
                                     $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('categories_id',$request->id)->where('price','>=',$request->min)->where('price','<=',$request->max)->orderBy('name', 'asc')->get();
                                     $categories=categories::select('name')->where('id',$request->id)->first();
                                     return response()->json(['products'=>$products,'categories'=>$categories] );
                                     break;
                                     case '6':
                                         $products=product::select('*')->where('categories_id',$request->id)->where('avalability',1)->where('price','>=',$request->min)->where('price','<=',$request->max)->orderBy('name', 'desc')->get();
                                         $categories=categories::select('name')->where('id',$request->id)->first();
                                         return response()->json(['products'=>$products,'categories'=>$categories] );
                                         break;
              
             }
        }
      
    
}
  
}
