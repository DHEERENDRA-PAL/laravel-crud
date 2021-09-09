<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategorie;
use App\Category;

class UserController extends Controller
{
    //
   public function index()
   {
     
       return view('form');
   }
}
