<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::paginate(6);
		return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$cats = Category::all();
	    return view('admin.product.create',compact('cats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request,[
		    'name' => 'string|max:255',
		    'title' => 'string|max:255',
		    'body' => 'required',
		    'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
	    ]);

	    $pro = ($request->isMethod("PUT"))? Product::findOrFail($request->id) : new Product;
	    if ($request->hasFile('image')){
		    $pubs = Product::where('image', $pro->image)->get();
		    if(!$pubs->count() > 1)
		    (file_exists($pro->image))? unlink($pro->image): '';
		    $name = date('Y_m_d_H-i-s').".".$request->image->getClientOriginalExtension();
		    $request->image->move(public_path('uploads/product/'), $name);
		    $image = 'uploads/product/'.$name;
	    }
	    else{
		    $image = $pro->image;
	    }
	    $pro->name = $request->name;
	    $pro->title = $request->title;
	    $pro->category_id = $request->cat_id;
	    $pro->slug = str_slug($request->name);
	    $pro->body = $request->body;
	    $pro->status  = ($request->status == 1)?true:false;
	    $pro->image = $image;
	    $pro->save();
	    return redirect('/dashboard/product')->with('success','Product added');




    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $cats = Category::all();
	    $product = Product::findOrFail($id);
	    return view('admin.product.update',compact('product','cats'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::findOrFail($id);
	    $pubs = Product::where('image', $pro->image)->get();
	    if($pubs->count() > 1)
		    ($pro->delete())? $m = "Deleted!":$m = "Not Deleted!" ;

	    else{
		    (file_exists($pro->image))? unlink($pro->image) : '';
		    ($pro->delete())? $m = "Deleted!":$m = "Not Deleted!" ;
	    }
	    return back()->with('success',$m);

    }

    public function duplicate($id){

		$pro = Product::findOrFail($id);
		$dup = new Product ;

		$dup->name = $pro->name;
		$dup->title = $pro->title;
		$dup->category_id = $pro->category_id;
		$dup->slug = str_slug($pro->title);
		$dup->body = $pro->body;
		$dup->status = $pro->status;
		$dup->image = $pro->image;
		$dup->save();
		return redirect('/dashboard/product')->with('success','Product duplicated!');

	}

}
