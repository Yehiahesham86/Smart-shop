<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use auth;
use role;
use Session;
use App\Models\User;
use App\Models\address;
use App\Models\product;
use App\Models\order;
use App\Models\payment;
use App\Models\categories;
use App\Models\brand;
use App\Models\photos;
use App\Models\ordered_products;

use Illuminate\Support\Facades\Validator;


class dashboard extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role');
    }

    /*************home dashboard */
    public function dashhome(){
            return view ('dashboard.dashhome');
       
    }
/**********end home dashboard */

/*****************users dashboard */
    public function dashusers(Request $request){
        if($request->has('select_role')){
            $users =user::select('*')->where('role',$request->select_role)->paginate(20);
            $users_count=user::select('*')->where('role',$request->select_role)->count();
            $select_role_value=$request->select_role;
            $arr['select_role_value']=$select_role_value;

        }
        else{
            $users =user::select('*')->where('role','0')->paginate(20);
            $users_count=user::select('*')->where('role','0')->count();
            $select_role_value=1;
            $arr['select_role_value']=$select_role_value;

        }
       

        $arr['users_count']=$users_count;

        return view('dashboard.dashusers',$arr)->with('users', $users);
    }
   
    public function delete_user_dashboard(Request $request){
        $user= new user;
        $user=user::find($request->id);
        $user->delete();
         return response()->json(['id' =>$request->id]);
    }

    public function update_user_dashboard(Request $request){
        $user= new user;
        $user=user::find($request->id);
        $user->role=$request->role;
        $user->update();
         return response()->json(['id' =>$request->id]);
    }
    public function search_user_dashboard(Request $request){
        $user=user::select('*')->where('role','0')->where(function($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search_input . '%')
                ->orWhere('email', 'like', '%' . $request->search_input . '%')
                ->orwhere('phone', 'like', '%' . $request->search_input . '%');})->get();
                $user_count=user::select('*')->where('role','0')->where(function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search_input . '%')
                        ->orWhere('email', 'like', '%' . $request->search_input . '%')
                        ->orwhere('phone', 'like', '%' . $request->search_input . '%');})->count();
                return response()->json(['user' => $user , 'user_count'=>$user_count]);
    }
    /*********end users dashboard */

    /*********product dashboard */
    public function dashproduct(Request $request){
        $search_input= $request->session()->put('search_input', $request->search_input);
        $products=product::select('*')->whereNot('id','0')->where(function($query) use ($search_input) {
            $query->where('name', 'like', '%' .   $search_input = session('search_input') . '%')
                ->orWhere('price', 'like', '%' .   $search_input = session('search_input') . '%')
                ->orWhere('id', 'like', '%' .    $search_input = session('search_input') . '%')
                ->orwhere('discount', 'like', '%' .  $search_input = session('search_input') . '%')
                ->orwhere('pop', 'like', '%' . $search_input = session('search_input') . '%');})->paginate(20);
            $arr['search_input']=session('search_input');
            return view('dashboard.dashproduct',$arr)->with('products', $products);
}

public function delete_product_dashboard(Request $request){
    $product= new product;
    $product=product::find($request->id);
    $product->avalability=$request->avalability;
    $product->update();
     return response()->json(['id' =>$request->id , 'avalability'=>$product->avalability]);
}
public function add_product_dashboard(Request $request){
    $category=categories::select('*')->get();
    $brand=brand::select('*')->get();
    $arr['category']=$category;
    $arr['brand']=$brand;

    return view('dashboard.dash_addproduct',$arr);
}

