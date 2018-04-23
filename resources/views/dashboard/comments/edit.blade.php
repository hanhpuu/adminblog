@extends('dashboard.template')

@section('content')
<div class='container'>


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

















