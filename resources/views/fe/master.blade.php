<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themewinter.com/html/news247/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jul 2017 02:35:20 GMT -->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>News247</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!--Favicon-->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/bootstrap.min.css') }}">
	<!-- Template styles-->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/style.css') }}">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/responsive.css') }}">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/responsive.css') }}">
	<!-- Animation -->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/animate.css') }}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/owl.theme.default.min.css') }}">
	<!-- Colorbox -->
	<link rel="stylesheet" href="{{ URL::asset('/fe/css/colorbox.css') }}">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div class="body-inner">
		@include('fe/blocks/trending')
		@include('fe/blocks/topbar')
		@include('fe/blocks/header')
		@include('fe/blocks/navbar')

		@yield('content')

		@include('fe/blocks/footer')

		<script type="text/javascript" src="{{ URL::asset('/fe/js/jquery.js') }}"></script>
		<!-- Bootstrap jQuery -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/bootstrap.min.js') }}"></script>
		<!-- Owl Carousel -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/owl.carousel.min.js') }}"></script>
		<!-- Counter -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/jquery.counterup.min.js') }}"></script>
		<!-- Waypoints -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/waypoints.min.js') }}"></script>
		<!-- Color box -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/jquery.colorbox.js') }}"></script>
		<!-- Smoothscroll -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/smoothscroll.js') }}"></script>


		<!-- Template custom -->
		<script type="text/javascript" src="{{ URL::asset('/fe/js/custom.js') }}"></script>

	</div>
</body>
</html>
