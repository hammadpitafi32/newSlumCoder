<!-- Category Field -->

<div class="form-group col-sm-12">
    {!! Form::label('category Image', 'Category Image:') !!}
    {!! Form::file('image_url', null, ['class' => 'form-control']) !!}
    @if(isset($postCategory->image_url) && !empty($postCategory->image_url))

        <img width="50"  src="{{asset('uploads/catgory/')}}/{{$postCategory->image_url}}" width="50">
    @else
        <img src="/themeImages/noimage.png" width="50">
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('postCategories.index') }}" class="btn btn-default">Cancel</a>
</div>
