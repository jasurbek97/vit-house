<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Publication;

class AdminController extends Controller
{
    public function index( ){
	    $order_count = Order::where('view',false)->count();
	    $product_count = Product::where('status',1)->count();
	    $cat_count = Category::where('status',1)->count();
	    $pub_count = Publication::count();
	    return view('admin.index',compact('order_count','product_count','cat_count','pub_count'));

    }

}
