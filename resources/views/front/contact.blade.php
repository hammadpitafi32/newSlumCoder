@extends('layouts.theme_master')

@section('content')
<div id="colorlib-main">
	<section style="padding:0em !important" class="ftco-section contact-section px-md-4">
		<div class="container">
			@if(Session::has('success'))
			<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
			@endif
			<div class="row d-flex mb-5 contact-info">
				<div class="col-md-12 mb-4">
					<h2 class="h3">Contact Information</h2>
				</div>
				<div class="w-100"></div>
				<div class="col-lg-6 col-xl-3 d-flex mb-4">
					<div class="info bg-light p-4">
						<p><span>Address:</span> A28,Cavlary, lahore pakistan.</p>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex mb-4">
					<div class="info bg-light p-4">
						<p><span>Phone:</span> <a href="tel://92332 6119048">+ 92332 6119048</a></p>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex mb-4">
					<div class="info bg-light p-4">
						<p><span>Email:</span> <a href="mailto:info@slumcoder.com">info@slumcoder.com</a></p>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex mb-4">
					<div class="info bg-light p-4">
						<p><span>Website</span> <a href="{{route('.articles')}}">slumcoder.com</a></p>
					</div>
				</div>
			</div>
			<div class="row block-9">
				<div class="col-lg-6 d-flex">
					<form action="{{route('contactme')}}" method="post" class="bg-light p-5 contact-form">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" class="form-control" name='name' placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name='email' placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name='subject' placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea id="" cols="30" rows="5" name='message' class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>

				</div>

				<div class="col-lg-6 d-flex">
					<div id="map" class="bg-light"></div>
				</div>
			</div>
		</div>
	</section>
</div>
	
@endsection
@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="{{asset('themeJs/google-map.js')}}"></script>
@endsection