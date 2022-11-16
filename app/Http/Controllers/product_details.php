<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\categories;
use App\Models\ordered_products;
use App\Models\product;
use App\Models\photos;
use App\Models\brand;
use App\Models\wishlist;
use App\Models\cart;
use App\Models\review;

class product_details extends Controller
{
    public function index(Request $request,$id){
        $product_details=product::select('*')->where('id',$id)->where('avalability',1)->first();
        $brand=brand::select('*')->where('id',$product_details->brand)->first();
        $photos=photos::select('*')->where('product_id',$product_details->id)->take(5)->get();
        $similar=product::select('*')->where('price','>=',$product_details->price)->where('avalability',1)->where('categories_id',$product_details->categories_id)->wherenot('id',$product_details->id)->take(4)->get();
        $categories=categories::select('*')->where('id',$product_details->categories_id)->first();
        $reviews=review::select('*')->where('product_id',$product_details->id)->orderBy('updated_at', 'desc')->get();
        $stars5=review::select('*')->where('product_id',$product_details->id)->where('rate',5)->count();
        $stars4=review::select('*')->where('product_id',$product_details->id)->where('rate',4)->count();
        $stars3=review::select('*')->where('product_id',$product_details->id)->where('rate',3)->count();
        $stars2=review::select('*')->where('product_id',$product_details->id)->where('rate',2)->count();
        $star1=review::select('*')->where('product_id',$product_details->id)->where('rate',1)->count();

        if (!Auth::guest()){
        $wish=wishlist::select('*')->where('product_id',$id)->where('user_id',Auth::user()->id)->first();
        $cart=cart::select('*')->where('product_id',$id)->where('user_id',Auth::user()->id)->first();
        $review=ordered_products::select('*')->where('user_id',Auth::user()->id)->where('product_id',$product_details->id)->first();
        $arr['wish']= $wish;
        $arr['review']= $review;
        $arr['cart']= $cart;}
        $arr['reviews']= $reviews;
        $arr['product_details']= $product_details;
        $arr['photos']= $photos;
        $arr['brand']= $brand;
        $arr['similar']= $similar;
        $arr['categories']= $categories;
        $arr['stars5']= $stars5;
        $arr['stars4']= $stars4;
        $arr['stars3']= $stars3;
        $arr['stars2']= $stars2;
        $arr['star1']= $star1;

         $product_details->pop = $product_details->pop+1;
        $product_details->update();
       
        return view('product-details',$arr);
     
        
    }

    public function add_review(Request $request){
        $this->middleware('auth');
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'discription' => 'required',
            'rate' => 'required|numeric|min:1|max:5',
         
        ]);
        if ($validator->fails()) {
            $validerror= $validator->errors()->first();
             return response()->json(['validerror'=>$validerror]);
         }
        $review = review::updateOrCreate(
            ['user_name' => Auth::user()->name, 'user_id' => Auth::user()->id,'product_id' => $request->product_id],
            [ 'subject' => $request->subject,'discription'=> $request->discription ,'rate'=>$request->rate]
        );
        $rate=product::select('*')->where('id',$request->product_id)->first();
        $rate_sum=review::select('*')->where('product_id',$request->product_id)->sum('rate');
        $rate_count=review::select('*')->where('product_id',$request->product_id)->count();
        $rate_total= $rate_sum/$rate_count;
        $rateupdate = product::select('*')->where('id',$request->product_id)->update(['rate' => $rate_total]);
           
        
        
        return response()->json(['review'=>$review]);

    }

}
