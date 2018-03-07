<table class="table table-bordered">
    <tbody>
    <tr>
        <th style="width: 10px">#</th>
        <th>Aluno</th>
        <th>Matérias</th>
        <th>Progresso</th>
        <th style="width: 40px">Média</th>
    </tr>

    @foreach($class->alunos as $aluno)
        <tr>
            <td>{{$aluno->id}}</td>
            <td>{{$aluno->nome_aluno}}</td>
            <td>Update software</td>
            <td>
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                </div>
            </td>
            <td><span class="badge bg-red">55%</span></td>
        </tr>
    @endforeach


    </tbody>
</table>