
@extends('frontend.frontendtemp')

@section('content')



<div class="container single-page">
        <div class="row">
            <div class="col-12 col-lg-9">
                @foreach($postsView as $post)
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
                        <p>{!! str_limit($post->body, 50) !!}</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
                            <label>Share</label>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul><!-- .post-share -->

                        <a class="read-more order-2" href="#">Read more</a>

                        <div class="comments-count order-1 order-lg-3">
                            <a href="#">2 Comments</a>
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                  
                </div><!-- .content-wrap -->
                @endforeach
                {{$postsView->links()}}
            </div><!-- .col -->

            <div class="col-12 col-lg-3">
                <div class="sidebar">
                    <div class="about-me">
                        <h2>Mình là Mít Mật</h2>

                        <p>Bỗng ngày nọ người nhìn ta khẽ nói
                        “Những diệu kỳ nằm ở phía xa khơi”
                        Chúng mình là tàu bé trong hải cảng
                        Ôm mỏ neo nằm mộng những chân trời.</p>
                    </div><!-- .about-me -->

                    <div class="recent-posts">
                        <div class="recent-post-wrap">
                            <figure>
                                <img src="images/thumb-1.jpg" alt="">
                            </figure>

                            <header class="entry-header">
                                <div class="posted-date">
                                    January 30, 2018
                                </div><!-- .entry-header -->

                                <h3><a href="#">My fall in love story</a></h3>

                                <div class="tags-links">
                                    <a href="#">#winter</a>
                                    <a href="#">#love</a>
                                    <a href="#">#snow</a>
                                    <a href="#">#january</a>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->
                        </div><!-- .recent-post-wrap -->

                        <div class="recent-post-wrap">
                            <figure>
                                <img src="images/thumb-2.jpg" alt="">
                            </figure>

                            <header class="entry-header">
                                <div class="posted-date">
                                    January 30, 2018
                                </div><!-- .entry-header -->

                                <h3><a href="#">My fall in love story</a></h3>

                                <div class="tags-links">
                                    <a href="#">#winter</a>
                                    <a href="#">#love</a>
                                    <a href="#">#snow</a>
                                    <a href="#">#january</a>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->
                        </div><!-- .recent-post-wrap -->

                        <div class="recent-post-wrap">
                            <figure>
                                <img src="images/thumb-3.jpg" alt="">
                            </figure>

                            <header class="entry-header">
                                <div class="posted-date">
                                    January 30, 2018
                                </div><!-- .entry-header -->

                                <h3><a href="#">My fall in love story</a></h3>

                                <div class="tags-links">
                                    <a href="#">#winter</a>
                                    <a href="#">#love</a>
                                    <a href="#">#snow</a>
                                    <a href="#">#january</a>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->
                        </div><!-- .recent-post-wrap -->

                        <div class="recent-post-wrap">
                            <figure>
                                <img src="images/thumb-4.jpg" alt="">
                            </figure>

                            <header class="entry-header">
                                <div class="posted-date">
                                    January 30, 2018
                                </div><!-- .entry-header -->

                                <h3><a href="#">My fall in love story</a></h3>

                                <div class="tags-links">
                                    <a href="#">#winter</a>
                                    <a href="#">#love</a>
                                    <a href="#">#snow</a>
                                    <a href="#">#january</a>
                                </div><!-- .tags-links -->
                            </header><!-- .entry-header -->
                        </div><!-- .recent-post-wrap -->
                    </div><!-- .recent-posts -->

                    <div class="tags-list">
                        @foreach($tagsView as $tag)
                        <a href="#">{{$tag->name}}</a>
                        @endforeach
                    </div><!-- .tags-list -->

                    <div class="sidebar-ads">
                        <img src="images/ads.jpg" alt="ads">
                    </div>
                </div><!-- .sidebar -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->



@endsection