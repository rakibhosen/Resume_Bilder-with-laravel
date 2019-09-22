<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Service;
use Image;

class ServiceController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $services = service::orderBy('id','asc')->get();
        return view('backend.pages.service.index',compact('services'));
    }

// insert method-----------------------------------------------
public function store(Request $request){
    $this->validate($request,[
    'heading'  => 'nullable',
    'title'  => 'required',
     'description'  => 'required',
     'image'  => 'required',

    ]);
    $service= new Service();
    $service->title = $request->title;
    $service->heading = $request->heading;
    $service->description = $request->description;
    
     //serviceImage Model insert image
 if ($request->hasFile('image')) {
   //insert that image
   $image = $request->file('image');
   $img = time() . '.'. $image->getClientOriginalExtension();
   $location = public_path('img/service/'.$img);
   Image::make($image)->save($location);
   $service->image = $img;
 }
 $service->save();
 session()->flash('success', 'A new service has added successfully');
 return redirect()->route('admin.service.index');
 }



 // update method----------------------------------------------
 public function update(Request $request,$id){
   $this->validate($request,[
    'heading'  => 'nullable',
    'title'  => 'required',
     'description'  => 'required',
     'image'  => 'required',

   ]);
   
   $service= service::find($id);
   $service->title = $request->title;
   $service->heading = $request->heading;
   $service->description = $request->description;
   $service->save();
   
    //serviceImage Model insert image

    if(count($request->image)>0){
     // delete the old file from the folder
     if(File::exists('img/service/'.$service->image)){
        File::delete('img/service/'.$service->image);
     }
     
     $image = $request->file('image');
     $img = time().'.'.$image->getClientOriginalExtension();
     $location = public_path('img/service/'.$img);
     Image::make($image)->save($location);
     $service->image =$img;
     $service->save();
   }
session()->flash('success', 'A new service has added successfully');
return redirect()->route('admin.service.index');

}

// .......................delete method
 public function delete($id){
   $service = service::find($id);
   if(!is_null($service)){

     $service->delete();
   }
   session()->flash('success','Data has been deleted');
        return back();

 }
}
