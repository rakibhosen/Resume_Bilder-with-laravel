<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Social;

class SocialController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $socials = Social::orderBy('id','asc')->get();
        return view('backend.pages.social.index',compact('socials'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
        
         'facebook'  => 'nullable',
         'google'  => 'nullable',
         'youtube'  => 'nullable',
         'linkedin'  => 'nullable',
        ]);
        $social= new social();
        $social->facebook = $request->facebook;
        $social->google = $request->google;
        $social->linkedin = $request->linkedin;
        $social->youtube = $request->youtube;
    
        $social->save();
        session()->flash('success', 'A new social has added successfully');
        return redirect()->route('admin.social.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'facebook'  => 'nullable',
        'google'  => 'nullable',
        'youtube'  => 'nullable',
        'linkedin'  => 'nullable',
 
       ]);
       
       $social= social::find($id);
       $social->facebook = $request->facebook;
       $social->google = $request->google;
       $social->linkedin = $request->linkedin;
       $social->youtube = $request->youtube;
       $social->save();
       
    session()->flash('success', 'A new social has added successfully');
    return redirect()->route('admin.social.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $social = social::find($id);
       if(!is_null($social)){
 
         $social->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
