<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Copyright (c) Viralcorners">
    <meta name="keyword" content="">
    <title> @yield('title') | Admin Panel </title>

    <!-- Icons -->
    <link href="{{ asset('node_modules/Font-Awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('node_modules/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application -->
    
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico')}}"/>
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Brand options
1. '.brand-minimized'       - Minimized brand (Only symbol)

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">☰</button>

        <!-- <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Settings</a>
            </li>
        </ul> -->
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('images/user.jpg')}}" class="img-avatar" alt="">
                    <span class="d-md-down-none">admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
                    <div class="dropdown-header text-center">
                        <strong>Settings</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-secondary">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler aside-menu-toggler" type="button"></button>

    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
                    </li> -->
                   

                     <li class="start {{Request::is('admin')?"active":""}}">
                        <a class="nav-link" href="{{Url('/')}}">
						<i class="icon-home"></i> Home</a>
                    </li>

                    <li class="start {{Request::is('admin/site-settings*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/site-settings">
						<i class="fa fa-gears"></i>
						<span class="title">Site Settings</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/admins*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/admins">
						<i class="icon-home"></i>
						<span class="title">Admins</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/users*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/users">
						<i class="icon-home"></i>
						<span class="title">Users</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/categories*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/categories">
						<i class="icon-home"></i>
						<span class="title">Categories</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/packages*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/packages">
						<i class="icon-home"></i>
						<span class="title">Packages</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/filters*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/filters">
						<i class="icon-home"></i>
						<span class="title">Filters</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/filter-groups*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/filter-groups">
						<i class="icon-home"></i>
						<span class="title">Filters Groups</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/ads*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/ads">
						<i class="icon-home"></i>
						<span class="title">Ads</span>
						</a>
					</li>

					<li class="start {{Request::is('admin/posts*')?"active":""}}">
						<a class="nav-link" href="{{Url('/')}}/admin/posts">
						<i class="icon-home"></i>
						<span class="title">Posts</span>
						</a>
					</li>

                    <li class="start {{Request::is('admin/messages*')?"active":""}}">
                        <a class="nav-link" href="{{Url('/')}}/admin/messages">
                        <i class="icon-home"></i>
                        <span class="title"> Messages </span>
                        </a>
                    </li>

					<li class="nav-item nav-dropdown">
						<a class="nav-link nav-dropdown-toggle" href="#">
						<i class="icon-map"></i><span class="arrow "></span> Maps</a>
						<ul class="nav-dropdown-items">
							<li class="nav-item">
								<a class="nav-link" href="maps_google.html"><i class="icon-map"></i> Google Maps</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="maps_vector.html"><i class="icon-map"></i> Vector Maps</a>
							</li>
						</ul>
					</li>
                                  

                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li> -->

                <!-- Breadcrumb Menu-->
                <!-- <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn" href="#"><i class="icon-speech"></i></a>
                        <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li>
            </ol> -->



            <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE CONTENT-->
                <div class="card-body">
                
                    
                        @yield('content')
                    
                
            </div>
                <!-- END PAGE CONTENT-->
            </div>
        </div>
            <!-- /.conainer-fluid -->
        </main>
    </div>

   <!-- BEGIN FOOTER -->
 <!--    <div class="page-footer">
        <div class="page-footer-inner">
            {{date('Y')}} &copy; GulfRoots by  <a href="https://viralcorners.com" target="_blank"><b>Viral Corners</b></a>.
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div> -->
    <footer class="app-footer">
        <a href="http://gulfroots.com">GulfRoots</a> © 2017
        <span class="float-left">Powered by <a href="http://viralcorners.com">Viral Corners</a>
        </span>
    </footer>
    <!-- END FOOTER -->

    <!-- Bootstrap and necessary plugins -->
    <script src="{{Url('/')}}/js/jquery.min.js"></script>
    <script src="{{Url('/')}}/js/popper.min.js"></script>
    <script src="{{Url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{Url('/')}}/js/pace.min.js"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="{{Url('/')}}/node_modules/Chart.js/dist/Chart.min.js"></script>


    <!-- GenesisUI main scripts -->

    <script src="{{Url('/')}}/js/app.js"></script>

   
@yield('inlineJS')
<!-- END JAVASCRIPTS -->
</body>

</html>