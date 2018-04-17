@extends('admin_templatenew')

@section('css')
@parent
<link rel="stylesheet" href=" {{asset('css/bootstrap-tagsinput.css') }}">
@endsection  

@section('content')
<div class="container">
    <h1>Write a post</h1>
    <hr />

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" />

        <label for="body">Post content:</label>
        <textarea class="form-control" name="body" id="body" rows="4"></textarea>

        <label for="body">Upload photo:</label>
        <input type="file" name="cover_image" id="cover_image">

        <label for="tags">Tags: </label><br>
        <input type="text" value="" data-role="tagsinput" name='tags'/><br>

        <label for="categories">Categories: </label>
        <select class="form-control select2-multi col-md-8" name='categories[]' multiple="multiple">
            @foreach($categories as $category)
            <option value='{{ $category->id}}' > {{$category->name}} </option>
            @endforeach
        </select>
        <br>

        <input type="submit" class="btn btn-primary" value="Submit post" />
</div>
</form>
</div>

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


