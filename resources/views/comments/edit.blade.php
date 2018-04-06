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
	Submitted by: <strong> {{ $post->user->name }} </strong> on {{ $post->created_at->diffForHumans() }}
	<br/>
	@if ($post->created_at != $post->updated_at)
	<p>Last edited by on {{ $post->editor->name}} on {{ $post->updated_at->diffForHumans() }}</p>
	@endif
    </p>
    @if(!Auth::guest())
	@if(Auth::user()->id == $post->created_by)
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit </a> 
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
	    {!! $comment->body !!}
	      </p>
	      <h6> Answered by {{ $comment->user->name }} on {{ $comment->created_at->diffForHumans() }}</h6>
	      @if ($comment->created_at != $comment->updated_at)
	      <h6> Last edited on {{ $comment->updated_at->diffForHumans() }}</h6>
	      @endif
	      @if(!Auth::guest())
		@if(Auth::user()->id == $comment->created_by)
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

<div class="panel panel-default">	
	<div class="panel-body">
	    <form action="{{route('comments.update', ['comment' => $comment->id] )}}" method="POST">
	    <textarea class="form-control" name="body" id="description" rows="4" > {{$comment->body}} </textarea>
	    <input type="hidden" value="{{ $post->id }}" name="post_id">
	    <input type="submit" class="btn btn-primary" value="Submit comment" />
	    {{ method_field('PUT') }}
	    {{ csrf_field() }}    
	    </form>
    </div>
</div>
</div>

@endsection

















