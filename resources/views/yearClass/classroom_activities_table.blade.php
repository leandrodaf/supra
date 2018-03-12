<table class="table table-condensed table-responsive">
    <thead>
    <tr>
        <th>Titulo</th>
        <th style="text-align: center">Inicío</th>
        <th style="text-align: center">Fim</th>
        <th style="text-align: center">Anexos</th>
    </tr>
    </thead>
    <tbody id="yearclass">
    @foreach($class->activitie as $activitie)
        <tr data-id="{{$activitie->id}}" style="cursor: pointer; color: #3c8dbc;" data-toggle="modal" data-target="#activitiesInfoModal">
            <td>
                {{$activitie->title}}
            </td>
            <td style="text-align: center">
                {{$activitie->start_date->format('d/m/Y')}}
            </td>
            <td style="text-align: center">
                {{$activitie->end_date->format('d/m/Y')}}
            </td>
            <td style="text-align: center">
                {{count($activitie->fileentry)}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>