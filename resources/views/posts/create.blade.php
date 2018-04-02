@extends('admin_templatenew')

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
        <input type="submit" class="btn btn-primary" value="Submit post" />
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

@endsection    
    
