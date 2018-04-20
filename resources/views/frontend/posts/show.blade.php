@extends('frontend.frontendtemp')

@section('content')

<div class="container single-page blog-page">
    <div class="row">
        <div class="col-12">
            <div class="content-wrap">
                <header class="entry-header">
                    <div class="posted-date">
                        {{$post->created_at}}
                    </div><!-- .posted-date -->

                    <h2 class="entry-title">{{$post->title}}</h2>

                    <div class="tags-links">
                        @foreach($post->tags as $tag)
                        <a href="#">#{{$tag->name}}</a>
                        @endforeach
                    </div><!-- .tags-links -->
                </header><!-- .entry-header -->

                <figure class="featured-image">
                    <img src="/storage/images/posts/{{$post->cover_image}}" alt="">
                </figure><!-- .featured-image -->

                <div class="entry-content">
                    {!! $post->body !!}
                </div><!-- .entry-content -->

                <blockquote class="blockquote-text">
                    <p>Nullam non nisi ut dolor pellentesque eleifend. Aliquam commodo vitae risus malesuada varius. Nulla ornare lacus eu elit sollicitudin varius. Nulla aliquet ornare massa id tempor. Sed luctus dui non turpis sodales, ac tristique risus consequat. Donec tincidunt mi a magna rhoncus dapibus. Integer ut lectus euismod</p>
                </blockquote><!-- .blockquote-text -->


                <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                    <ul class="post-share flex align-items-center order-3 order-lg-1">
                        <label>Share</label>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul><!-- .post-share -->

                    <div class="comments-count order-1 order-lg-3">
                        <a href="#">{{$post->comments->count()>1 ? $post->comments->count().' comments' : $post->comments->count().' comment' }}</a>
                    </div><!-- .comments-count -->
                </footer><!-- .entry-footer -->
            </div><!-- .content-wrap -->

            <div class="content-area">
                <div class="post-comments">
                    <h3 class="comments-title">Comments</h3>

                    <ol class="comment-list">
                        <li class="comment">
                            @if($post->comments->count() >0)
                            @foreach($post->comments as $comment)
                            <div class="comment-body flex justify-content-between">
                                <figure class="comment-author-avatar">
                                    <img src="images/user-1.jpg" alt="user">
                                </figure><!-- .comment-author-avatar -->
                                <div class="comment-wrap">
                                    <div class="comment-author flex flex-wrap align-items-center">
                                        <span class="fn">
                                            <a href="#">{{$comment->user->name}}</a>
                                        </span><!-- .fn -->

                                        <span class="comment-meta">
                                            <a href="#">{{$comment->created_at}}</a>
                                        </span><!-- .comment-meta -->

                                        <div class="reply">
                                            <a href="#">Reply</a>
                                        </div><!-- .reply -->
                                    </div><!-- .comment-author -->
                                    <p> {!! $comment->body !!}</p>
                                </div><!-- .comment-wrap -->
                            </div><!-- .comment-body -->
                            @endforeach
                            @else
                            <hr><p>There are no comment to this post yet. Please write your own comment</p>
                            @endif
                        </li><!-- .comment -->                          
                    </ol><!-- .comment-list -->
                </div><!-- .post-comments -->

                <div class="comments-form">
                    <div class="comment-respond">
                        <h3 class="comment-reply-title">Leave a reply</h3>

                        <!-- .comment-form -->
                        <form action="{{ route('frontend.comments.store') }}" method="POST" class="comment-form">
                            {{ csrf_field() }}
                            <textarea class="form-control" name="body" rows="18" cols="6" placeholder="Messages"></textarea>
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <input type="submit" value="Submit comment">
                        </form>
                    </div><!-- .comment-respond -->
                </div><!-- .comments-form -->
            </div><!-- .content-area -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->
</div><!-- .outer-container -->

@endsection