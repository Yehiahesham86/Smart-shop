<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Models\categories;
use App\Models\wishlist;
use App\Models\cart;
use App\Models\order;
use App\Models\product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=product::select('*')->take(8)->orderby('pop','desc')->get();
        $arr['products']= $products;
        return view('home',$arr);
    }
    /*****all Categories &&&&&& Featured Categories */
    public function Categories(Request $request){
         $Categories=categories::select("*")->where('status',1)->get();
         if (!Auth::guest()) {
            $wish= wishlist::select('*')->where('user_id',Auth::user()->id)->count();
            $cart= cart::select('*')->where('user_id',Auth::user()->id)->count();
            $my_orders= order::select('*')->where('user_id',Auth::user()->id)->count();

            return response()->json(['Categories'=>$Categories , 'wish'=>$wish , 'cart'=>$cart, 'my_orders'=>$my_orders]);

         }
         else{
            return response()->json(['Categories'=>$Categories]);
         }
        //$yehia='yehia';
       // $Categories = DB::Table($yehia)->select('*')->where('id',1)->get();  
    
    }

   
    /********end all Categories &&&&&& Featured Categories */

    

}
