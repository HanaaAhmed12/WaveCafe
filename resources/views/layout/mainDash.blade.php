<!DOCTYPE html>
<html lang="en">
  <head>
@yield('head')
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beverages Admin</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
@include('includeDash.menuprofile')
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
@include('includeDash.sidebar')
					<!-- /sidebar menu -->
					<!-- /menu footer buttons -->
@include('includeDash.menufooter')
					<!-- /menu footer buttons -->
				</div>
			</div>
@yield('content')
			<!-- footer content -->
@include('includeDash.footercontent')
			<!-- /footer content -->
		</div>
	</div>
</body>
</html>
