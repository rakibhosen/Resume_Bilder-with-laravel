<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
   public function index(){
       return view('backend.layout.master');
   }
}
