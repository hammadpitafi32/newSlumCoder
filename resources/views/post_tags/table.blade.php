<div class="table-responsive">
    <table class="table dataTable" id="postTags-table">
        <thead>
            <tr>
                <th>Tags</th>
                <th>Post</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postTags as $postTags)
            <tr>
                <td>{{ $postTags->tag->tag }}</td>
                <td>{{ $postTags->post->title}}</td>
                <td>
                    {!! Form::open(['route' => ['postTags.destroy', $postTags->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postTags.show', [$postTags->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('postTags.edit', [$postTags->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
