@extends('frontend.frontendtemp')

@section('content')
<div class="container single-page blog-page">
    <div class="row">
        <div class="col-12">
            <div class="content-wrap">


                @foreach($postsView as $post)
                <header class="list">
                    <div class="posted-date">
                        {{$post->created_at}}
                    </div><!-- .posted-date -->
                    <h2 class="entry-title">{{ $post->title }}</h2>
                    <div class="tags-links">
                        @foreach($post->tags as $tag)
                        <a href="#">#{{$tag->name}}</a>
                        @endforeach
                    </div><!-- .tags-links -->
                </header><!-- .entry-header -->

                <figure class="featured-image">
                    <img src="images/blog-image.jpg" alt="">
                </figure><!-- .featured-image -->

                <div class="blockquote-text " maxlength="50">
                    <p>{!! $post->body !!}</p>
                </div><!-- .entry-content -->

                <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <a href="{{ route('frontend.posts.show', $post->id) }}" class='btn btn-sm btn-primary'>View details</a>
                    <!-- .post-share -->
                </footer><!-- .entry-footer -->
                @endforeach
            </div><!-- .content-wrap -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->

@endsection