@extends('admin_templatenew')

@section('css')
@parent
<link rel="stylesheet" href=" {{asset('css/bootstrap-tagsinput.css') }}">
@endsection  

@section('content')
<div class="container">
    <h1>Write a post</h1>
    <hr />

    <form action="{{ route('posts.store') }}" method="POST">
        {{ csrf_field() }}
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" />

        <label for="body">Body content:</label>
        <textarea class="form-control" name="body" id="body" rows="4"></textarea>

	<div class="row">
	    <label for="tags">Tags: </label>
	    
	    <input type="text" value="" data-role="tagsinput" name='tags'/>

	</div>
	<div class="row">
	    <label for="categories">Categories: </label>
	    <select class="form-control select2-multi col-md-8" name='categories[]' multiple="multiple">
		@foreach($categories as $category)
		<option value='{{ $category->id}}' > {{$category->name}} </option>
		@endforeach
	    </select>
	    <br>
	    



	    <input type="submit" class="btn btn-primary" value="Submit post" />
	</div>s
    </form>

    @endsection

    @section('js')
    @parent
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2-multi').select2();
        });
        $(".try").tagsinput();
    </script>
    <script src="{{ asset('js/bootstrap-tagsinput.js')}}"></script>
    @endsection


