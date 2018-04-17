@extends('frontend.frontendtemp')

@section('content')

<div class="container single-page blog-page">
    <div class="row">
        <div class="col-12">
            <div class="content-wrap">

                <h1 class="entry-title">Categories</h1>
                <table class='table entry-content'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tagsView as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td> <a href='{{ route('frontend.tags.show', $tag->id) }}'> #{{ $tag->name }} </a></td>		
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection