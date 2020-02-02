<div class="table-responsive">
    <table class="table" id="postCategories-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Category</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postCategories as $postCategory)
            <tr>
                <td>    @if(isset($postCategory->image_url) && !empty($postCategory->image_url))

                    <img width="50"  src="{{asset('uploads/catgory/')}}/{{$postCategory->image_url}}" width="50">
                    @else
                    <img src="/themeImages/noimage.png" width="50">
                @endif</td>
                <td>{{ $postCategory->category }}</td>
                <td>
                    {!! Form::open(['route' => ['postCategories.destroy', $postCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postCategories.show', [$postCategory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('postCategories.edit', [$postCategory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
