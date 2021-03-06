<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Comment;
use App\Post;
use Auth;

class CommentsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request, [
	    'body' => "required|min:15",
	    'post_id' => "required|integer",
	]);
        
	$comment = new Comment;
	$comment->body = $request->body;
	$comment->created_by = auth()->user()->id;
        
	$post = Post::findOrFail($request->post_id);
     
	
	$post->comments()->save($comment);
        Session::flash('success','Your comment was successfully created');
	
	return redirect()->route('posts.show', $post->id);
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
	$post = Post::findOrFail($comment->post_id);
	if($comment->user->id == Auth::id()||auth::user()->hasRole('admin') ) {
             return view('dashboard.comments.edit', ['comment' => $comment, 'post' =>$post]);
	}
	     return abort(403);
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
    //validate the comment
	$this->validate($request, [
	    'body' => "required|min:15",
	]);

	//process the data and update the post
	$comment = Comment::find($id);
	
	$comment->body = $request->body;    
	$comment->updated_by = auth()->user()->id;
	$post = Post::findOrFail($request->post_id);
	$post->comments()->save($comment);
	Session::flash('success','The comment was successfully updated');
	return redirect()->route('posts.show', ['post' => $post->id]);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
    $comment->delete();
    return redirect('posts.index')->with('success', 'Comment removed');
    }
    
    public function storeFrontend(Request $request)
    {
        $this->validate($request, [
	    'body' => "required|min:15",
	    'post_id' => "required|integer",
	]);
	$comment = new Comment;
	$comment->body = $request->body;
	$comment->created_by = auth()->user()->id;
	
	$post = Post::findOrFail($request->post_id);
	$post->comments()->save($comment);
	
	return redirect()->route('frontend.posts.show', $post->id);
    }

}
