<div class="table-responsive">
    <table class="table dataTable" id="users-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>About</th>
                <th>Email</th>
                <th>Role</th>
                <!-- <th>Password</th> -->
                
                <th>Created AT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $users)
            <tr>
                <td> 
                    @if(!empty($users->image_url))
                    <img src="{{ $users->image_url }}" width="50" height="50">
                    @else
                    <img src="/images/noimage.png" width="50" height="50">
                    @endif
                </td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->about }}</td>
                <td>{{ $users->email }}</td>
                @foreach($users->getRoleNames() as $roleName)
                <td>{{ $roleName }}</td>
                @endforeach
                <td>{{ $users->created_at }}</td>
                
                <!-- <td>{{ $users->remember_token }}</td> -->
                <td>
                    {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
