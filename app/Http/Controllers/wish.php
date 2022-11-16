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
class wish extends Controller

{
   public function __construct(){
      $this->middleware('auth');
  }
  public function index_1(){
return view('wishlist');
  }
   public function index(Request $request){
      $wish=wishlist::select('*')->where('user_id',Auth::user()->id)->get();
      return response()->json(['wish'=>$wish]);
   }
   public function showwish(Request $request){
      $products=product::select('*')->where('id',$request->id)->get();
      return response()->json(['products'=>$products]);
   }

    public function add(Request $request){
        $wish = new wishlist();
        $wish->user_id = Auth::user()->id;
        $wish->product_id = $request->product_id;
        $wish->save();
        
        $del=$wish->id;
        return response()->json(['del'=>$del] );
                                    
     }
  
     public function delete(Request $request){
        
        $wish = wishlist::find($request->id);
        $add = $wish->product_id;
        $wish->delete();
        return response()->json(['add'=>$add] );
                                    
     }
}
