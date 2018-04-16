<div class="box">
    <div class="box-header with-border">
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-toggle="modal"
                    data-target="#editarHealthInformations">
                <i class="glyphicon glyphicon-edit"></i>
                Editar
            </button>
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
        <div id="{{$pessoa->healthInformations_id}}" class="healthInformations" style="display: none"></div>

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


<div class="modal fade" id="editarHealthInformations" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Edição de dados médicos</h4>
            </div>
            {!! Form::open(['route' => ['healthInformations.update', $pessoa->healthInformations_id], 'id' => 'formHealthInformations', 'data-toggle' => 'validator', 'method' => 'PUT']) !!}

            <div class="modal-body">
                <div class="numeroResponsavel" id="{{$pessoa->healthInformations_id}}"></div>
                <dl class="dl-horizontal">
                    <dt>Bronquite</dt>
                    <dd id="bronquite">
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[bronquite]', '1', $pessoa->getHealthInformation->bronquite ? true:false, ['id' => 'bronquiteField']) !!}
                            Sim
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[bronquite]', '0', !$pessoa->getHealthInformation->bronquite ? true:false, ['id' => 'bronquiteFieldFalse']) !!}
                            Não
                        </label>

                    </dd>
                    <dt>Diabetes</dt>
                    <dd id="diabetes">
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[diabete]', '1', $pessoa->getHealthInformation->diabete ? true:false, ['id' => 'diabeteField']) !!}
                            Sim
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[diabete]', '0', !$pessoa->getHealthInformation->diabete ? true:false, ['id' => 'diabeteFieldFalse']) !!}
                            Não
                        </label>
                    </dd>
                    <dt>Falta de ar</dt>
                    <dd id="faltadear">
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[faltadear]', '1', $pessoa->getHealthInformation->faltadear ? true:false, ['id' => 'faltadearField']) !!}
                            Sim
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[faltadear]', '0', !$pessoa->getHealthInformation->faltadear ? true:false, ['id' => 'faltadearFieldFalse']) !!}
                            Não
                        </label>
                    </dd>
                    <dt>Convulsao</dt>
                    <dd id="convulsao">
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[convulsao]', '1', $pessoa->getHealthInformation->convulsao ? true:false, ['id' => 'convulsaoField']) !!}
                            Sim
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[convulsao]', '0', !$pessoa->getHealthInformation->convulsao ? true:false, ['id' => 'convulsaoFieldFalse']) !!}
                            Não
                        </label>
                    </dd>

                    <dt>Alergia</dt>
                    <dd id="alergia">
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[alergia]', '1', $pessoa->getHealthInformation->alergia ? true:false, ['id' => 'alergiaField']) !!}
                            Sim
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::radio('healthInformations[alergia]', '0', !$pessoa->getHealthInformation->alergia ? true:false, ['id' => 'alergiaFieldFalse']) !!}
                            Não
                        </label>
                    </dd>
                </dl>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                {!! Form::button('Atualizar dados médicos', ['class' => 'btn btn-primary', 'id' => 'buttonAtualizarHealthInformations'])!!}
            </div>
            {!! Form::close() !!}

            <div class="overlay" style="display:none;" id="loadingAtualizaHealthInformations">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>