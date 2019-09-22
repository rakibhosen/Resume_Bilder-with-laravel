<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Introduction;
use Image;
use File;

class IntroductionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $introductions = Introduction::orderBy('id','desc')->get();
        return view('backend.pages.introduction.index',compact('introductions'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
         'description'  => 'required',
         'title'  => 'required',
         'image'  => 'required',

        ]);
        $introduction= new Introduction();
        $introduction->title = $request->title;
        $introduction->description = $request->description;
        
         //introductionImage Model insert image
     if ($request->hasFile('image')) {
       //insert that image
       $image = $request->file('image');
       $img = time() . '.'. $image->getClientOriginalExtension();
       $location = public_path('img/introduction/'.$img);
       Image::make($image)->save($location);
       $introduction->image = $img;
     }
     $introduction->save();
     session()->flash('success', 'A new introduction has added successfully');
     return redirect()->route('admin.introduction.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'description'  => 'required',
        'title'  => 'required',
        'image'  => 'required',
 
       ]);
       
       $introduction= introduction::find($id);
       $introduction->title = $request->title;
       $introduction->description = $request->description;
       $introduction->save();
       
        //introductionImage Model insert image
 
        if(count($request->image)>0){
         // delete the old file from the folder
         if(File::exists('img/introduction/'.$introduction->image)){
            File::delete('img/introduction/'.$introduction->image);
         }
         
         $image = $request->file('image');
         $img = time().'.'.$image->getClientOriginalExtension();
         $location = public_path('img/introduction/'.$img);
         Image::make($image)->save($location);
         $introduction->image =$img;
         $introduction->save();
       }
    session()->flash('success', 'A new introduction has added successfully');
    return redirect()->route('admin.introduction.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $introduction = introduction::find($id);
       if(!is_null($introduction)){
 
         $introduction->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
