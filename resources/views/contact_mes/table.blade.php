<div class="table-responsive">
    <table class="table" id="contactMes-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactMes as $contactMe)
            <tr>
                <td>{{ $contactMe->name }}</td>
                <td>{{ $contactMe->email }}</td>
                <td>{{ $contactMe->subject }}</td>
                <td>{{ $contactMe->message }}</td>
                <td>
                    {!! Form::open(['route' => ['contactMes.destroy', $contactMe->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contactMes.show', [$contactMe->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('contactMes.edit', [$contactMe->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
