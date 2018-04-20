
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>Puu</b></span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>Puu's</b> Blog</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	    <span class="sr-only">Toggle navigation</span>
	</a>

	<div class="navbar-custom-menu">
	    <ul class="nav navbar-nav">

		<!-- Right Side Of Navbar -->
		<ul class="nav navbar-nav navbar-right">

		    <!-- search form -->
		    <div class="search-container">
			<form action="{{route('post.search')}}" method="POST">
			    {{csrf_field()}}
			    <input type="text" placeholder="Search.." name="s" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
			    <button class="btn btn-secondary" type="submit">Search</button>
			</form>
		    </div>

		    <!-- /.search form -->
		    <!-- Authentication Links -->
		    @if (Auth::guest())
		    <li><a href="{{ route('login') }}">Login</a></li>
		    <li><a href="{{ route('register') }}">Register</a></li>
		    @else
		    <!-- ADD ROLES AND USERS LINKS -->
		    @role('admin')
		    <li><a href="{{ route('roles.index') }}">Roles</a></li>
		    <li><a href="{{ route('users.index') }}">Users</a></li>
		    @endrole

		    <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			    <img src="/storage/images/users/{{ Auth::user()->profpho }}" style="width:32px; height:32px; border-radius:50%" class="user-image" alt="User Image">
			    <span class="hidden-xs"> {{ Auth::user()->name }}</span>
			    <span class="caret"></span>
			</a>

			<ul class="dropdown-menu" role="menu">
			    <!-- User image -->
   			    <li class="user-header">
				<p>
				    {{ Auth::user()->name }}
				    <small>Member since Nov. 2012</small>
				</p>
			    </li>
			    <!-- Menu Footer-->
                            
			    <li class="user-footer">
				<div class="pull-left">
				    <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
				</div>
				<div class="pull-right">
				    <a href="{{ route('logout') }}"
				       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
					Logout
				    </a>

				    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				    </form>
				</div>
			    </li>
			    @endif
			</ul>


			<!-- Control Sidebar Toggle Button -->
		    <li>
			<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		    </li>
		</ul>
	</div>
    </nav>
</header>
