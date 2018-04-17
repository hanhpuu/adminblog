<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Tag;
use App\Category;
use Illuminate\Support\Facades\Session;

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
        $tags = Tag::all();
	$categories = Category::all();
	return view('posts.create')->withTags($tags)->withCategories($categories);
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
//	handle file upload
	if($request->hasFile('cover_image')){
//      get file name with extension
	$filenameWithExt = $request->file('cover_image')->getClientOriginalName();
//	get just file name
	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//      get just extension
	    $extension = $request->file('cover_image')->getClientOriginalExtension();
//	    filename to store
	    $filenameToStore = $filename.'_'.time().'.'.$extension;
//	    upload the image
	    $path = $request->file('cover_image')->storeAs('public/images',$filenameToStore);
	}else{
	    $filenameToStore = 'noimage.jpg';
	}        
	//process the data and submit it
	$post = new Post();
	$post->title = $request->title;
	$post->body = $request->body; 
	$post->created_by= auth()->user()->id;
        $post->cover_image = $filenameToStore;
	//if succesful, we want to redirect	
	$post->save();
	// add tag
	$tags = $request->input('tags');
	if(strlen($tags) > 0) {
	    Tag::addTag($post, explode(',', $tags));
	}
	//add categories
	if($request->categories) {
	    $post->categories()->sync($request->categories);
	}
	Session::flash('success','The blog post was successfully saved');
	return redirect()->route('posts.show', $post->id);
	
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
	$tags = $post->tags()->get();
	$tags2 = array();
	foreach ($tags as $tag) {
	    $tags2[$tag->id] = $tag->name;
	}
    $cats = $post->categories()->get();
    $cats2 = array();
    foreach ($cats as $cat) {
        $cats2[$cat->id] = $cat->name;
    }
	
	if($post->user->id != Auth::id()) {
	    return abort(403);
	}
	    return view('posts.edit', ['post' => $post, 'tags2'=>$tags2, 'cats2' =>$cats2]);
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
	$tags = $request->input('tags');
	Tag::addTag($post, explode(',', $tags));
	$post->categories()->sync($request->categories);
    
	Session::flash('success','The blog post was successfully updated');
	return redirect()->route('posts.show', $post->id);
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
	$post->tags()->detach();
	$post->delete();
	Session::flash('success','Post removed');
	return redirect()->route('posts.index');
    }
    
    public function search(Request $request) 
    {
        $searchTerm = $request->input('s');
        $posts = Post::search($searchTerm);
        return view('posts.searchResult', compact('posts', 'searchTerm'));
    }
    
    public function showFrontend($id)
    {
        //Use the model to find 1 record from the database
	$post = Post::findOrFail($id);
	//show the view and pass the record to the view	
	return view('frontend.posts.show')->with('post', $post);
    }
}
