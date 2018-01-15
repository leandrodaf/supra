<table class="table table-striped table-bordered dt-responsive nowrap" id="alunos-table">
    <thead>
    <tr>
        <th>Avatar</th>
        <th>Nome</th>
        <th>RG</th>
        <th>Sexo</th>
        <th>Data Nascimento</th>
        <th>Tipo</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    @foreach($alunos as $alunos)
        <tr>
            <td>
                <img src="{!! asset('uploads/avatars/'.$alunos->foto_aluno) !!}" class="user-image"
                     alt="{!! $alunos->nome_aluno !!}" style="height: 50px; width: 50px;">
            </td>
            <td>{!! $alunos->nome_aluno !!}</td>
            <td>{!! $alunos->rg_aluno !!}</td>
            <td>{!! $alunos->gender->nome !!}</td>
            <td>{!! \Carbon\Carbon::parse($alunos->data_nascimento_aluno)->format('d/m/Y') !!}</td>
            <td>{!! $alunos->tipoPessoa->nome !!}</td>
            <td>
                <div class="btn-group">

                    {!! Form::open(['route' => ['alunos.destroy', $alunos->id], 'method' => 'delete']) !!}
                    <a href="{!! route('alunos.show', [$alunos->id]) !!}" class="btn btn-default btn-xs">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{!! route('alunos.edit', [$alunos->id]) !!}" class="btn btn-default btn-xs">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    {{--<a onclick="return confirm('Você deseja excluir o aluno(a) {!! $alunos->nome_aluno !!}?')"--}}
                       {{--class="btn btn-default btn-xs">--}}
                        {{--<i class="glyphicon glyphicon-trash"></i>--}}
                    {{--</a>--}}
                    {!! Form::close() !!}

                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>