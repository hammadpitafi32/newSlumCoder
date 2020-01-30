<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $postCategory->category }}</p>
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

