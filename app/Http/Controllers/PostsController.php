<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
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
        //go to the model and get a group of records
	$posts = Post::orderBy('id','desc')->paginate(5);
	//return the view, and pass in the group of records to loop through
	return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
        //validate the form data
	$this->validate($request, [
	    'title' => 'required|max:255',
	    'body' => 'required',
	    'cover_image'=> 'image|nullable|max:1999'
	]);
	
	//process the data and submit it
	$post = new Post();
	$post->title = $request->title;
	$post->body = $request->body; 
	$post->created_by= auth()->user()->id;
	//if succesful, we want to redirect	
	if($post->save()){
	    return redirect()->route('posts.show', $post->id);
	} else {
	    return redirect()->route('posts.create');
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Use the model to find 1 record from the database
	$post = Post::findOrFail($id);
	//show the view and pass the record to the view	
	return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
	
	if($post->user->id != Auth::id()) {
	    return abort(403);
	}
	    return view('posts.edit', ['post' => $post]);
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
    //validate the form data
	$this->validate($request, [
	    'title' => 'required|max:255',
	]);
    //process the data and update the post
	$post = Post::find($id);
	$post->title = $request->title;
	$post->body = $request->body;  
	$post->updated_by = auth()->user()->id;
	$post->save();
	return view('posts.show', ['post' => $post, 'success' => 'Post updated']);
	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
	$post->delete();
	return redirect('/posts')->with('success', 'Post removed');
    }
}
