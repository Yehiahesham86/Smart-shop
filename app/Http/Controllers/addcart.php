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
use App\Models\wishlist;
use App\Models\cart;

class addcart extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
       
        return view('cart');
    }
   public function show(){
    $cart=cart::select('*')->where('user_id',Auth::user()->id)->get(); 
    $price=cart::select('*')->where('user_id',Auth::user()->id)->sum('price');
    $discount=cart::select('*')->where('user_id',Auth::user()->id)->sum('discount');
    $total=$price -$discount;
    return response()->json(['cart'=>$cart , 'price'=>$price ,'discount'=>$discount , 'total'=>$total] );
   }
    
    public function add(Request $request){
        $product=product::find($request->product_id);

        $cart= new cart;
        $cart->user_id=Auth::user()->id;
        $cart->name=$product->name;
        $cart->cover_path=$product->cover_path;
        $cart->qty=$request->qty;
        $cart->price=$product->price * $cart->qty;
        $cart->discount=($product->price * $product->discount /100) * $cart->qty;
        $cart->total=$cart->price - $cart->discount;
        $cart->product_id=$request->product_id;
        $cart->color=$product->color;
        $cart->type=$product->type;

        $cart->save();
        $addcart=$cart->id;
        return response()->json(['addcart'=>$addcart] );
    }
    public function delete(Request $request){

        $cart= new cart;
        $cart=cart::find($request->id);
        $addcart=$cart->product_id;
        $cart->delete();
       
        return response()->json(['addcart'=>$addcart] );
    }
    public function update(Request $request){
      
            if($request->qty <=0 ){
                return response()->json(['fail'=>['Qty cant be zero or fraction']] );
            }
            elseif ($request->qty < 1) {
                return response()->json(['fail'=>['Qty cant be zero or fraction']] );
            }
            elseif ($request->qty >10) {
                return response()->json(['fail'=>['Qty cant be zero or fraction']] );
            }
            
        else{
          
            $cart= new cart;
            $cart=cart::find($request->id); 
            $price=$cart->price /$cart->qty;
            $discount=$cart->discount /$cart->qty;
            $cart->qty=(int)$request->qty;
            $cart->price=(int)$request->qty * $price;
            $cart->discount=(int)$request->qty * $discount;
            $cart->total=$cart->price -$cart->discount;
            $cart->update();
            
            
            return response()->json(['cart'=>$cart] );
        }
          
         
        
       
    }
}
