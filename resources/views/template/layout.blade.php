<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>Books trading</title>
	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bower/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bower/semantic/dist/semantic.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	 <base href="/">
</head>
<body>	

	<div>
		<div class="center-layout" >
			<header>
				<div class="nav">
					@include('template.navbar')
			</header>
			<main>
				<div class="principal-content" id='main'>
					@include('template.index-sidenav')
					
					@include('flash::message')
					@yield('content')
				</div>
			</main>

			{{-- <footer class="page-footer">
				@include('template.footer')
			</footer> --}}

		</div></div>
		<script src="{{ asset('plugins/bower/jquery/dist/jquery.min.js') }}"></script>
		{{-- <script src="{{ asset('plugins/bower/angular/angular.js') }}"></script>
		<script src="{{ asset('plugins/bower/angular-ui-router/release/angular-ui-router.min.js') }}"></script> --}}
		<script src="{{ asset('plugins/bower/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('plugins/bower/semantic/dist/semantic.js') }}"></script>
		{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

		<script type="text/javascript">

			$( document ).ready(function() {
			  $('.ui.dropdown').dropdown();

			  $('.sidebutton').click(function(){
			  	$('.ui.labeled.icon.sidebar').sidebar('toggle');
			  	$('body').addClass('sidebar_after_bg');
			  })


			});
			

			
		</script>
		
		@yield('js')
			
</body>
</html>