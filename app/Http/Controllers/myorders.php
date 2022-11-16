<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\cart;
use App\Models\ship;
use App\Models\product;
use App\Models\order;
use App\Models\address;
use App\Models\ordered_products;
use Auth;
class myorders extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

        $orders=order::select('*')->where('user_id',Auth::user()->id)->get();
        $arr['orders']=$orders;
        return view('myorder',$arr);

    }
    public function index_order_details($id){
         $payment=payment::select('*')->where('payment_id',$id)->where('user_id',Auth::user()->id)->first();
       $order=order::select('*')->where('payment_id',$payment->id)->first();
       $order_products=ordered_products::select('*')->where('order_id',$order->id)->get();
       $arr['order_products']=$order_products;
        $arr['payment']=$payment;
        $arr['order']=$order;
        return view('order_details',['id'=>$id],$arr);
    }
    public function order_details(Request $request){
        
           $order_products=ordered_products::select('*')->where('order_id',$request->id)->get();
      
      return response()->json(['order_products'=>$order_products]);
    }
    public function details(Request $request){
        $product=product::select('*')->where('id',$request->id)->get();
      
        return response()->json(['product'=>$product]);
    }
}
