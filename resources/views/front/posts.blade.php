@extends('layouts.theme_master')

@section('content')
<style> 
	.truncate p{
		text-overflow: ellipsis;
    white-space: nowrap;
    display: block;
    overflow: hidden;
    width: 20em;
	}

</style>
<div class="col-xl-12 py-12 px-md-12">
   @if(Session::has('error'))
   <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
   @endif
   @if(Session::has('success'))
   <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
   @endif
   <div class="row pt-md-4">
      @if($posts->count()>0)
      @foreach($posts as $post)

      <div class="col-md-12">
         <div class="blog-entry ftco-animate d-md-flex">
            <a href="{{route('article',[$post->slug])}}" class="img img-2" style="background-image: url('{{asset('uploads/catgory/')}}/{{$post->category->image_url}}');"></a>
            <div class="text text-2 pl-md-4">
               <h1 style="font-size: 2rem" class="mb-2"><a style="color: black;" href="{{route('article',[$post->slug])}}">{{$post->title}}</a></h1>
               <div class="meta-wrap">
                  <p class="meta">
                     <span><i class="icon-calendar mr-2"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y')}}</span>
                     <span><a href="{{route('article',[$post->slug])}}"><i class="icon-folder-o mr-2"></i>{{$post->category->category}}</a></span>
                     <span><i class="icon-comment2 mr-2"></i>{{$post->comments->count()}} Comment</span>
                     <span><i class="icon-eye mr-2"></i>{{isset($post->totalSeen->total_seen)?$post->totalSeen->total_seen:0}}</span>
                 </p>
             </div>
           
         </div>
     </div>
 </div>
 @endforeach
 {{ $posts->links() }}
 @else
 <div class="col-md-12 alert alert-warning">
    <strong>Sorry!</strong> Not a single post is found.
</div>
@endif
<!-- June 28, 2019 -->

</div><!-- END-->
	<!-- <div class="row">
		<div class="col">
			<div class="block-27">
				<ul>
					<li><a href="#">&lt;</a></li>
					<li class="active"><span>1</span></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&gt;</a></li>
				</ul>
			</div>
		</div>
	</div> -->
</div>
@endsection
