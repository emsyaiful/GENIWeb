<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>GEN1</title>
		@include('includes.head')
	</head>
	<body>
		<!-- .preloader-->
		<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
		<!--/.preloader-->

		<!-- Header -->
		<header id="home">
			@include('includes.slider')
			@include('includes.header')
		</header>
		
		<div ng-app="mainApp" ng-controller="viewBerita">
			@yield('content')
		</div>
		<!-- Content -->		
		

		<!-- Footer -->
		@include('includes.footer')
	</body>
</html>