<table class="table table-condensed">
    <thead>
    <tr>
        <th>Data</th>
        <th>Responsável</th>
        <th class="text-center">Ações</th>
    </tr>
    </thead>
    <tbody id="studentDiary">
    @foreach($alunos->diairy()->take(5)->get() as $diary)
        <tr>
            <td>
                {{$diary->date->format('d/m/Y')}}
            </td>
            <td>
                {{strlen($diary->user[0]->pessoa->nome) >17 ? substr($diary->user[0]->pessoa->nome, 0, 17). '...':$diary->user[0]->pessoa->nome}}
            </td>
            <td class="text-center">
                <a style="cursor: pointer;" data-date="{{$diary->date->format('Y-m-d')}}" data-toggle="modal" data-target="#studentDiaryModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>