<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Models\photos;
use App\Models\User;

class profile extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
     public function index()
    {
        
        return view('profile');
    }
    public function edit(Request $request){
        $prifile=user::find(Auth::user()->id);
        $prifile->name=$request->name;
        $prifile->phone=$request->phone;
        $prifile->save();
        return redirect()->back();
    }
}
