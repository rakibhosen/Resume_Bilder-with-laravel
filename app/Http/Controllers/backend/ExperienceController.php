<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Experience;

class ExperienceController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $experiences = Experience::orderBy('id','asc')->get();
        return view('backend.pages.experiences.index',compact('experiences'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
        
         'title'  => 'required',
         'location'  => 'required',
         'year'  => 'required',
         'description'  => 'nullable',

        ]);
        $experience= new experience();
        $experience->title = $request->title;
        $experience->location = $request->location;
        $experience->year = $request->year;
        $experience->description = $request->description;
    
        $experience->save();
        session()->flash('success', 'A new experience has added successfully');
        return redirect()->route('admin.experience.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'title'  => 'required',
        'location'  => 'required',
        'year'  => 'required',
        'description'  => 'nullable',
 
       ]);
       
       $experience= experience::find($id);
       $experience->title = $request->title;
       $experience->location = $request->location;
       $experience->year = $request->year;
       $experience->description = $request->description;
       $experience->save();
       
    session()->flash('success', 'A new experience has added successfully');
    return redirect()->route('admin.experience.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $experience = experience::find($id);
       if(!is_null($experience)){
 
         $experience->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
