<table class="table table-responsive" id="emails-table">
    <thead>
        <tr>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($emails as $email)
        <tr>
            <td>{!! $email->email !!}</td>
            <td>
                {!! Form::open(['route' => ['emails.destroy', $email->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('emails.show', [$email->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('emails.edit', [$email->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>