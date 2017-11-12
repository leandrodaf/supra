
<div id="loadingDadosMedicos" class="overlay" style="display:none;">
    <div class="fa fa-refresh fa-spin"></div>
</div>

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
@else
    O aluno não tem ficha médica cadastrada
@endif


