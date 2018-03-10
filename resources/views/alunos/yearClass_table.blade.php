<table class="table table-condensed">
    <thead>
    <tr>
        <th>Matéria</th>
        <th>H/Dia</th>
        <th>Professor</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody id="yearclass">
    @foreach($alunos->yearClass as $class)
        <tr data-url="{{route('class.show', $class->id)}}" style="cursor: pointer; color: #3c8dbc;">
            <td>
                {{$class->schoolSubject[0]->nome}}
            </td>
            <td>
                {!! \Carbon\Carbon::createFromFormat('H:i:s', $class->startTime)->diffInHours(\Carbon\Carbon::createFromFormat('H:i:s', $class->endTime)).'h' !!}
            </td>
            <td>
                {{$class->pessoa[0]->nome}}
            </td>
            <td>
                {{\Carbon\Carbon::createFromFormat('Y-m-d', $class->activeTime)->gt(\Carbon\Carbon::now()) ? "Ativo":"Inativo"}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>