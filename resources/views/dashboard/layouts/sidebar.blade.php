<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <!-- search form -->
        <form action="{{route('post.search')}}" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
       
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                    <li><a href="{{ route('home')}}"><i class="fa fa-circle-o"></i> Home</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Posts</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
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
            <li>
                <a href="{{route('users.index')}}">
                    <i class="fa fa-th"></i> <span>User management</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('tags.index')}}">
                    <i class="fa fa-th"></i> <span>Tag management</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('categories.index')}}">
                    <i class="fa fa-th"></i> <span>Categories management</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>