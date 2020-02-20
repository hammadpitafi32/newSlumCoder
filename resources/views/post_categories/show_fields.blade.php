<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $postCategory->category }}</p>
</div>
<div class="form-group">
    {!! Form::label('user', 'User:') !!}
    <p>{{ $postCategory->user->name }}</p>
</div>
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    
    @if(!empty($postCategory->image_url))

        <img width="50"  src="{{asset('uploads/catgory/')}}/{{$postCategory->image_url}}" width="50">
    @else
        <img src="/themeImages/noimage.png" width="50">
    @endif
    
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $postCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $postCategory->updated_at }}</p>
</div>

