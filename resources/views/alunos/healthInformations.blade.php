@if(!empty($alunos->healthInformations_id))
    <div id="errorsHealthInformations" style="display: none">Dados médicos não encontrado</div>
    <div id="{{$alunos->healthInformations_id}}" class="healthInformations" style="display: none">
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
                <div class="outrasdoencas">
                    <dt>Outras doenças</dt>
                    <dd id="outradoenca"></dd>
                </div>
            </dl>
            <dl class="dl-horizontal">
                <dt>Bronquite</dt>
                <dd id="bronquite"></dd>
                <dt>Falta de ar</dt>
                <dd id="faltadear"></dd>
                <dt>Diabetes</dt>
                <dd id="diabete"></dd>
                <dt>Refluxo</dt>
                <dd id="refluxo"></dd>
                <dt>Convulsão</dt>
                <dd id="convulsao"></dd>
                <div class="medicamosTomar">
                    <dt>Medicamentos a tomar</dt>
                    <dd id="medicamentotomar"></dd>
                </div>
                <dt>Alergia</dt>
                <dd id="alergia"></dd>
                <div class="sintomasalergia">
                    <dt>Sintomas da alergia</dt>
                    <dd id="sintomasalergia"></dd>
                </div>
            </dl>
            <dl class="dl-horizontal">
                <dt>Visão</dt>
                <dd id="visao"></dd>
                <dt>Fala</dt>
                <dd id="fala"></dd>
                <dt>Audição</dt>
                <dd id="audicao"></dd>
                <dt>Deficiência Fisica</dt>
                <dd id="edfisica"></dd>
                <div class="outrasDeficiencias">
                    <dt>Outras Deficiências</dt>
                    <dd id="outradeficienciax"></dd>
                </div>
            </dl>
        </div>
    </div>


    <!-- Modal -->



@else
    O aluno não tem ficha médica cadastrada
@endif


