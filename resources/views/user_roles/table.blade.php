<div class="table-responsive">
    <table class="table dataTable" id="userRoles-table">
        <thead>
            <tr>
                <th>Model Type</th>
                <th>Model Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userRoles as $userRoles)
            <tr>
                <td>{{ $userRoles->model_type }}</td>
                <td>{{ $userRoles->model_id }}</td>
                <td>
                    {!! Form::open(['route' => ['userRoles.destroy', $userRoles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('userRoles.show', [$userRoles->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('userRoles.edit', [$userRoles->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
