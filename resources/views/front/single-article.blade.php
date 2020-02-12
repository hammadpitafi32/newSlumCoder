@extends('layouts.theme_master')

@section('content')

			<div class="container-fluid">
				<div class="row d-flex">
					<div class="col-lg-12 px-md-12 py-12">
						<div class="row pt-md-12">
							<h1 class="mb-3">{{$post->title}}</h1>
							<div id="content" class="col-md-12">
								{!! $post->content !!}
							</div>

							<div class="tag-widget post-tag-container mb-5 mt-5">
								<div class="tagcloud">
									<a href="#" class="tag-cloud-link">Life</a>
									<a href="#" class="tag-cloud-link">Sport</a>
									<a href="#" class="tag-cloud-link">Tech</a>
									<a href="#" class="tag-cloud-link">Travel</a>
								</div>
							</div>

							<div class="about-author d-flex p-4 bg-light">
								<div class="bio mr-5">
									<img  src="{{asset('uploads/users/')}}/{{$post->user->image_url}}" width="50">
								</div>
								<div class="desc">
									<h3>{{$post->user->name}}</h3>
									<p>{{$post->user->about}}!</p>
								</div>
							</div>


							<div class="pt-5 mt-5">
								<h3 class="mb-5 font-weight-bold">{{$post->comments->count()}} Comments</h3>
								<ul class="comment-list">
									@if($post->comments->count()>0)
									@foreach($post->comments as $comment)
									<li class="comment">
										<div class="vcard bio">
											<img src="{{asset('uploads/users/')}}/{{$comment->user->image_url}}" alt="Image placeholder">
										</div>
										<div class="comment-body">
											<h3>{{$comment->user->name}}</h3>
											<div class="meta">{{$comment->message}}</p>
											<!-- <p><a href="#" class="reply">Reply</a></p> -->
										</div>
									</li>
									@endforeach
									@endif
								</ul>


									
								<!-- END comment-list -->

								<div class="comment-form-wrap pt-5">
									<h3 class="mb-5">Leave a comment</h3>
									<form action="#" class="p-3 p-md-5 bg-light">
										<div class="form-group">
											<label for="name">Name *</label>
											<input type="text" class="form-control" id="name">
										</div>
										<div class="form-group">
											<label for="email">Email *</label>
											<input type="email" class="form-control" id="email">
										</div>
										<div class="form-group">
											<label for="website">Website</label>
											<input type="url" class="form-control" id="website">
										</div>

										<div class="form-group">
											<label for="message">Message</label>
											<textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
										</div>

									</form>
								</div>
							</div>
						</div><!-- END-->
					</div>

				</div>
			</div>

@endsection