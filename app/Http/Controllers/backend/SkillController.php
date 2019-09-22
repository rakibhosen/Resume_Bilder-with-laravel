<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Skill;
use Image;
class SkillController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $skills = Skill::orderBy('id','asc')->get();
        return view('backend.pages.skill.index',compact('skills'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
        
         'title'  => 'required',
         'level'  => 'required',

        ]);
        $skill= new Skill();
        $skill->title = $request->title;
        $skill->level = $request->level;
    
        $skill->save();
        session()->flash('success', 'A new skill has added successfully');
        return redirect()->route('admin.skill.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'title'  => 'required',
        'level'  => 'required',
 
       ]);
       
       $skill= skill::find($id);
       $skill->title = $request->title;
       $skill->level = $request->level;
       $skill->save();
       
    session()->flash('success', 'A new skill has added successfully');
    return redirect()->route('admin.skill.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $skill = skill::find($id);
       if(!is_null($skill)){
 
         $skill->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
