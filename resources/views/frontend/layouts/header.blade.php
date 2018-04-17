<header class="site-header">
    <div class="top-header-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 flex align-items-center">
                    <div class="header-bar-text d-none d-lg-block">
                        <p>Hello world, My name is Puu</p>
                    </div><!-- .header-bar-text -->

                    <div class="header-bar-email d-none d-lg-block">
                        <a href="#">Contactme@email.com</a>
                    </div><!-- .header-bar-email -->
                </div><!-- .col -->

                <div class="col-lg-3 flex justify-content-between justify-content-lg-end align-items-center">
                        <ul class="flex align-items-center">
                            @if (Auth::guest())
                            <div class="header-bar-text d-none d-md-block">
                            <a href="{{ route('login') }}">Login</a>
                            </div>
                            <div class="header-bar-text d-none d-md-block">
                            <a href="{{ route('register') }}">Register</a>
                            </div>
                            @else
                            <div class="header-bar-social d-none d-md-block col-lg-3">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            </div>
                            @endif
                        </ul>
                    </div><!-- .header-bar-social -->

                    <div class="header-bar-search col-lg-3 float-right">
                        <form action="{{route('post.search')}}" method="POST">
                            {{csrf_field()}}
                            <input type="text" placeholder="Search.." name="s" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                            <button class="btn btn-sm" type="submit">Search</button>
                        </form>
                    </div><!-- .header-bar-search -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .top-header-bar -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-branding flex flex-column align-items-center">
                    <h1 class="site-title"><a href="index.html" rel="home">Amazing Meow</a></h1>
                    <p class="site-description">Personal Blog</p>
                </div><!-- .site-branding -->

                <nav class="site-navigation">
                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->

                    <ul class="flex-lg flex-lg-row justify-content-lg-center align-content-lg-center">
                        <li class="current-menu-item"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('frontend.cat') }}">Categories</a></li>
                        <ul class="dropdown-menu" role="menu">
                            <li>1</li>
                        </ul>
                        <li><a href="{{ route('frontend.posts') }}">Blog</a></li>
                        <li><a href="{{ route('frontend.tags') }}">Tags</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>

                    <div class="header-bar-social d-md-none">
                        <ul class="flex justify-content-center align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div><!-- .header-bar-social -->

                    <div class="header-bar-search d-md-none">
                        <form>
                            <input type="search" placeholder="Search">
                        </form>
                    </div><!-- .header-bar-search -->
                </nav><!-- .site-navigation -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</header><!-- .site-header -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="swiper-container hero-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero-content flex justify-content-center align-items-center flex-column">
                            <img src="{{ asset('images/slider.jpg') }}" alt="">
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->

                    <div class="swiper-slide">
                        <div class="hero-content flex justify-content-center align-items-center flex-column">
                            <img src="{{ asset('images/slider.jpg') }}" alt="">
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->

                    <div class="swiper-slide">
                        <div class="hero-content flex justify-content-center align-items-center flex-column">
                            <img src="{{ asset('images/slider.jpg') }}" alt="">
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->
                </div><!-- .swiper-wrapper -->

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>

                <!-- Add Arrows -->
                <div class="swiper-button-next flex justify-content-center align-items-center">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M27,22L27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22z"></path></svg></span>
                </div>
                <div class="swiper-button-prev flex justify-content-center align-items-center">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z"></path></svg></span>
                </div>
            </div><!-- .swiper-container -->
        </div><!-- .col -->
    </div><!-- .row -->

    
</div><!-- .hero-section -->