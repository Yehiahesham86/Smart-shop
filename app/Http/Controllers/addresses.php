<?php

namespace App\Http\Controllers;
use App\Models\address;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class addresses extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   public function check(Request $request){
    $validator = Validator::make($request->all(), [
        'address' => 'required',
        'city' => 'required',
        'post_code' => 'required|numeric',
        'country' => 'required',
        'state' => 'required',

        ]);
     
        
           if ($validator->fails()) {
           $validerror= $validator->errors()->first();

            return response()->json(['validator'=>  $validerror]);
      
           } else{ 
            $address = address::firstOrCreate(
                ['address' => $request->address, 'city' => $request->city],
                ['post_code' => $request->post_code, 'state' => $request->state,'country'=> $request->country ,'user_id'=>Auth::user()->id]
                
            );
           
            $request->session()->put('address', $address->id);
        
            return response()->json(['address'=>$address->id]);}
       

         

           


        

       
        
   }
}
