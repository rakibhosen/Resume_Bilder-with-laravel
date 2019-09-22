<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Education;

class EducationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $educations = Education::orderBy('id','asc')->get();
        return view('backend.pages.education.index',compact('educations'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
        
         'title'  => 'required',
         'description'  => 'nullable',
         'institute'  => 'required',
         'year'  => 'nullable',
         'session'  => 'nullable',
         'aggregate'  => 'nullable',

        ]);
        $education= new education();
        $education->title = $request->title;
        $education->description = $request->description;
        $education->institute = $request->institute;
        $education->year = $request->year;
        $education->session = $request->session;
        $education->aggregate = $request->aggregate;
    
        $education->save();
        session()->flash('success', 'A new education has added successfully');
        return redirect()->route('admin.education.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'title'  => 'required',
        'description'  => 'nullable',
        'institute'  => 'required',
        'year'  => 'nullable',
        'session'  => 'nullable',
        'aggregate'  => 'nullable',
 
       ]);
       
       $education= Education::find($id);
       $education->title = $request->title;
       $education->description = $request->description;
       $education->institute = $request->institute;
       $education->year = $request->year;
       $education->session = $request->session;
       $education->aggregate = $request->aggregate;
       $education->save();
       
    session()->flash('success', 'A new education has added successfully');
    return redirect()->route('admin.education.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $education = Education::find($id);
       if(!is_null($education)){
 
         $education->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
