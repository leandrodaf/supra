<table class="table table-striped table-bordered dt-responsive nowrap" id="pessoas-table">
    <thead>
    <tr>
        <th>Nome</th>
        <th>CPF/CNPJ</th>
        <th>Status</th>
        <th>Tipo Pessoas</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pessoas as $pessoa)
        <tr>
            <td>{!! $pessoa->nome !!}</td>
            <td>{!! $pessoa->cpf_cnpj !!}</td>
            <td>{!! $pessoa->status != 0 ? "Ativa":"Inativo" !!}</td>
            <td>{!! $pessoa->tipoPessoa->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pessoas.show', [$pessoa->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pessoas.edit', [$pessoa->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>