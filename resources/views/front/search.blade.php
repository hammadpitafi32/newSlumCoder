@extends('layouts.theme_master')

@section('content')
<style> 
    .truncate {
        width: 400px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="col-xl-12 py-12 px-md-12">
    <div class="row pt-md-4">
            @if($posts->count()>0)
            @foreach($posts as $post)
            <div class="col-md-12">
                <div class="blog-entry ftco-animate d-md-flex">
                    <a href="{{route('article',[$post->id])}}" class="img img-2" style="background-image: url('{{asset('uploads/catgory/')}}/{{$post->category->image_url}}');"></a>
                    <div class="text text-2 pl-md-4">
                        <h3 class="mb-2"><a href="{{route('article',[$post->id])}}">{{$post->title}}</a></h3>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y')}}</span>
                                <span><a href="{{route('article',[$post->id])}}"><i class="icon-folder-o mr-2"></i>{{$post->category->category}}</a></span>
                                <span><i class="icon-comment2 mr-2"></i>{{$post->comments->count()}} Comment</span>
                            </p>
                        </div>
                        <div class="truncate">                      
                                {!! preg_replace("/<img[^>]+\>/i", "", $post->content) !!}
                        </div>
                        
                        <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
           
            <div class="alert alert-warning col-md-12">
                <strong>Sorry!</strong> No record found in search.
            </div>
            @endif
    </div>
    
</div>


@endsection