<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Footer;


class FooterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $footers = Footer::orderBy('id','asc')->get();
        return view('backend.pages.footer.index',compact('footers'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
        
         'first_title'  => 'required',
         'second_title'  => 'required',
        ]);
        $footer= new footer();
        $footer->first_title = $request->first_title;
        $footer->second_title = $request->second_title;
    
        $footer->save();
        session()->flash('success', 'A new footer has added successfully');
        return redirect()->route('admin.footer.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'first_title'  => 'required',
        'second_title'  => 'required',
 
       ]);
       
       $footer= footer::find($id);
       $footer->first_title = $request->first_title;
       $footer->second_title = $request->second_title;
       $footer->save();
       
    session()->flash('success', 'A new footer has added successfully');
    return redirect()->route('admin.footer.index');
 
   }
 
 // .......................delete method
     public function delete($id){
       $footer = footer::find($id);
       if(!is_null($footer)){
 
         $footer->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
