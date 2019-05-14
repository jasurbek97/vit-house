<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vit House</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/vendor/admin/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/vendor/admin/css/font/css/font-awesome.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/vendor/admin/css/ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/vendor/admin/css/AdminLTE.min.css">
	<link rel="stylesheet" href="/vendor/admin/css/_all-skins.min.css">
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js">
	</script>
</head>

<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
{{--<div class="wrapper">--}}

<header class="main-header">
	<!-- Logo -->
	<a href="{{route('dash')}}" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>V</b>IT</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>VIT</b>HOUSE</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">
                    Toggle navigation
                </span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown tasks-menu">
					<a href="{{ route('logout') }}"  onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
					   class="dropdown-toggle" data-toggle="dropdown">
						{{ __('Logout') }}
					</a>
				</li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</ul>
		</div>
	</nav>
</header>

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="/vendor/admin/img/user1-128x128.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{auth()->user()->name}}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
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
					<i class="fa fa-star-o"></i> <span>Product</span>
					<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{route('p.index')}}"><i class="fa fa-circle-o"></i>Table</a></li>
					<li><a href="{{route('p.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-file-image-o"></i> <span>Publication</span>
					<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{route('pub.index')}}"><i class="fa fa-circle-o"></i>Table</a></li>
					<li><a href="{{route('pub.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
				</ul>
			</li>
			<li class="header"></li>
			<li><a href="{{route('c.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Category</span></a></li>
			<li><a href="{{route('o.index')}}"><i class="fa fa-circle-o text-yellow"></i> <span> Order table</span>
					<span class="pull-right-container">
            </span>
				</a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">
		@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif


		@if ($errors->all())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif


		@if(session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif

		@yield('content')

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2019 <a href="http://usoft.uz/">Umbrella Soft</a>.</strong>
</footer>


<!-- jQuery 3 -->
<script src="/vendor/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/vendor/admin/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/vendor/admin/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/vendor/admin/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/vendor/admin/js/demo.js"></script>
<script src="/vendor/admin/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor');
</script>
</body>
</html>
