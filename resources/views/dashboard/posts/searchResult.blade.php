@extends('dashboard.template')

@section('content')
<div class='container'>
    
    @if($posts->isEmpty())
    
    <h1>There is no result for searching {{ $searchTerm}} </h1>
    
    @else
    
	<h1> Results for searching {{ $searchTerm}}: </h1>
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
    @endif
</div>

@endsection

















