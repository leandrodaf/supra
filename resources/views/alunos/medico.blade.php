
@if(!empty($alunos->dados_medicos_id))
    <div id="errorsDadosMedicos" style="display: none">Dados médicos não encontrado</div>
    <div id="{{$alunos->dados_medicos_id}}" class="dadosMedicos" style="display: none">
        <div class="col-lg-6">
            <dl class="dl-horizontal">
                <dt>Sarampo</dt>
                <dd id="sarampo"></dd>
                <dt>Rubeola</dt>
                <dd id="rubeola"></dd>
                <dt>Catapora</dt>
                <dd id="catapora"></dd>
                <dt>Escarlatina</dt>
                <dd id="escarlatina"></dd>
                <dt>Outras doenças</dt>
                <dd id="outradoenca"></dd>
            </dl>
            <dl class="dl-horizontal">
                {{--<h4>Teste</h4>--}}
                <dt>Bronquite</dt>
                <dd id="bronquite"></dd>
                <dt>Falta de ar</dt>
                <dd id="faltadear"></dd>
                <dt>Diabete</dt>
                <dd id="diabete"></dd>
                <dt>Refluxo</dt>
                <dd id="refluxo"></dd>
                <dt>Convulsao</dt>
                <dd id="convulsao"></dd>
                <dt>Medicamos a tomar</dt>
                <dd id="medicamentotomar"></dd>
                <dt>alergia</dt>
                <dd id="alergia"></dd>
                <dt>Sintomas da alergia</dt>
                <dd id="sintomasalergia"></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Visão</dt>
                <dd id="visao"></dd>
                <dt>Fala</dt>
                <dd id="fala"></dd>
                <dt>Audição</dt>
                <dd id="audicao"></dd>
                <dt>Deficiencia Fisica</dt>
                <dd id="edfisica"></dd>
                <dt>Outras deficiencias</dt>
                <dd id="outradeficienciax"></dd>
            </dl>
        </div>
    </div>


    <!-- Modal -->
    <div id="editarDadosMedicos" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edição de dados médicos</h4>
                </div>

                <div class="modal-body">

                    {!! Form::open(['route' => ['dadosMedicos.update', $alunos->dados_medicos_id], 'id' => 'formDadosMedicos', 'data-toggle' => 'validator', 'method' => 'PUT']) !!}

                        <dl class="dl-horizontal">
                            <dt>Sarampo</dt>
                            <dd id="sarampo">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[sarampo]', '1', null, ['id' => 'sarampoField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[sarampo]', '0', null, ['id' => 'sarampoFieldFalse']) !!} Não</label>

                            </dd>
                            <dt>Rubeola</dt>
                            <dd id="rubeola">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[rubeola]', '1', null, ['id' => 'rubeolaField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[rubeola]', '0', null, ['id' => 'rubeolaFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Catapora</dt>
                            <dd id="catapora">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[catapora]', '1', null, ['id' => 'cataporaField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[catapora]', '0', null, ['id' => 'cataporaFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Escarlatina</dt>
                            <dd id="escarlatina">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[escarlatina]', '1', null, ['id' => 'escarlatinaField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[escarlatina]', '0', null, ['id' => 'escarlatinaFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Outras doenças</dt>
                            <dd id="outradoenca">
                                    <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[outradoenca]', null,['rows' => '3', 'id' => 'outradoencaField']) !!}</label>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            {{--<h4>Teste</h4>--}}
                            <dt>Bronquite</dt>
                            <dd id="bronquite">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[bronquite]', '1', null, ['id' => 'bronquiteField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[bronquite]', '0', null, ['id' => 'bronquiteFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Falta de ar</dt>
                            <dd id="faltadear">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[faltadear]', '1', null, ['id' => 'faltadearField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[faltadear]', '0', null, ['id' => 'faltadearFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Diabete</dt>
                            <dd id="diabete">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[diabete]', '1', null, ['id' => 'diabeteField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[diabete]', '0', null, ['id' => 'diabeteFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Refluxo</dt>
                            <dd id="refluxo">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[refluxo]', '1', null, ['id' => 'refluxoField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[refluxo]', '0', null, ['id' => 'refluxoFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Convulsao</dt>
                            <dd id="convulsao">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[convulsao]', '1', null, ['id' => 'convulsaoField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[convulsao]', '0', null, ['id' => 'convulsaoFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Medicamos a tomar</dt>
                            <dd id="medicamentotomar">
                                <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[medicamentotomar]', null,['rows' => '3', 'id' => 'medicamentotomarField']) !!}</label>
                            </dd>
                            <dt>alergia</dt>
                            <dd id="alergia">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[alergia]', '1', null, ['id' => 'alergiaField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[alergia]', '0', null, ['id' => 'alergiaFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Sintomas da alergia</dt>
                            <dd id="sintomasalergia">
                                    <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[sintomasalergia]', null,['rows' => '3', 'id' => 'sintomasalergiaField']) !!}</label>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Visão</dt>
                            <dd id="visao">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[visao]', '1', null, ['id' => 'visaoField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[visao]', '0', null, ['id' => 'visaoFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Fala</dt>
                            <dd id="fala">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[fala]', '1', null, ['id' => 'falaField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[fala]', '0', null, ['id' => 'falaFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Audição</dt>
                            <dd id="audicao">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[audicao]', '1', null, ['id' => 'audicaoField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[audicao]', '0', null, ['id' => 'audicaoFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Deficiencia Fisica</dt>
                            <dd id="edfisica">
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[edfisica]', '1', null, ['id' => 'edfisicaField']) !!} Sim</label>
                                <label class="checkbox-inline">{!! Form::radio('dadosMedicos[edfisica]', '0', null, ['id' => 'edfisicaFieldFalse']) !!} Não</label>
                            </dd>
                            <dt>Outras deficiencias</dt>
                            <dd id="outradeficienciax">
                                    <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[outradeficienciax]', null,['rows' => '3', 'id' =>'outradeficienciaxField']) !!} </label>
                            </dd>
                        </dl>

                    {!! Form::button('Atualizar dados médicos', ['class' => 'btn btn-primary', 'id' => 'buttonAtualizarDadosMedicos']) !!}
                    <a data-dismiss="modal" aria-label="Close" class="btn btn-default">Cancelar</a>

                    {!! Form::close() !!}
                </div>

                <div class="overlay"  style="display:none;" id="loadingAtualizaDadosMedicos">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>

        </div>
    </div>

@else
    O aluno não tem ficha médica cadastrada
@endif


