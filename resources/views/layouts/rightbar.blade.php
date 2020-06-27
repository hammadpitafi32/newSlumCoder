	    			<div class="col-md-12">
	    				<div class="sidebar-box pt-md-4">
	    					<form  id="analogiaScout" action="{{route('search')}}" method="get" class="search-form">
	    						<div class="form-group">
	    							<span class="icon icon-search"></span>
	    							<input type="text" name="search" class="form-control" placeholder="Type a keyword and hit enter">
	    						</div>
	    					</form>
	    				</div>
	    				<!-- <div class="sidebar-box ftco-animate">
	    					<h3 class="sidebar-heading">Categories</h3>
	    					<ul class="categories">
	    						@if($category->count()>0)
	    						@foreach($category as $cat)
	    						<li><a href="{{route('articlesByCategory',['slug'=>$cat->category])}}">{{$cat->category}}<span>({{$cat->posts->count()}})</span></a></li>
	    						@endforeach
	    						@endif
	    					</ul>
	    				</div> -->

	    				<div class="sidebar-box ftco-animate">
	    					<h3 class="sidebar-heading">Latest Articles</h3>
	    					@if($popArticles->count()>0)
	    					@foreach($popArticles as $post)
	    					<div class="block-21 mb-4 d-flex">
	    						<a class="blog-img mr-4" style="background-image: url('{{asset('uploads/catgory/')}}/{{$post->category->image_url}}');"></a>
	    						<div class="text">
	    							<h3 class="heading"><a href="{{route('article',[$post->slug])}}">{{$post->title}}</a></h3>
	    							<div class="meta">
	    								<div><a href="{{route('article',[$post->slug])}}"><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y')}}</a></div>
	    								<div><a href="{{route('article',[$post->slug])}}"><span class="icon-person"></span> {{$post->user->name}}</a></div>
	    								<div><a href="{{route('article',[$post->slug])}}"><span class="icon-chat"></span> {{$post->comments->count()}}</a></div>
	    							</div>
	    						</div>
	    					</div>
	    					@endforeach
	    					@endif
	    					
	    					
	    				</div>

	    				<!-- <div class="sidebar-box ftco-animate">
	    					<h3 class="sidebar-heading">Tag Cloud</h3>
	    					<ul class="tagcloud">
	    						<a href="#" class="tag-cloud-link">animals</a>
	    						
	    					</ul>
	    				</div> -->

	    				<div class="sidebar-box subs-wrap img py-4" style="background-image: url('{{asset('themeImages/bg_1.jpg')}}');">
	    					<div class="overlay"></div>
	    					<h3 class="mb-4 sidebar-heading">Newsletter</h3>
	    					<p class="mb-4">Please enter your email for subscription and get daily news.</p>
	    					<form action="{{route('subscribe')}}" method="POST" class="subscribe-form">
                                {{ csrf_field() }}
	    						<div class="form-group">
	    							<input type="text" class="form-control" name="email" placeholder="Email Address">
	    							<input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
	    						</div>
	    					</form>
	    				</div>

	    				<div class="sidebar-box ftco-animate">
	    					<h3 class="sidebar-heading">Archives</h3>
	    					<ul class="categories">
	    						@for($i = -3; $i <= 0; $i++)
  									<?php $date= date('M-Y', strtotime("$i month"));
  										$date2= date('m-Y', strtotime("$i month"));
  									?>
  									<li><a href="{{route('getArticleByDate',['date'=> $date2])}}">{{$date}}</a></li>
								@endfor
	    					
	    					</ul>
	    				</div>

	          </div><!-- END COL -->