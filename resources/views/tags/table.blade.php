<div class="table-responsive">
    <table class="table dataTable" id="tags-table">
        <thead>
            <tr>
                <th>Tag</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tags as $tags)
            <tr>
                <td>{{ $tags->tag }}</td>
                <td>{{ $tags->user->name }}</td>
                <td>
                    {!! Form::open(['route' => ['tags.destroy', $tags->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tags.show', [$tags->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tags.edit', [$tags->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