public function add_product(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|numeric',
        'category' => 'required|numeric',
        'brand' => 'required|numeric',
        'cover_path' => 'required',
        'cover_path.*' => 'mimes:jpg,png,jpeg,gif,svg',
        'images' => 'required',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg',
        'type' => 'required',
        'color' => 'required',
        'details' => 'required',

    ]);

    if ($validator->fails()) {
       $validerror= $validator->errors()->first();
       Session::flash('message',  $validerror);
       return Redirect::back();
         }
    else{ 
        $name = $request->file('cover_path')->getClientOriginalName();
        $path = $request->file('cover_path')->store('/');
        $product= new product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->categories_id=$request->category;
        $product->brand=$request->brand;
        $product->avalability=1;
        $product->type=$request->type;
        $product->color=$request->color;
        $product->rate=0;
        $product->cover_path=$path;
        $product->discription=$request->details;
        $product->pop=0;
        $product->save();

        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $key => $file)
           {
               $path = $file->store('/');
               $name = $file->getClientOriginalName();
               $insert[$key]['name'] = $name;
               $insert[$key]['path'] = $path;
               $insert[$key]['categories_id'] = $request->category;
               $insert[$key]['product_id'] = $product->id;

           }
        }
        
       Photos::insert($insert);

         return redirect()->route('product_details',['id'=>$product->id]);
   
}
}

public function edit_product_dashboard(Request $request,$id){
  $product=product::select('*')->where('id',$id)->first();
  $category=categories::select('*')->get();
  $brand=brand::select('*')->get();
  $arr['category']=$category;
  $arr['brand']=$brand;
  $arr['product']=$product;
    return view('dashboard.dash_editproduct',$arr);
}

