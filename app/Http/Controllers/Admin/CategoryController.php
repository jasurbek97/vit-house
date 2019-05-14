<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('admin.cats.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.cats.create');

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
		    'body' => 'required',
		    'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
	    ]);
        $cats = ($request->isMethod("PUT"))? Category::findOrFail($request->id) : new Category;
       if ($request->hasFile('image')){
	       (file_exists($cats->image))? unlink($cats->image): '';
	       $name = date('Y_m_d_H-i-s').".".$request->image->getClientOriginalExtension();
	       $request->image->move(public_path('uploads/cats/'), $name);
	       $image = 'uploads/cats/'.$name;
       }
       else{
       	$image = $cats->image;
       }
       $cats->name = $request->name;
	   $cats->slug = str_slug($request->name);
	   $cats->body = $request->body;
       $cats->status  = ($request->status == 1)?true:false;
       $cats->image = $image;
       $cats->save();
       return redirect('/dashboard/category')->with('success','Category added');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$category = Category::findOrFail($id);
        return view('admin.cats.update',compact('category'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = Category::findOrFail($id);
	    (file_exists($cats->image))? unlink($cats->image): '';
	    foreach ($cats->products as $pro)
        {
	        (file_exists($pro->image))? unlink($pro->image): '';
	        $pro->delete();
        }
        $cats->delete();
	    return back()->with('success','Category deleted!');
    }
}
