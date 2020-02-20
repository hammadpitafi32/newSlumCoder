<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- About Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('about', 'About:') !!}
    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['readonly'=>'readonly','class' => 'form-control']) !!}
</div>


<!-- Image Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'Image:') !!}
    {!! Form::file('image_url', null, ['class' => 'form-control']) !!}

    @if($mode == 'edit')
        @if(!empty($users->image_url))
            <img src="{{ $users->image_url }}" width="50">
        @else
            <img src="/images/noimage.png" width="50">
        @endif
    @endif
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
