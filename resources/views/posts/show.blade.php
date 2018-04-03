@extends('admin_templatenew')

@section('content')
<div class='container'>
    @if(isset($success))
    <h1>{{ $success}}</h1>
    @endif
    
    <div class="panel panel-default">	
	<div class="panel-body">

    <h1> {{ $post->title }} </h1>
    <p class='lead'>
	{!! $post->body !!}
    </p>
    <p>
	Submitted by <strong> {{ $post->user->name }} </strong> {{ $post->created_at->diffForHumans() }}
	<br/>
	@if ($post->created_at != $post->updated_at)
	<p>Last edited by on {{ $post->editor->name}} {{ $post->updated_at->diffForHumans() }}</p>
	@endif
    </p>
    @if(!Auth::guest())
	@if(Auth::user()->id == $post->created_by)
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit </a> 
	{!!Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST', 'class' => 'pull-right' ]) !!}
	{{Form::hidden('_method','DELETE')}}
	{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
	{!!Form::close()!!}
	@endif
    @endif
    <hr/>
    <!-- display all of the comments for this post -->
    @if($post->comments->count() >0)
    
    @foreach($post->comments as $comment)
    
	    
	    @if(isset($successans))
	    <h6>{{ $successans}}</h6>
	    @endif
	      <p>
	    {{ $comment->body }}
	      </p>
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
    @endforeach
    @else
	<p>
	    There are no comment to this post yet. Please...
	</p>
    @endif
    
    <!-- display the form to submit a new comment -->
{{-- <form action="{{ route('comments.store') }}" method="POST"> --}}
	<form action="{{ route('comments.store') }}" method="POST">
	{{ csrf_field() }}
	
	<h4> Write your own comment </h4>
	<textarea class="form-control" name="body" rows="2"></textarea>
	<input type="hidden" value="{{ $post->id }}" name="post_id">
	<button class="btn btn-primary">Submit comment</button>
	    
    </form> 
</div>

@endsection

















