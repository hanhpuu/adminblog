@extends('admin_templatenew')

@section('content')
<div class='container'>
    @if(isset($success))
    <h1>{{ $success}}</h1>
    @endif
    <h1> {{ $post->title }} </h1>
    <p class='lead'>
	{{ $post->body }}
    </p>
    <p>
	Submitted by: {{ $post->user->name }} on {{ $post->created_at->diffForHumans() }}
	<br/>
	Last edited on {{ $post->updated_at->diffForHumans() }}
    </p>
    @if(!Auth::guest())
	@if(Auth::user()->id == $post->user_id)
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit </a> 
	@endif
    @endif
    <hr/>
    <!-- display all of the comments for this post -->
    @if($post->comments->count() >0)
    
    @foreach($post->comments as $comment)
    <div class="panel panel-default">	
	<div class="panel-body">
	    
	    @if(isset($successans))
	    <h6>{{ $successans}}</h6>
	    @endif
	      <p>
	    {{ $comment->body }}
	      </p>
	      <h6> Answered by {{ $comment->user->name }} on {{ $comment->created_at->diffForHumans() }}</h6>
	      <h6> Last edited on {{ $comment->updated_at->diffForHumans() }}</h6>
	      @if(!Auth::guest())
		@if(Auth::user()->id == $comment->user_id)
		<a href="/comments/{{$comment->id}}/edit" class="btn btn-default"> Edit </a> 
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
    <form action="{{ route('comments.store') }}" method="POST">
	{{ csrf_field() }}
	
	<h4> Submit your own comment </h4>
	<textarea class="form-control" name="content" rows="4"></textarea>
	<input type="hidden" value="{{ $post->id }}" name="post_id">
	<button class="btn btn-primary">Submit comment</button>
	    
    </form>
</div>

@endsection

















