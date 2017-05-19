<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap E-commerce Templates</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="{!! url('public/theme/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">      
	<link href="{!! url('public/theme/bootstrap/css/bootstrap-responsive.min.css') !!}" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{!! url('public/theme/bootstrap/css/font-awesome.min.css') !!}">

	<link href="{!! url('public/theme/themes/css/bootstrappage.css') !!}" rel="stylesheet"/>

	<!-- global styles -->
	<link href="{!! url('public/theme/themes/css/flexslider.css') !!}" rel="stylesheet"/>
	<link href="{!! url('public/theme/themes/css/main.css') !!}" rel="stylesheet"/>

	<!-- scripts -->
	<script src="{!! url('public/theme/themes/js/jquery-1.7.2.min.js') !!}"></script>
	<script src="{!! url('public/theme/bootstrap/js/bootstrap.min.js') !!}"></script>				
	<script src="{!! url('public/theme/themes/js/superfish.js') !!}"></script>	
	<!-- <script src="{!! url('public/theme/themes/js/jquery.scrolltotop.js') !!}"></script> -->
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
			<![endif]-->
		</head>
		<body>
		<!-- menu trên cùng -->
		@include('theme.blocks.topmenu')
			<div id="wrapper" class="container">
				<!-- navbar -->
				@include('theme.blocks.mainmenu')
				<!-- slide -->
				@include('theme.blocks.slide')
				<section class="header_text">
					
				</section>


				@yield('content')

				<!-- chia sẽ -->
				@include('theme.blocks.qc')	
				<!-- footer and copyright -->
				@include('theme.blocks.footer')
			</div>
			<script src="{!! url('public/theme/themes/js/common.js') !!}"></script>
			<script src="{!! url('public/theme/themes/js/jquery.flexslider-min.js') !!}"></script>
			<script type="text/javascript">
				$(function() {
					$(document).ready(function() {
						$('.flexslider').flexslider({
							animation: "fade",
							slideshowSpeed: 4000,
							animationSpeed: 600,
							controlNav: false,
							directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
					});
				});
			</script>
		</body>
		</html>