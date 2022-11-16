<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Models\categories;
use App\Models\sub_categories;
use App\Models\photos;

class photo extends Controller
{
    public function index(){
        return view('photo');
    }
    public function upload_photo(Request $request){
        $validateImageData = $request->validate([
            'images' => 'required',
                'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);
            if($request->hasfile('images'))
             {
                foreach($request->file('images') as $key => $file)
                {
                    $path = $file->store('/');
                    $name = $file->getClientOriginalName();
                    $insert[$key]['name'] = $name;
                    $insert[$key]['path'] = $path;
                }
             }
            Photos::insert($insert);
     
            return redirect()->back();
    }
    public function profile_image(Request $request){
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
    
           $name = $request->file('image')->getClientOriginalName();
    
           $path = $request->file('image')->store('public/users/images');
    
    
           $save = new Photos;
    
           $save->name = $name;
           $save->path = $path;
    
           $save->save();
    
         return redirect()->back();
    
    }
}
