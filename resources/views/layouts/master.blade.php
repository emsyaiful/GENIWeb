<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>GEN1</title>
		@include('includes.head')
	</head>
	<body>
		<!-- Header -->
		@include('includes.header')

		<!-- Content -->		
		@yield('content')

		<!-- Footer -->
		@include('includes.footer')
	</body>
</html>