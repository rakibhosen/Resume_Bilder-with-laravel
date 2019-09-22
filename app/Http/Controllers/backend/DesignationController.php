<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Designation;
use Image;

class DesignationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $designations = Designation::orderBy('id','desc')->get();
        return view('backend.pages.designation.index',compact('designations'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
         'name'  => 'required',
         'title'  => 'required',
 
        ]);
        $designation= new Designation();
        $designation->name = $request->name;
        $designation->title = $request->title;
        
         //designationImage Model insert image
     if ($request->hasFile('image')) {
       //insert that image
       $image = $request->file('image');
       $img = time() . '.'. $image->getClientOriginalExtension();
       $location = public_path('img/designation/'.$img);
       Image::make($image)->save($location);
       $designation->image = $img;
     }
     $designation->save();
     session()->flash('success', 'A new designation has added successfully');
     return redirect()->route('admin.designation.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'name'  => 'required',
        'title'  => 'required',
 
       ]);
       
       $designation= designation::find($id);
       $designation->name = $request->name;
       $designation->title = $request->title;
       $designation->save();
       
        //designationImage Model insert image
 
        if(count($request->designation_image)>0){
         // delete the old file from the folder
         if(File::exists('img/designation/'.$designation->image)){
            File::delete('img/designation/'.$designation->image);
         }
         
         $image = $request->file('designation_image');
         $img = time().'.'.$image->getClientOriginalExtension();
         $location = public_path('img/designation/'.$img);
         Image::make($image)->save($location);
         $designation->image =$img;
         $designation->save();
       }
    session()->flash('success', 'A new designation has added successfully');
    return redirect()->route('admin.designation.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $designation = designation::find($id);
       if(!is_null($designation)){
 
         $designation->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
