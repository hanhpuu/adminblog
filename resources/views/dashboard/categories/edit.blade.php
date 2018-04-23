@extends('dashboard.template')

@section('title','|All categories')

@section('content')

{{Form::model($category,['route'=>['categories.update', $category->id],'method'=>'PUT'])}}
    {{Form::label('name','Title')}}
    {{Form::text('name','',['class'=>'form-control'])}}

    {{Form::submit('Save changes', ['class'=>'btn btn-success','style'=>'margin-top:20px;'])}}
    
{{Form::close()}}

@endsection
