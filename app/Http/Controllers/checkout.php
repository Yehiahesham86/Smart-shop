<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\ship;

use auth;

use Illuminate\Http\Request;

class checkout extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
    }
    public  function index(){
        $cart=cart::select('*')->where('user_id',Auth::user()->id)->get();
        $total1=cart::select('*')->where('user_id',Auth::user()->id)->sum('total');
        $ship=ship::select('*')->where('id',1)->first();
        $total=$total1+$ship->price;
        $arr['cart']=$cart;
        $arr['ship']=$ship;
        $arr['total']= $total;
        return view('checkout',$arr);
    }
}
