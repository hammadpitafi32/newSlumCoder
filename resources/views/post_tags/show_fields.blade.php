<!-- Tag Id Field -->
<div class="form-group">
    {!! Form::label('tag_id', 'Tag:') !!}
    <p>{{ $postTags->tag->tag }}</p>
</div>

<!-- Post Id Field -->
<div class="form-group">
    {!! Form::label('post_id', 'Post:') !!}
    <p>{{ $postTags->post->title}}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $postTags->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $postTags->updated_at }}</p>
</div>

