<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\SubCategorie;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd('sss');
        $category = Category::get();
        //dd($category);
        return view('form',compact('category'));
    }
    public function getSubcategory($category_id)
    {
        dd('111');
    }
    
}
