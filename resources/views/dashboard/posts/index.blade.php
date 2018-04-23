@extends('dashboard.template')

@section('content')
<div class='container'>
    <h1> Recent posts: </h1>
    <hr/>
    
    @foreach ($posts as $post)
    <div class='well'>
	<h3>{{ $post->title }}</h3> 
	<p>
	    {!! $post->body !!}
	</p>
	<a href="{{ route('posts.show', $post->id) }}" class='btn btn-sm btn-primary'>View details</a>
    </div>
    @endforeach
    
    {{ $posts->links() }}
</div>

@endsection

















