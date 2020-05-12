
<!-- Content Field -->
{!! Form::hidden('content', null, ['id'=>'content','class' => 'form-control']) !!}
<div class="form-group col-sm-12">
    {!! Form::label('Title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('summernote',isset($posts)?$posts->content:null, ['id'=>'summernote','class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('Category', 'Category:') !!}
    {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['id'=>'submit','class' => 'btn btn-primary']) !!}
    <a href="{{ route('posts.index') }}" class="btn btn-default">Cancel</a>
</div>
