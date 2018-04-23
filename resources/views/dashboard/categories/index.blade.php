@extends('dashboard.template')

@section('title','| All categories')

@section('content')

@if (Session::has('success'))
	<div class="alert alert-info">{{ Session::get('success') }}</div>
@endif
    
<div class='row'>
    <div class='col-md-8'>
	<h1>Categorys</h1>
	<table class='table'>
	    <thead>
		<tr>
		    <th>#</th>
		    <th>Name</th>
		</tr>
	    </thead>
	    <tbody>
		@foreach ($categories as $category)
		<tr>
		    <th>{{ $category->id }}</th>
		    <td> <a href='{{ route('categories.show', $category->id) }}'> {{ $category->name }} </a></td>		
		</tr>
		@endforeach
	    </tbody>
	</table>
    </div>
    <div class='col-md-3'>
	<div class="well">
	    {!! Form::open(['route'=>'categories.store','method'=>'post']) !!}
	    <h2>New Category</h2>
	    {{ Form::label('name','Name: ') }}
	    {{ Form::text('name',null, ['class'=>'form-control']) }}
	    {{ Form::submit('Create New Category',['class'=>'btn btn-primary btn-block btn-h1-spacing'])}}
	    
	    {!! Form::close() !!}
	</div>
    </div>
</div>

@endsection
















