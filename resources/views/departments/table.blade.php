<table class="table table-responsive table-responsive" id="setors-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Status</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
            <td>{!! $department->nome !!}</td>
            <td>{!! $department->status ? "Ativo": "Inativo"!!}</td>
            <td>
                {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departments.edit', [$department->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{--<a href="{!! route('departments.edit', [$department->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
{{--                {!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>