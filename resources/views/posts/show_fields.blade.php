<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user', 'User:') !!}
    <p>{{ $posts->user->name }}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $posts->title }}</p>
</div>
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $posts->category->category }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $posts->status==1?'Active':'Disable' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $posts->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $posts->updated_at }}</p>
</div>

