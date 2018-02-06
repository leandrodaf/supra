<!-- Tipo Pessoas Id Field -->
<div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoa:') !!}
    {!! Form::select('tipo_pessoas_id', $tipoPessoas, !empty($pessoa)? $pessoa->tipo_pessoa_id:2, ['class' => 'form-control']) !!}
</div>


<!-- Nome Field -->
<div class="form-group nome {{$errors->has('nome') ? "has-error":""}} col-sm-6">
    {!! Form::label('nome', 'Nome Completo:', ['id' => 'nomeLabel']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpf Cnpj Field -->
<div class="form-group {{$errors->has('cpf_cnpj') ? "has-error":""}} col-sm-6">
    {!! Form::label('cpf_cnpj', 'CPF:', ['class' =>'cpfCnpj']) !!}
    {!! Form::text('cpf_cnpj', null, ['class' => 'form-control validatecpf']) !!}
</div>

<!-- Rg Field -->
<div class="form-group rg {{$errors->has('rg') ? "has-error":""}} col-sm-6">
    {!! Form::label('rg', 'Rg:') !!}
    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
</div>

<!-- Datanascimento Field -->
<div class="form-group dataNascimento {{$errors->has('dataNascimento') ? "has-error":""}} col-sm-6">
    {!! Form::label('dataNascimento', 'Nascimento:') !!}
    {!! Form::text('dataNascimento', !empty($pessoa->dataNascimento)? $pessoa->dataNascimento->format('d/m/Y') :null, ['class' => 'form-control', 'format' => 'dd/MM/yyyy']) !!}
</div>

<!-- familySituation Field -->
<div class="form-group familySituation {{$errors->has('familySituation') ? "has-error":""}} col-sm-6">
    {!! Form::label('familySituation', 'Estado civil:') !!}
    {!! Form::select('familySituation', $familySituation, !empty($pessoa)? $pessoa->familySituation:null, ['class' => 'form-control']) !!}
</div>

<!-- Citizenship Field -->
<div class="form-group citizenship {{$errors->has('citizenship') ? "has-error":""}} col-sm-6">
    {!! Form::label('citizenship', 'Nacionalidade:') !!}
    {!! Form::select('citizenship', $citizenships, !empty($pessoa)? $pessoa->citizenship:7, ['class' => 'form-control']) !!}
</div>


<!-- Sexo Field -->
<div class="form-group sexo {{$errors->has('sexo') ? "has-error":""}} col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    <label class="checkbox-inline">
        {!! Form::select('sexo', $genders, !empty($pessoa)? $pessoa->sexo:null, ['class' => 'form-control']) !!}
    </label>
</div>
<div class="form-group  col-sm-6">
</div>
<div class="form-group  col-sm-6">
</div>


<div class="form-group {{$errors->has('email') ? "has-error":""}} col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <select id="emailResponsavel" name="email[][email]" multiple="multiple"></select>

    @if(!empty($pessoa) )
        <p></p>
        {!! Form::label('email', 'E-mails cadastrados:') !!}
        <dl class="dl-horizontal">
            <p></p>
            <!-- lista de emails -->
            @foreach($pessoa->email->toArray() as $email)
                <dt>


                    <a href="#deletar-email-{{$pessoa['id']}}"
                       class="btn btn-default btn-flat {{count($pessoa->email->toArray()) >1 && $email['pivot']['flg_principal'] != 1 ?"":"disabled" }}"
                       onclick="document.getElementById({!! "'#deletar-email-".$email['id']."'" !!}).submit();" {{count($pessoa->email->toArray()) >1 ?"":"disabled" }}>

                        <i class="glyphicon glyphicon-trash"></i>

                    </a>
                    {{--onclick="document.getElementById({!! "'#emailMain-".$email['id']."'" !!}).submit();--}}

                </dt>
                <dd>
                    <a class="listEmail" href="#mainEmail"
                       {{count($pessoa->email->toArray()) >1 && $email['pivot']['flg_principal'] != 1 ?'':'data-toggle="tooltip"' }} id="{{$pessoa->id.'-'.$email['id']}}"
                       title="{{$email['pivot']['flg_principal'] != 0 ? "E-mail principal": "Tornar o e-mail principal"}}">{{$email['email']}}</a>
                    <span class="label label-info">{{$email['pivot']['flg_principal'] == 1 ? "Principal":""}}</span>
                </dd>
            @endforeach
        </dl>
    @endif
</div>


{{--Add fild Phone--}}
<div class="form-group {{$errors->has('phone') ? "has-error":""}} col-sm-6">
    {!! Form::label('phone', 'Telefone:') !!}
    <select id="telefoneResponsavel" name="phone[][number]" multiple="multiple"></select>

    @if(!empty($pessoa) )
        <p></p>
        {!! Form::label('phone', 'Telefones cadastrados:') !!}
        <dl class="dl-horizontal">
            <p></p>
            <!-- lista de phones -->

            @foreach($pessoa->phone->toArray() as $phone)
                <dt>

                    <a href="#deletar-phone-{{$pessoa['id']}}"
                       class="btn btn-default btn-flat {{count($pessoa->phone->toArray()) >1 && $phone['pivot']['flg_principal'] != 1 ?"":"disabled" }}"
                       onclick="document.getElementById({!! "'#deletar-phone-".$phone['id']."'" !!}).submit();" {{count($pessoa->phone->toArray()) >1 ?"":"disabled" }}>

                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                </dt>
                <dd>
                    <a class="listphone" href="#mainphone"
                       {{count($pessoa->phone->toArray()) >1 && $phone['pivot']['flg_principal'] != 1 ?'':'data-toggle="tooltip"' }} id="{{$pessoa->id.'-'.$phone['id']}}"
                       title="{{$phone['pivot']['flg_principal'] != 0 ? "Telefone principal": "Tornar o Telefone principal"}}">{{$phone['number']}}</a>
                    <span class="label label-info">{{$phone['pivot']['flg_principal'] == 1 ? "Principal":""}}</span>
                </dd>
            @endforeach
        </dl>
    @endif
</div>


<div id="tipoEmpresa" style="display: none;">
    <div class="form-group {{$errors->has('Dados da empresa') ? "has-error":""}} col-sm-12">
        {!! Form::label('Dados da empresa', 'Dados da empresa:') !!}
    </div>

    <div class="form-group col-sm-12">


        <!-- Razaosocial Field -->
        <div class="form-group {{$errors->has('razaoSocial') ? "has-error":""}} col-sm-6">
            {!! Form::label('razaoSocial', 'Razão social:') !!}
            {!! Form::text('razaoSocial', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Inscricaoestadual Field -->
        <div class="form-group {{$errors->has('inscricaoEstadual') ? "has-error":""}} col-sm-6">
            {!! Form::label('inscricaoEstadual', 'Inscrição estadual:') !!}
            {!! Form::text('inscricaoEstadual', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div id="dadosFuncionario" style="display: none;">

    <div class="form-group {{$errors->has('Dados Financeiros') ? "has-error":""}} col-sm-12">
        {!! Form::label('Dados Financeiros', 'Financeiro:') !!}
    </div>


    <div class="form-group col-sm-12">


        <div class="form-group {{$errors->has('funcao') ? "has-error":""}} col-sm-6">
            {!! Form::label('setor', 'Departamento:') !!}
            <select class="form-control" id="setorFuncionario" name="department[]" multiple="multiple">

                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{$department->nome}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group {{$errors->has('funcao') ? "has-error":""}} col-sm-6">
            {!! Form::label('funcao', 'Função do funcionário:') !!}
            <select class="form-control" id="funcaoFuncionario" name="role[]" multiple="multiple">

                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{$role->nome}}</option>
                @endforeach
            </select>
        </div>


        <!-- Datanascimento Field -->
        <div class="form-group {{$errors->has('data_admissao') ? "has-error":""}} col-sm-6">
            {!! Form::label('data_admissao', 'Data admissão:') !!}
            {!! Form::text('data_admissao', !empty($pessoa->data_admissao)? $pessoa->data_admissao->format('d/m/Y') :null, ['class' => 'form-control', 'format' => 'dd/MM/yyyy']) !!}
        </div>

        <div class="form-group {{$errors->has('numero_ctps') ? "has-error":""}} col-sm-6">
            {!! Form::label('numero_ctps', 'Número CTPS:') !!}
            {!! Form::text('numero_ctps', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group {{$errors->has('ctps_serie') ? "has-error":""}} col-sm-6">
            {!! Form::label('ctps_serie', 'CTPS Série:') !!}
            {!! Form::text('ctps_serie', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group {{$errors->has('pis') ? "has-error":""}} col-sm-6">
            {!! Form::label('pis', 'Número PIS:') !!}
            {!! Form::text('pis', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group {{$errors->has('salario_base') ? "has-error":""}} col-sm-6">
            {!! Form::label('salario_base', 'Salário base:') !!}
            {!! Form::text('salario_base', null, ['class' => 'form-control', 'data-thousands' => '.', 'data-decimal'=> ',', 'data-prefix' => 'R$ ']) !!}
        </div>

        <div class="form-group {{$errors->has('vale_refeicao') ? "has-error":""}} col-sm-6">
            {!! Form::label('vale_refeicao', 'Vale refeição:') !!}
            {!! Form::text('vale_refeicao', null, ['class' => 'form-control', 'data-thousands' => '.', 'data-decimal'=> ',', 'data-prefix' => 'R$ ']) !!}
        </div>

        <div class="form-group {{$errors->has('vale_transporte') ? "has-error":""}} col-sm-6">
            {!! Form::label('vale_transporte', 'Vale transporte:') !!}
            {!! Form::text('vale_transporte', null, ['class' => 'form-control', 'data-thousands' => '.', 'data-decimal'=> ',', 'data-prefix' => 'R$ ']) !!}
        </div>

    </div>


    <div class="form-group col-sm-12">

        <div class="form-group {{$errors->has('pis') ? "has-error":""}} col-sm-6">
            {!! Form::label('contato_emergencial', 'Contato emergêncial') !!}
            {!! Form::text('contato_emergencial', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div>

        <div class="form-group {{$errors->has('dadossaude') ? "has-error":""}} col-sm-12">
            {!! Form::label('Dados de saúde', 'Dados de saúde:') !!}
        </div>


        <div class="form-group col-sm-12">
            <dl class="dl-horizontal">
                <!-- Bronquite Field -->
                <div class="form-group {{$errors->has('bronquite') ? "has-error":""}} col-sm-6">
                    <dt>Bronquite</dt>
                    <dd id="bronquite">
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[bronquite]', '1', false, ['id' => 'bronquite']) !!}
                            Sim</label>
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[bronquite]', '0', true, ['id' => 'bronquite']) !!}
                            Não</label>
                    </dd>
                </div>


                <div class="form-group {{$errors->has('faltaDeAr') ? "has-error":""}} col-sm-6">
                    <dt>Falta de ar</dt>
                    <dd id="bronquite">
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[faltadear]', '1', false, ['id' => 'faltadear']) !!}
                            Sim</label>
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[faltadear]', '0', true, ['id' => 'faltadear']) !!}
                            Não</label>
                    </dd>
                </div>


                <div class="form-group {{$errors->has('diabetes') ? "has-error":""}} col-sm-6">
                    <dt>Diabetes</dt>
                    <dd id="bronquite">
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[diabete]', '1', false, ['id' => 'diabetes']) !!}
                            Sim</label>
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[diabete]', '0', true, ['id' => 'diabetes']) !!}
                            Não</label>
                    </dd>
                </div>

                <div class="form-group {{$errors->has('convulsao') ? "has-error":""}} col-sm-6">
                    <dt>Convulsão</dt>
                    <dd id="bronquite">
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[convulsao]', '1', false, ['id' => 'convulsao', 'class' => 'convulsao']) !!}
                            Sim</label>
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[convulsao]', '0', true, ['id' => 'convulsao', 'class' => 'convulsao']) !!}
                            Não</label>
                    </dd>
                </div>


                <div class="form-group {{$errors->has('alergia') ? "has-error":""}} col-sm-6">
                    <dt>Alergia</dt>
                    <dd id="alergia">
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[alergia]', '1', false, ['id' => 'alergia', 'class' => 'alergia' ]) !!}
                            Sim</label>
                        <label class="checkbox-inline">{!! Form::radio('healthInformations[alergia]', '0', true, ['id' => 'alergia', 'class' => 'alergia']) !!}
                            Não</label>
                    </dd>
                </div>


                <div class="form-group sintomasalergia {{$errors->has('sintomas') ? "has-error":""}} col-sm-6">
                    <dt>Sintomas</dt>
                    <dd id="sintomasalergia">
                        <label class="checkbox-inline">{!! Form::textarea('healthInformations[sintomasalergia]', null,['rows' => '3','cols' => '35' ,'id' => 'sintomas']) !!}</label>
                    </dd>
                </div>

            </dl>


        </div>

    </div>
</div>


<div class="form-group {{$errors->has('location') ? "has-error":""}} col-sm-12">
    {!! Form::label('location', 'Endereço:') !!}
</div>
<!-- Endereço -->
<div class="form-group col-sm-12">

    {{ Form::hidden('locations[id]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->id:null:null) }}

    <div class="form-group {{$errors->has('locations.zipCode') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[zipCode]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->zipCode:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'CEP', 'id' => 'zipCode']) !!}
    </div>

    <div class="form-group {{$errors->has('locations.street') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[street]',!empty($pessoa)?  count($pessoa->location) != 0 ? $pessoa->location[0]->street:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Rua', 'id' => 'street']) !!}
    </div>

    <div class="form-group {{$errors->has('locations.number') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[number]', !empty($pessoa)? count($pessoa->location) != 0 ?  $pessoa->location[0]->number:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Número', 'id' => 'number']) !!}
    </div>

    <div class="form-group {{$errors->has('locations.city') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[city]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->city:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Cidade', 'id' => 'city']) !!}
    </div>

    <div class="form-group {{$errors->has('locations.complement') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[complement]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->complement:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Complemento', 'id' => 'complement']) !!}
    </div>

    <div class="form-group {{$errors->has('locations.neighborhood') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[neighborhood]',!empty($pessoa)?  count($pessoa->location) != 0 ? $pessoa->location[0]->neighborhood:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Bairro', 'id' => 'neighborhood']) !!}
    </div>

    <div class="form-group {{$errors->has('locations.state') ? "has-error":""}} col-sm-6">
        {{--        {!! Form::text('locations[estado]', !empty($pessoa)? count($pessoa->location) != 0? $pessoa->location[0]->estado:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'state', 'id' => 'state']) !!}--}}

        {!! Form::select('locations[state]', array('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO',), !empty($pessoa)?  count($pessoa->location) != 0 ? $pessoa->location[0]->state:null:null, ['class' => 'form-control', 'id'=> 'state']) !!}


    </div>

    <div class="form-group {{$errors->has('locations.country') ? "has-error":""}} col-sm-6">
        {!! Form::text('locations[country]',!empty($pessoa)?  count($pessoa->location) != 0? $pessoa->location[0]->country:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'País', 'id' => 'country']) !!}
    </div>

</div>