<table class="table table-responsive" id="pessoas-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Cpf Cnpj</th>
        <th>Sexo</th>
        <th>Rg</th>
        <th>Datanascimento</th>
        <th>Estadocivil</th>
        <th>Razaosocial</th>
        <th>Nomefantasia</th>
        <th>Inscricaoestadual</th>
        <th>Nacionalidade</th>
        <th>Status</th>
        <th>Tipo Pessoas Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pessoas as $pessoa)
        <tr>
            <td>{!! $pessoa->nome !!}</td>
            <td>{!! $pessoa->cpf_cnpj !!}</td>
            <td>{!! $pessoa->sexo !!}</td>
            <td>{!! $pessoa->rg !!}</td>
            <td>{!! $pessoa->dataNascimento !!}</td>
            <td>{!! $pessoa->estadoCivil !!}</td>
            <td>{!! $pessoa->razaoSocial !!}</td>
            <td>{!! $pessoa->nomeFantasia !!}</td>
            <td>{!! $pessoa->inscricaoEstadual !!}</td>
            <td>{!! $pessoa->nacionalidade !!}</td>
            <td>{!! $pessoa->status !!}</td>
            <td>{!! $pessoa->tipo_pessoas_id !!}</td>
            <td>
                {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pessoas.show', [$pessoa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pessoas.edit', [$pessoa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>