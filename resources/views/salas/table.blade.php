<table class="table table-responsive" id="salas-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Status</th>
        <th>Capacidade</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($salas as $sala)
        <tr>
            <td>{!! $sala->nome_sala !!}</td>
            <td>{!! $sala->status ? "Ativo": "Inativo"!!}</td>
            <td>{!! $sala->capacidade . " Alunos"!!}</td>
            <td>
                {!! Form::open(['route' => ['salas.destroy', $sala->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
{{--                    <a href="{!! route('salas.show', [$sala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}

                    <a href="{!! route('salas.edit', [$sala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
{{--                    <a href="{!! route('salas.edit', [$sala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {{--{!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>