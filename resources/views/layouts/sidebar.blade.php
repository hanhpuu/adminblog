<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
	    <div class="pull-left image">
		<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	    </div>
	    <div class="pull-left info">
		@if (!Auth::guest())
		<p> {{ auth()->user()->name }}</p>
		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		
		<li class="user-footer">
				<div class="pull-left">
				    <a href="#" class="btn btn-default btn-flat">Profile</a>
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
		
		@else
		<p> No one</p>
		@endif
	    </div>
	</div>
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu" data-widget="tree">
	    <li class="header">MAIN NAVIGATION</li>
	    <li class="active treeview">
		<a href="#">
		    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li class="active"><a href="{{ route('dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
		    <li><a href="{{ route('home')}}"><i class="fa fa-circle-o"></i> Home </a></li>
		</ul>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-edit"></i> <span>Posts</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="{{route('posts.index')}}"><i class="fa fa-circle-o"></i> Recent posts</a></li>
		    <li><a href="{{route('posts.create')}}"><i class="fa fa-circle-o"></i> Create new posts</a></li>
		    <li><a href="{{asset('/posts')}}"><i class="fa fa-circle-o"></i> My posts</a></li>
		</ul>
	    </li>
	    <li>
		<a href="{{route('roles.index')}}">
		    <i class="fa fa-th"></i> <span>Role management</span>
		    <span class="pull-right-container">
			<small class="label pull-right bg-green">new</small>
		    </span>
		</a>
	    </li>
	    <li class="treeview">
		<a href="{{ route('tags.index')}}">
		    <i class="fa fa-pie-chart"></i>
		    <span>Tags</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="{{ route('tags.index')}}"><i class="fa fa-circle-o"></i> Tags</a></li>
		    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
		    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
		    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
		</ul>
	    </li>

	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-table"></i> <span>Categories</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="{{ route('categories.index')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
		    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
		</ul>
	    </li>
	    <li>
		<a href="pages/mailbox/mailbox.html">
		    <i class="fa fa-envelope"></i> <span>Mailbox</span>
		    <span class="pull-right-container">
			<small class="label pull-right bg-yellow">12</small>
			<small class="label pull-right bg-green">16</small>
			<small class="label pull-right bg-red">5</small>
		    </span>
		</a>
	    </li>
	    
	    
	</ul>
    </section>
    <!-- /.sidebar -->
</aside>
