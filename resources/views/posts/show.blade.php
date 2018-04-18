@extends('admin_templatenew')
@section ('title')
| {{ $post->title }}
@endsection
@section('content')
<div class='container'>
    @if (Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
<div class='row'>
<div class='well box box-solid box-primary'> CATEGORY: 
	@foreach($post->categories as $category) 
<strong> {{$category->name}} | </strong>
@endforeach
</div>	
<div class='col-md-8 well'>    	

    <h1> {{ $post->title }} </h1>
    <img style='width: 100%' src='/storage/images/posts/{{$post->cover_image}}'>
<br><br>
    <p class='lead'>
	{!! $post->body !!}
    </p>
    <hr>
    <div class='tags'>
    	@foreach ($post->tags as $tag)
    		<span class="label label-default"> {{ $tag->name }}</span>
    	@endforeach
    </div>	
</div> 
<div class='col-md-3'> 
<div class="well"> 
    <p>
	Submitted by <strong> {{ $post->user->name }} </strong> {{ $post->created_at->diffForHumans() }}
	<br/>
	@if ($post->created_at != $post->updated_at)
	<p>Last edited by {{ $post->editor->name}} {{ $post->updated_at->diffForHumans() }}</p>
	@endif
    </p>
    @if(!Auth::guest())
	@if(Auth::user()->id == $post->created_by)
	<a href="{{route('posts.edit',$post->id)}}" class="btn btn-default"> Edit </a> 
	{!!Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST', 'class' => 'pull-right' ]) !!}
	{{Form::hidden('_method','DELETE')}}
	{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
	{!!Form::close()!!}
	@endif
    @endif
 </div>   
 </div>   
    <hr>
 <div class='col-md-8 well'>   
    <!-- display all of the comments for this post -->
    @if($post->comments->count() >0)
    
    @foreach($post->comments as $comment)
    
	    
	    @if(isset($successans))
	    <h6>{{ $successans}}</h6>
	    @endif
	      <p>
	    {!! $comment->body !!}
	      </p>
</div>
<div class='col-md-3'> 
<div class="well"> 

	      <h6> Answered by {{ $comment->user->name }} on {{ $comment->created_at->diffForHumans() }}</h6>
	      @if ($comment->created_at != $comment->updated_at)
	      <h6> Last edited on {{ $comment->updated_at->diffForHumans() }}</h6>
	      @endif
	      @if(!Auth::guest())
		@if(Auth::user()->id == $comment->created_by)
		<a href="/comments/{{$comment->id}}/edit" class="btn btn-default"> Edit </a> 
		{!!Form::open(['action'=>['CommentsController@destroy', $comment->id],'method'=>'POST', 'class' => 'pull-right' ]) !!}
		{{Form::hidden('_method','DELETE')}}
		{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		{!!Form::close()!!}
		@endif
	    @endif
 </div>
 </div>   
	
    </div>
    @endforeach
    @else
	<hr><p>
	    There are no comment to this post yet. Please write your own comment
	</p>
    @endif
    
    <!-- display the form to submit a new comment -->
{{-- <form action="{{ route('comments.store') }}" method="POST"> --}}
	<form action="{{ route('comments.store') }}" method="POST">
	{{ csrf_field() }}
	<textarea class="form-control" name="body" rows="2"></textarea>
	<input type="hidden" value="{{ $post->id }}" name="post_id">
	<button class="btn btn-primary">Submit comment</button>
	    
    </form> 
</div>

@endsection

















