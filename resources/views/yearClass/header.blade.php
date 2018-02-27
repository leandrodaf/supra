<!-- Sala -->
<div style="padding: 15px;">

    <div style="height: 75px; width: 90px; position: relative; padding: 5px; float: left">
        <div style="font-size:3em;">
            <i class="fa fa-graduation-cap avatar img-radius pull-left"></i>
        </div>

        <br/>
        <small style="font-size: 10px; text-align: center;" class="text-center">Atualizado
            em: {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $class->updated_at)->format('d/m/Y')}}</small>
    </div>
    <div style="float: right;">

        <dl class="dl-horizontal">
            <dt>Turma</dt>
            <dd>{!! $class->classroom->nome_sala !!}</dd>

            <dt>Encerra em</dt>
            <dd>
                @if(\Carbon\Carbon::createFromFormat('Y-m-d', $class->activeTime)->equalTo(\Carbon\Carbon::now()))
                    <span class="text-red">{!! \Carbon\Carbon::createFromFormat('Y-m-d', $class->activeTime)->format('M') .' de '. \Carbon\Carbon::createFromFormat('Y-m-d', $class->activeTime)->year!!}</span>
                @else
                    <span class="text-green">{!! \Carbon\Carbon::createFromFormat('Y-m-d', $class->activeTime)->format('M') .' de '. \Carbon\Carbon::createFromFormat('Y-m-d', $class->activeTime)->year!!}</span>
                @endif


            </dd>

            <dt>Horas</dt>

            <dd>{!! \Carbon\Carbon::createFromFormat('H:i:s', $class->startTime)->diffInHours(\Carbon\Carbon::createFromFormat('H:i:s', $class->endTime)).'h' !!}</dd>
        </dl>

    </div>


</div>