@extends('frontend.frontendtemp')

@section('content')


<div class="container single-page blog-page">
    <div class="row">
        <div class="col-12">
            <div class="content-wrap">
                <h1 class="list" >List of blogs with <strong>#{{$tag->name}}</strong> tag</h1>
                <table class='table entry-content'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tag->posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>@foreach ($post->tags as $tag)
                                <span class='label label-default'>#{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('frontend.posts.show', $post->id)}}" class='btn btn-default btn-xs'>View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection