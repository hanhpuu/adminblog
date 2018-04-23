@extends('dashboard.template')


@section('css')
@parent
<link rel="stylesheet" href=" {{asset('css/bootstrap-tagsinput.css') }}">
@endsection  

@section('content')
<div class="container">
    <h1>Edit your post:</h1>
    <hr />
    <form action="{{route('posts.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">


<!--for tags UX UI-->
    <label for="categories">Category: </label>
    <select class="form-control select2-multi" name='categories[]' multiple="multiple">
       @foreach($cats2 as $id => $name)
       <option value='{{ $id}}'> {{$name}} </option>
        @endforeach
    </select>

        <label for="title">Post title:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}"/>

        <label for="body">Post body:</label>
        <textarea class="form-control" name="body" id="body" rows="4" > {{ $post->body }} </textarea>
        
        <label for="body">Upload photo:</label>
        <input type="file" name="cover_image" id="cover_image">
        <img style='width: 100%' src='/storage/images/posts/{{$post->cover_image}}'>

	<!--for tags UX UI-->
	    <label for="tags">Tags: </label><br>

	    <input type="text" value=" 
	    @foreach($tags2 as $id => $name)
	    {{$name}}, 
	    @endforeach
	    " data-role="tagsinput" name="tags">

	

        <br> <input type="submit" class="btn btn-primary center" value="Submit post" />
	{{ method_field('PUT') }}
	{{ csrf_field() }}
    </form>
</div>

@endsection 

@section('js')
    @parent
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2-multi').select2();
            $('.select2-multi').select2().val({!! json_encode($post->categories()->allRelatedIds()) 
                      !!}).trigger('change');
        });
        $(".try").tagsinput();
    </script>
    <script src="{{ asset('js/bootstrap-tagsinput.js')}}"></script>
    @endsection
