<div class="box">
    <div class="box-header with-border">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
        <div class="box-title" style="overflow: hidden">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            Dados médicos
        </div>
        <div class="box-tools pull-right">
        </div>
    </div>
    <div class="box-body">

        <dl class="dl-horizontal">
            <dt>{!! Form::label('bronquite', 'Bronquite:') !!}</dt>
            <dd>{!! $pessoa->getHealthInformation->bronquite ? "Sim":"Não"!!}</dd>

            <dt>{!! Form::label('diabetes', 'Diabetes:') !!}</dt>
            <dd>{!! $pessoa->getHealthInformation->diabete ? "Sim":"Não" !!}</dd>

            <dt>{!! Form::label('falta de ar', 'Falta de Ar:') !!}</dt>
            <dd>{!! $pessoa->getHealthInformation->faltadear ? "Sim":"Não" !!}</dd>

            <dt>{!! Form::label('convulsao', 'Convulsão:') !!}</dt>
            <dd>{!! $pessoa->getHealthInformation->convulsao ? "Sim":"Não" !!}</dd>

            <dt>{!! Form::label('alergia', 'Alergia:') !!}</dt>
            <dd>{!! $pessoa->getHealthInformation->alergia ? "Sim":"Não" !!}</dd>


            @if(!empty($pessoa->getHealthInformation->sintomasalergia))
                <dt>{!! Form::label('sintomas', 'Sintomas:') !!}</dt>
                <dd>{!! $pessoa->getHealthInformation->sintomasalergia !!}</dd>
            @endif
        </dl>

    </div>
    <div class="overlay" style="display:none;" id="loadingHealthInformations">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>

