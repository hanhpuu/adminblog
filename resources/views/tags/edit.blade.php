@extends('admin_templatenew')

@section('title','|All tags')

@section('content')

{{Form::model($tag,['route'=>['tags.update', $tag->id],'method'=>'PUT'])}}
    {{Form::label('name','Title')}}
    {{Form::text('name','',['class'=>'form-control'])}}

    {{Form::submit('Save changes', ['class'=>'btn btn-success','style'=>'margin-top:20px;'])}}
    
{{Form::close()}}

@endsection
