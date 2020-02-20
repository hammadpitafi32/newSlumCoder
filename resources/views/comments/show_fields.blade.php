<!-- Post Id Field -->
<div class="form-group">
    {!! Form::label('post_id', 'Post:') !!}
    <p>{{ $comments->post->title }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $comments->user->name }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $comments->message }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $comments->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $comments->updated_at }}</p>
</div>

