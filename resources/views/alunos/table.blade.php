<table class="table table-hover" id="alunos-table">
    <thead>
    <tr>
        <th>Avatar</th>
        <th>Nome</th>
        <th>RG</th>
        <th>Sexo</th>
        <th>Data Nascimento</th>
        <th>Tipo</th>
        <th colspan="3"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($alunos as $alunos)
        <tr>
            <td>
                <img src="{!! $alunos->foto_aluno !!}" class="user-image" alt="{!! $alunos->nome_aluno !!}">
            </td>
            <td>{!! $alunos->nome_aluno !!}</td>
            <td>{!! $alunos->rg_aluno !!}</td>
            <td>{!! $alunos->sexo_aluno !!}</td>
            <td>{!! $alunos->data_nascimento_aluno !!}</td>
            <td>{!! $alunos->tipo_pessoas_id !!}</td>
            <td>

                <div class="btn-group" tabindex="2">
                    <button type="button" class="btn btn-default">Ação</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" tabindex="2">
                        <li>
                            <a href="{!! route('alunos.show', [$alunos->id]) !!}">
                                <i class="glyphicon glyphicon-eye-open"></i> Ver
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('alunos.edit', [$alunos->id]) !!}">
                                <i class="glyphicon glyphicon-edit"></i> Editar
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            {!! Form::open(['route' => ['alunos.destroy', $alunos->id], 'method' => 'delete']) !!}

                            <a type="submit" href="#" onclick="return confirm('Você deseja excluir o aluno(a) {!! $alunos->nome_aluno !!}?')">
                                <i class="glyphicon glyphicon-trash"></i> Excluir
                            </a>
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>