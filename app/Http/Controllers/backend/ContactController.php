<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $contacts = Contact::orderBy('id','asc')->get();
        return view('backend.pages.contact.index',compact('contacts'));
    }


    // insert method-----------------------------------------------
    public function store(Request $request){
        $this->validate($request,[
        
         'title'  => 'nullable',
         'web'  => 'required',
         'phone'  => 'required',
         'gmail'  => 'required',
         'link_url'  => 'nullable',
       

        ]);
        $contact= new contact();
        $contact->title = $request->title;
        $contact->web = $request->web;
        $contact->phone = $request->phone;
        $contact->gmail = $request->gmail;
        $contact->link_url = $request->link_url;
        
    
        $contact->save();
        session()->flash('success', 'A new contact has added successfully');
        return redirect()->route('admin.contact.index');
     }
 
 
 
     // update method----------------------------------------------
     public function update(Request $request,$id){
       $this->validate($request,[
        'title'  => 'nullable',
        'web'  => 'required',
        'phone'  => 'required',
        'gmail'  => 'required',
        'link_url'  => 'nullable',
        
 
       ]);
       
       $contact= contact::find($id);
       $contact->title = $request->title;
       $contact->web = $request->web;
       $contact->phone = $request->phone;
       $contact->gmail = $request->gmail;
       $contact->link_url = $request->link_url;

       
      
      $contact->save();

      return back()->with('success', 'Your files has been successfully added');

 
   }
 
 // .......................delete method
     public function delete($id){
       $contact = contact::find($id);
       if(!is_null($contact)){
 
         $contact->delete();
       }
       session()->flash('success','Data has been deleted');
            return back();
 
     }
}
