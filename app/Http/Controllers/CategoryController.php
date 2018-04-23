<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth', ['except' => 'index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$categories = Category::all();
	return view('dashboard.categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('name'=>'required|max:255'));
	$category = new Category;
	$category->name = $request->name;
	$category->save();
	
	Session::flash('success','New Category was successfully created');
	
	return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
	return view('dashboard.categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$category = Category::find($id);
	return view('dashboard.categories.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
	$this->validate($request, ['name'=>'required|max:255']);
	$category->name = $request->name;
	$category->save();
	Session::flash('success','Successfully updated your category');
	return redirect()->route('categories.show',$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
	$category->posts()->detach();
	
	$category->delete();
	
	Session::flash('success','Category was deleted successfully');
	
	return redirect()->route('categories.index');
    }
    
    public function showFrontend($id)
    {
        $category = Category::find($id);
	return view('frontend.categories.show')->withCategory($category);
    }
}
