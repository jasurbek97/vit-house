<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$pubs = Publication::paginate(6);
		return view('admin.publ.index',compact('pubs'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create()
	{
		return view('admin.publ.create');
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
			'header1' => 'string|max:255',
			'header2' => 'string|max:255',
			'title' => 'string|max:255',
			'int1' => 'string|max:100',
			'int2' => 'string|max:100',
			'body' => 'required',
			'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$pro = ($request->isMethod("PUT"))? Publication::findOrFail($request->id) : new Publication;
		if ($request->hasFile('image')){
			$pubs = Publication::where('image', $pro->image)->get();
			if(!$pubs->count() > 1)
			(file_exists($pro->image))? unlink($pro->image): '';

			$name = date('Y_m_d_H-i-s').".".$request->image->getClientOriginalExtension();
			$request->image->move(public_path('uploads/pubs/'), $name);
			$image = 'uploads/pubs/'.$name;
		}
		else{
			$image = $pro->image;
		}
		$pro->title = $request->title;
		$pro->header1 = $request->header1;
		$pro->header2 = $request->header2;
		$pro->int1 = $request->int1;
		$pro->int2 = $request->int2;
		$pro->slug = str_slug($request->title);
		$pro->body = $request->body;
		$pro->image = $image;
		$pro->save();
		return redirect('/dashboard/publication')->with('success','Publication   added');

	}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $pub = Publication::findOrFail($id);
	    return view('admin.publ.update',compact('pub'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
	{

		$pro = Publication::findOrFail($id);
		$pubs = Publication::where('image', $pro->image)->get();
		if($pubs->count() > 1)
			($pro->delete())? $m = "Deleted!":$m = "Not Deleted!" ;

		else{
			(file_exists($pro->image))? unlink($pro->image) : '';
			($pro->delete())? $m = "Deleted!":$m = "Not Deleted!" ;
		  }

		return back()->with('success',$m);
	}

	public function duplicate($id){

		$pro = Publication::findOrFail($id);
		$dup = new Publication ;

		$dup->title = $pro->title;
		$dup->header1 = $pro->header1;
		$dup->header2 = $pro->header2;
		$dup->int1 = $pro->int1;
		$dup->int2 = $pro->int2;
		$dup->slug = str_slug($pro->title);
		$dup->body = $pro->body;
		$dup->image = $pro->image;
		$dup->save();
		return redirect('/dashboard/publication')->with('success','Publication   duplicated');

	}
}
