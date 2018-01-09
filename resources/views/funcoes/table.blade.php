<table class="table table-responsive" id="funcaos-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Status</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($funcoes as $funcao)
        <tr>
            <td>{!! $funcao->nome !!}</td>
            <td>{!! $funcao->status ? "Ativo": "Inativo"!!}</td>
            <td>
                {!! Form::open(['route' => ['funcoes.destroy', $funcao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('funcoes.edit', [$funcao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
{{--                    <a href="{!! route('funcaos.edit', [$funcao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {{--{!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>