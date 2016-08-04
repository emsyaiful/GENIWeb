<!DOCTYPE HTML>
<html class="no-js" lang="en">
	<head>
		<title>Admin GEN1</title>
		@include('includes.headadmin')
	</head>
	<body>
		<div class="main-wrapper">
            <div class="app" id="app">
            	@include('includes.headeradmin')
            	@include('includes.sidebaradmin')
            	<!-- Content -->
            	<article class="content dashboard-page">
					@yield('content')
				</article>

				<!-- Footer -->
				@include('includes.footeradmin')
            </div>
        </div>
	</body>
</html>