@extends('dashboard.template')

@section('content')
<div class="container">
    <h1>Upload your photos</h1>
    <hr />
    <form action="{{route('updatePhoto', ['editPhoto' => $setting->id])}}" method="POST" enctype="multipart/form-data">
        <input type='hidden' name='number' value={{$number}}>
        @for ($i = 1; $i <= $number; $i++) 
        <label for="body">Upload photo number {{$i}}:</label>
        <input type="file" name="file_{{$i}}" >
        @if(isset($photo['file_'.$i]))
        <img style='width: 100%' src='/storage/images/settings/{{$photo['file_'.$i]}}' >	<br>
        @endif
        @endfor
        <input type="submit" class="btn btn-primary center" value="Submit photo" />
	{{ method_field('PUT') }}
	{{ csrf_field() }}
    </form>
</div>

@endsection 