public function edit_product(Request $request,$id){

   //////start if 
   if (is_null($request->cover_path) && is_null($request->images)) {

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|numeric',
        'category' => 'required|numeric',
        'brand' => 'required|numeric',
        'type' => 'required',
        'color' => 'required',
      //  'details' => 'required',
    ]);

    if ($validator->fails()) {
       $validerror= $validator->errors()->first();
       Session::flash('message',  $validerror);
       return Redirect::back();
         }

    else{ 
        if(is_null($request->details)){ $product=product::where('id', $id)->update(['name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color]);
            return redirect()->route('product_details',['id'=>$id]); }
        else{ $product=product::where('id', $id)->update(['name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color,'discription'=>$request->details]);
            return redirect()->route('product_details',['id'=>$id]); }
      
        }

}
elseif(is_null($request->cover_path)){
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|numeric',
        'category' => 'required|numeric',
        'brand' => 'required|numeric',
        'images' => 'required',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg',
        'type' => 'required',
        'color' => 'required',

    ]);

    if ($validator->fails()) {
       $validerror= $validator->errors()->first();
       Session::flash('message',  $validerror);
       return Redirect::back();
         }

    else{ 
        if(is_null($request->details)){ $product=product::where('id', $id)->update(['name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color]);
        }
        else{ $product=product::where('id', $id)->update(['name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color,'discription'=>$request->details]);
         }
       
        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $key => $file)
           {
               $path = $file->store('/');
               $name = $file->getClientOriginalName();
               $insert[$key]['name'] = $name;
               $insert[$key]['path'] = $path;
               $insert[$key]['categories_id'] = $request->category;
               $insert[$key]['product_id'] = $id;

           }
        }
        $photo=photos::select('*')->where('product_id', $id)->delete();
       Photos::insert($insert);

       return redirect()->route('product_details',['id'=>$id]);
   
}
}
elseif (is_null($request->images)) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|numeric',
        'category' => 'required|numeric',
        'brand' => 'required|numeric',
        'cover_path' => 'required',
        'cover_path.*' => 'mimes:jpg,png,jpeg,gif,svg',
        'type' => 'required',
        'color' => 'required',

    ]);

    if ($validator->fails()) {
       $validerror= $validator->errors()->first();
       Session::flash('message',  $validerror);
       return Redirect::back();
         }

    else{ 
        $name = $request->file('cover_path')->getClientOriginalName();
        $path = $request->file('cover_path')->store('/');
        if(is_null($request->details)){ $product=product::where('id', $id)->update(['cover_path'=>$path,'name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color]);
            return redirect()->route('product_details',['id'=>$id]); }
        else{ $product=product::where('id', $id)->update(['cover_path'=>$path,'name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color,'discription'=>$request->details]);
            return redirect()->route('product_details',['id'=>$id]); }
       


   
}
}
else{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|numeric',
        'category' => 'required|numeric',
        'brand' => 'required|numeric',
        'cover_path' => 'required',
        'cover_path.*' => 'mimes:jpg,png,jpeg,gif,svg',
        'images' => 'required',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg',
        'type' => 'required',
        'color' => 'required',

    ]);

    if ($validator->fails()) {
       $validerror= $validator->errors()->first();
       Session::flash('message',  $validerror);
       return Redirect::back();
         }

         
    else{ 
        $name = $request->file('cover_path')->getClientOriginalName();
        $path = $request->file('cover_path')->store('/');
        if(is_null($request->details)){ $product=product::where('id', $id)->update(['cover_path'=>$path,'name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color]);
           }
        else{ $product=product::where('id', $id)->update(['cover_path'=>$path,'name' => $request->name ,'price'=>$request->price, 'discount'=>$request->discount,'categories_id'=>$request->category, 'brand'=>$request->brand,'type'=>$request->type,'color'=>$request->color,'discription'=>$request->details]);
           }
       
    

        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $key => $file)
           {
               $path = $file->store('/');
               $name = $file->getClientOriginalName();
               $insert[$key]['name'] = $name;
               $insert[$key]['path'] = $path;
               $insert[$key]['categories_id'] = $request->category;
               $insert[$key]['product_id'] = $id;

           }
        }
     

        $photo=photos::select('*')->where('product_id', $id)->delete();
   
       Photos::insert($insert);

       return redirect()->route('product_details',['id'=>$id]);
}
}
}

    /************end product dashboard */
    /******************Home page dashboard */
    public function home_page_dashboard(){
        
        return view('dashboard.dashboard_home_page');
    }
    /********end home page  */
    public function orders_dashboard(Request $request){
        
        if(is_null($request->status)){
            $orders=order::select('*')->orderby('updated_at','desc')->paginate(20);
            $status='all';
            $arr['status']=$status;
 
            return view('dashboard.dash_orders',$arr)->with('orders', $orders);
        }

        else{
            if(is_null($request->search_input)){
                if($request->status=='all'){$orders=order::select('*')->whereNot('status',$request->status)->paginate(20);
                    $status=$request->status;
                    $arr['status']=$status;
                    return view('dashboard.dash_orders',$arr)->with('orders', $orders);}
                else{ $orders=order::select('*')->where('status',$request->status)->paginate(20);
                    $status=$request->status;
                    $arr['status']=$status;
                    return view('dashboard.dash_orders',$arr)->with('orders', $orders);}
               
            }
          
           else{ 

            if($request->status=='all'){  $orders=order::select('*')->whereNot('status',$request->status)->where(function($query) use ($request) { 
                $query->where('id', 'like', '%' . $request->search_input . '%')
                    ->orWhere('payment_id', 'like', '%' . $request->search_input . '%')
                    ->orwhere('user_id', 'like', '%' . $request->search_input . '%');})->paginate(20);
                $search_input=$request->search_input;
                $status=$request->status;
                $arr['status']=$status;
                $arr['search_input']= $search_input;
                return view('dashboard.dash_orders',$arr)->with('orders', $orders);}
                else{  $orders=order::select('*')->where('status',$request->status)->where(function($query) use ($request) { 
                    $query->where('id', 'like', '%' . $request->search_input . '%')
                        ->orWhere('payment_id', 'like', '%' . $request->search_input . '%')
                        ->orwhere('user_id', 'like', '%' . $request->search_input . '%');})->paginate(20);
                    $search_input=$request->search_input;
                    $status=$request->status;
                    $arr['status']=$status;
                    $arr['search_input']= $search_input;
                    return view('dashboard.dash_orders',$arr)->with('orders', $orders);}
          
           
           }
            
        }

       
    }
    

    public function payment_dashboard(Request $request){
        
        if(is_null($request->status)){
            $Payments=Payment::select('*')->orderby('updated_at','desc')->paginate(20);
            $status='all';
            $arr['status']=$status;
            return view('dashboard.dash_payment',$arr)->with('Payments', $Payments);
        }
        else{
            if(is_null($request->search_input)){

            if($request->status=='all'){ $Payments=Payment::select('*')->whereNot('payment_status',$request->status)->orderby('updated_at','desc')->paginate(20);
                $status=$request->status;
                $arr['status']=$status;
                return view('dashboard.dash_payment',$arr)->with('Payments', $Payments);}
            else{ $Payments=Payment::select('*')->where('payment_status',$request->status)->paginate(20);
                $status=$request->status;
                $arr['status']=$status;
                return view('dashboard.dash_payment',$arr)->with('Payments', $Payments);}
      
        }
            else{
                if($request->status=='all'){
                $Payments=Payment::select('*')->whereNot('payment_status',$request->status)->where(function($query) use ($request) 
                { 
                $query->where('id', 'like', '%' . $request->search_input . '%')
                    ->orWhere('payment_id', 'like', '%' . $request->search_input . '%')
                    ->orwhere('user_id', 'like', '%' . $request->search_input . '%')
                    ->orwhere('amount', 'like', '%' . $request->search_input . '%');
                })->orderby('updated_at','desc')->paginate(20);
                $status=$request->status;
                $arr['status']=$status;
                $search_input=$request->search_input;
                $arr['search_input']= $search_input;
                return view('dashboard.dash_payment',$arr)->with('Payments', $Payments);
            }

            else{
                $Payments=Payment::select('*')->where('payment_status',$request->status)->where(function($query) use ($request) 
                { 
                $query->where('id', 'like', '%' . $request->search_input . '%')
                    ->orWhere('payment_id', 'like', '%' . $request->search_input . '%')
                    ->orwhere('user_id', 'like', '%' . $request->search_input . '%')
                    ->orwhere('amount', 'like', '%' . $request->search_input . '%');
                })->orderby('updated_at','desc')->paginate(20);
                $status=$request->status;
                $arr['status']=$status;
                $search_input=$request->search_input;
                $arr['search_input']= $search_input;
                return view('dashboard.dash_payment',$arr)->with('Payments', $Payments);
            }

            }

        }
    }
       
    
    public function canceled_payment_dashboard(Request $request){
        $payments= new payment;
        $payments=payment::find($request->id);
        $payments->payment_status='canceled';
        $payments->update();

        $order= new order;
        $order=order::select('*')->where('payment_id',$payments->id)->first();
        $order->status='canceled';
        $order->update();
        
         return response()->json(['id' =>$request->id,'payments'=>$payments]);
    }

    public function invoice_dashboard(Request $request,$id){
        $payment=payment::select('*')->where('id', $id)->first();
        $order=order::select('*')->where('payment_id',$id)->first();
        $address=address::select('*')->where('id',$order->address_id)->first();
        $ordered_product=ordered_products::select('*')->where('order_id',$order->id)->get();
        $ordered_product_sum=ordered_products::select('*')->where('order_id',$order->id)->sum('price');

        $arr['payment']= $payment;
        $arr['order']= $order;
        $arr['ordered_product']= $ordered_product;
        $arr['ordered_product_sum']= $ordered_product_sum;
        $arr['address']= $address;

    return view('dashboard.dash_Invoice',$arr);
    }
    public function addcategory(Request $request){
        $category = categories::updateOrCreate(
            ['name' => $request->name],
            ['name' => $request->name , 'status'=>1]
        );
         return response()->json(['category'=>$category]);
    }
    
    public function addbrand(Request $request){
        $brand = brand::updateOrCreate(
            ['name' => $request->name],
            ['name' => $request->name ]
        );
         return response()->json(['brand'=>$brand]);
    }
 public function add_area_dashboard(){
    $products=product::select('*')->where('avalability',1)->get();
    $arr['products']=$products;
    return view('dashboard.dash_addarea',$arr);
 }
 public function add_area(Request $request){
    $product=product::select('*')->where('avalability',1)->where('id',$request->product_id)->first();
    $name = $request->file('images')->getClientOriginalName();
    $path = $request->file('images')->store('/home_dbs');

    $area= new area;
    $area->seaction_name=$request->area;
    $area->headtitle=$request->headtitle;
    $area->photo_path=$product->cover_path;
    $area->backround_path=$path;
    $area->discription=$request->details;
    $area->note=$request->note;
    $area->price=$product->price;
    $area->product_id=$request->headtitle;

    return view('dashboard.dash_addarea',$arr);

}
  
}
