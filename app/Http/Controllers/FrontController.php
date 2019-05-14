<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use App\Publication;

class FrontController extends Controller
{
    public function main()
    {
    	$cats = Category::where('status',true)->get();
	    return view('front.main',compact('cats'));
    }


	public function index($slug){
		$cat = Category::where('slug',$slug)->first();
		$pubs = Publication::paginate(4);
		return view('front.index',compact('cat','pubs'));
	}


	public function product(){
		return view('front.product');
	}
	public function publication($slug){
    	return "Don't exist yet!";
	}


}
