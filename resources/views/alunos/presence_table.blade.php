<table class="table table-condensed">
    <thead>
    <tr>
        <th>Turma</th>
        <th>Data</th>
        <th>H/Presença</th>
    </tr>
    </thead>
    <tbody>

    @for($i = 0 ; $i < count($alunos->call) && $i <= 2; $i++)
        <tr>
            <td>
                {{$alunos->call[$i]->yearClass->schoolSubject[0]->nome}}
            </td>
            <td>
                {{$alunos->call[$i]->date->format('d/m/Y')}}
            </td>
            <td>
                {{$alunos->call[$i]->pivot->presence == 1? "Presente": "Falta"}}
            </td>
        </tr>
    @endfor
    </tbody>
</table>