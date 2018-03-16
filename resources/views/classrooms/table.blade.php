<table class="table table-responsive table-responsive" id="classrooms-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Status</th>
        <th>Capacidade</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($classrooms as $classroom)
        <tr>
            <td>{!! $classroom->nome_sala !!}</td>
            <td>{!! $classroom->status ? "Ativo": "Inativo"!!}</td>
            <td>{!! $classroom->capacidade . " Alunos"!!}</td>
            <td>
                {!! Form::open(['route' => ['classrooms.destroy', $classroom->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
{{--                    <a href="{!! route('classrooms.show', [$classroom->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}

                    <a href="{!! route('classrooms.edit', [$classroom->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
{{--                    <a href="{!! route('classrooms.edit', [$classroom->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {{--{!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>