<!-- <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a> -->
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
	<nav id="colorlib-main-menu" role="navigation">
		<ul>
			@if(!Auth::check())
			<li><a href="{{route('userSignup')}}">New?</a></li>
			<li><a href="{{route('signin')}}">Login</a></li>
			@endif
			<li class="colorlib-active"><a href="{{route('.articles')}}">Home</a></li>
			<li><a href="{{route('.articles')}}">About</a></li>
			<li><a href="{{route('.articles')}}">Contact</a></li>
			@if(Auth::check())
			<li><a href="{{route('Logout')}}">Logout</a></li>
			@endif
		</ul>
	</nav>

	<div class="colorlib-footer">
		<h1 id="colorlib-logo" class="mb-4"><a href="{{route('.articles')}}" style="background-image: url('{{asset('themeImages/bg_1.jpg')}}');">Slum <span>Coder</span></a></h1>
		<div class="mb-4">
			<h3>Subscribe for newsletter</h3>
			<form action="{{route('subscribe')}}" method="POST" class="colorlib-subscribe-form">
				{{ csrf_field() }}
				<div class="form-group d-flex">
					<div class="icon"><a style="cursor: pointer;" class="icon-paper-plane"></a></div>
					<input type="text" name="email" class="form-control" placeholder="Enter Email Address">
				</div>
			</form>
		</div>
		<p class="pfooter">
			Copyright &copy; {{ now()->year }} All rights reserved by <a href="http://slumcoder.com" target="_blank">Slum Coder</a>
		</p>
	</div>
</aside> 
