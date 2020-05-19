<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>{{ isset($post->title)?$post->title:'slumcoder' }}</title>
	 <?php if(isset($post->tags) && $post->tags->count()>0) {
        $tags=$post->tags->toarray();
    }else{
        $tags=['Laravel','laravel migrations','laravel auth','php','html','laravel pagination'];
    }
    $tags=implode(',', $tags);
    ?>
    <meta name="keywords" content="{{ $tags }}"/>
    <meta maxlength="80" name="description" content="{{ isset($post->content)?$post->content:'slumcoder is programmatic solution provider plateform which give ease to programers & students to learn new stuff related to programming.We provide best solution of every problem in the programming language such as php,html,css and Android.' }}"/>
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{asset('themeImages/slumcoder-logo.jpg')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('themeCss/open-iconic-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('themeCss/animate.css')}}">

	<link rel="stylesheet" href="{{asset('themeCss/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('themeCss/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{ asset('themeCss/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('themeCss/aos.css')}}">

	<link rel="stylesheet" href="{{asset('themeCss/ionicons.min.css')}}">

	<link rel="stylesheet" href="{{asset('themeCss/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('themeCss/jquery.timepicker.css')}}">


	<link rel="stylesheet" href="{{asset('themeCss/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('themeCss/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('themeCss/style.css')}}">
</head>
<style type="text/css">
	#colorlib-main{
		width: 100% !important;
		margin-top: 5%;
	}
	#colorlib-aside{
		padding-top: 2em !important;
	}
</style>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				@include('layouts.sidebar')
			</div>
			<div class="@if(Route::current()->getName() == 'contact') col-md-9  
				@else col-md-6 @endif">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@yield('content')
			</div>
			@if(Route::current()->getName() == 'contact') 
			@else
			<div class="col-md-3">
				@include('layouts.rightbar')
			</div>
			@endif
			


		</div>
	</div>

	<!-- END COLORLIB-PAGE -->

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


	<script src="{{asset('themeJs/jquery.min.js')}}"></script>
	<script src="{{asset('themeJs/jquery-migrate-3.0.1.min.js')}}"></script>
	<script src="{{asset('themeJs/popper.min.js')}}"></script>
	<script src="{{asset('themeJs/bootstrap.min.js')}}"></script>
	<script src="{{asset('themeJs/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('themeJs/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('themeJs/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('themeJs/owl.carousel.min.js')}}"></script>
	<script src="{{asset('themeJs/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('themeJs/aos.js')}}"></script>
	<script src="{{asset('themeJs/jquery.animateNumber.min.js')}}"></script>
	<script src="{{asset('themeJs/scrollax.min.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="{{asset('themeJs/google-map.js')}}"></script>
	<script src="{{asset('themeJs/main.js')}}"></script>

</body>
</html>
<script type="text/javascript">
	setImageWidth();
	function setImageWidth() {
		
		$('p').children('img').map(function () {
			return $(this).css('width','100%')
		}).get()
	}

	jQuery( document ).ready( function( $ ) {

		$('.icon-paper-plane' ).on( 'click', function(e) {
			e.preventDefault();

			var email = $('input[name=email]').val();

			$.ajax({
				type: "POST",
				data: {email:email, _token: $('meta[name="csrf-token"]').attr('content')},
				url: "{{route('subscribe')}}",
				success: function( msg ) {
					window.location.href = "{{route('.articles')}}";
				}

			});

		});
	});

</script>
