@extends('layouts.theme_master')

@section('content')

			<div class="container-fluid">
                @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
				<div class="row d-flex">
					<div class="col-lg-12 px-md-12 py-12">
						<div class="row pt-md-12">
							<h1 class="mb-3">{{$post->title}}</h1>
							<div id="content" class="col-md-12">
								{!! $post->content !!}
							</div>
                            <div class="col-md-12">
                                <div class="tag-widget post-tag-container mb-5 mt-5">
                                    <div class="tagcloud">
                                        @if($post->tags->count() > 0)
                                        @foreach($post->tags as $tag)
                                           <a href="{{route('getPostsByTags',['tag'=>$tag->tag->tag])}}" class="tag-cloud-link">{{$tag->tag->tag}}</a>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
							
							<div class="about-author d-flex p-4 bg-light">
								<div class="bio mr-5">
									<img src="{{ $post->user->image_url }}" width="50">
									<!-- <img  src="{{asset('uploads/users/')}}/{{$post->user->image_url}}" width="50"> -->
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

								<div class="row d-flex">
									<h3 class="col-md-12">Leave a comment</h3>
									<form action="{{route('postcomment')}}" method="post" class="col-md-12 bg-light">
                                        @csrf()
                                        <input type="hidden" name="post" value="{{$post->id}}">
										<div class="form-group">
											<label for="message">Message</label>
											<textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
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