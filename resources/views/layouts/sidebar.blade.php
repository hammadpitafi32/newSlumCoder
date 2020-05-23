<div class="col-md-12 col-sm-12">
	<div style="margin-top: 10%;" class="sidebar-box ftco-animate">
	    <h3 class="sidebar-heading">Categories</h3>
	    	<ul class="categories">
	    		@if($category->count()>0)
	    		@foreach($category as $cat)
	    			<li><a href="{{route('articlesByCategory',['slug'=>$cat->category])}}">{{$cat->category}}<span>({{$cat->posts->count()}})</span></a></li>
	    		@endforeach
	    		@endif
	    	</ul>
	</div>

</div>
	


