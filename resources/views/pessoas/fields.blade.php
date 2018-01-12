
<!-- Tipo Pessoas Id Field -->
<div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoa:') !!}
    {!! Form::select('tipo_pessoas_id', $tipoPessoas, !empty($pessoa)? $pessoa->tipo_pessoa_id:2, ['class' => 'form-control','required'=>'required']) !!}
</div>


<!-- Nome Field -->
<div class="form-group {{$errors->has('nome') ? "has-error":""}} col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Cpf Cnpj Field -->
<div class="form-group {{$errors->has('cpf_cnpj') ? "has-error":""}} col-sm-6">
    {!! Form::label('cpf_cnpj', 'CPF:', ['class' =>'cpfCnpj']) !!}
    {!! Form::text('cpf_cnpj', null, ['class' => 'form-control validatecpf','required'=>'required']) !!}
</div>

<!-- Rg Field -->
<div class="form-group {{$errors->has('rg') ? "has-error":""}} col-sm-6">
    {!! Form::label('rg', 'Rg:') !!}
    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
</div>

<!-- Datanascimento Field -->
<div class="form-group {{$errors->has('dataNascimento') ? "has-error":""}} col-sm-6">
    {!! Form::label('dataNascimento', 'Nascimento:') !!}
    {!! Form::text('dataNascimento', !empty($pessoa)? $pessoa->dataNascimento:null, ['class' => 'form-control','required'=>'required', 'format' => 'dd/MM/yyyy']) !!}
</div>

<!-- Estadocivil Field -->
<div class="form-group {{$errors->has('estadoCivil') ? "has-error":""}} col-sm-6">
    {!! Form::label('estadoCivil', 'Estado civil:') !!}
    {!! Form::select('estadoCivil', $estadoCivil, !empty($pessoa)? $pessoa->estadoCivil:null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Nacionalidade Field -->
<div class="form-group {{$errors->has('nacionalidade') ? "has-error":""}} col-sm-6">
    {!! Form::label('nacionalidade', 'Nacionalidade:') !!}
    {!! Form::select('nacionalidade', $nacionalidades, !empty($pessoa)? $pessoa->nacionalidade:7, ['class' => 'form-control','required'=>'required']) !!}
</div>


<!-- Sexo Field -->
<div class="form-group {{$errors->has('sexo') ? "has-error":""}} col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    <label class="checkbox-inline">
        {!! Form::select('sexo', $generos, !empty($pessoa)? $pessoa->sexo:null, ['class' => 'form-control','required'=>'required']) !!}
    </label>
</div>
<div class="form-group  col-sm-6">
</div>
<div class="form-group  col-sm-6">
</div>


<div class="form-group {{$errors->has('email') ? "has-error":""}} col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <select id="email" name="email[][email]" multiple="multiple"></select>

    @if(!empty($alunos) )
        <p></p>
        {!! Form::label('email', 'E-mails cadastrados:') !!}
        <dl class="dl-horizontal">
            <p></p>
            <!-- lista de emails -->
            @foreach($alunos->email->toArray() as $email)
                <dt>


                    <a href="#deletar-{{$email['id']}}"
                       class="btn btn-default btn-flat {{count($alunos->email->toArray()) >1 ?"":"disabled" }}"
                       onclick="document.getElementById({!! "'#deletar-".$email['id']."'" !!}).submit();" {{count($alunos->email->toArray()) >1 ?"":"disabled" }}>
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </dt>
                <dd>{{$email['email']}}</dd>
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

        <!-- Nomefantasia Field -->
        <div class="form-group {{$errors->has('nomeFantasia') ? "has-error":""}} col-sm-6">
            {!! Form::label('nomeFantasia', 'Nome fantasia:') !!}
            {!! Form::text('nomeFantasia', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Inscricaoestadual Field -->
        <div class="form-group {{$errors->has('inscricaoEstadual') ? "has-error":""}} col-sm-6">
            {!! Form::label('inscricaoEstadual', 'Inscrição estadual:') !!}
            {!! Form::text('inscricaoEstadual', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div id="dadosProfessor" style="display: none;">

    <div class="form-group {{$errors->has('Dados Financeiros') ? "has-error":""}} col-sm-12">
        {!! Form::label('Dados Financeiros', 'Financeiro:') !!}
    </div>


    <div class="form-group col-sm-12">



        <div class="form-group {{$errors->has('funcao') ? "has-error":""}} col-sm-6">
            {!! Form::label('setor', 'Setor:') !!}
            <select class="form-control" id="setorFuncionario" name="setores[][setores_id]" multiple="multiple">

                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}">{{$setor->nome}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group {{$errors->has('funcao') ? "has-error":""}} col-sm-6">
            {!! Form::label('funcao', 'Função do funcionário:') !!}
            <select class="form-control" id="funcaoFuncionario" name="funcoes[][funcoes_id]" multiple="multiple">

            @foreach($funcoes as $funcao)
                <option value="{{ $funcao->id }}">{{$funcao->nome}}</option>
            @endforeach
            </select>
        </div>



        <!-- Datanascimento Field -->
        <div class="form-group {{$errors->has('data_admissao') ? "has-error":""}} col-sm-6">
            {!! Form::label('data_admissao', 'Data admissão:') !!}
            {!! Form::text('data_admissao', !empty($pessoa)? $pessoa->data_admissao:null, ['class' => 'form-control', 'format' => 'dd/MM/yyyy']) !!}
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

</div>


<div class="form-group {{$errors->has('endereco') ? "has-error":""}} col-sm-12">
    {!! Form::label('endereco', 'Endereço:') !!}
</div>
<!-- Endereço -->
<div class="form-group col-sm-12">


    {{ Form::hidden('enderecos[id]', !empty($pessoa)? count($pessoa->endereco) != 0 ? $pessoa->endereco[0]->id:null:null) }}

    <div class="form-group {{$errors->has('enderecos.cep') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[cep]', !empty($pessoa)? count($pessoa->endereco) != 0 ? $pessoa->endereco[0]->cep:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'CEP', 'id' => 'cep', 'required'=>'required']) !!}
    </div>

    <div class="form-group {{$errors->has('enderecos.rua') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[rua]',!empty($pessoa)?  count($pessoa->endereco) != 0 ? $pessoa->endereco[0]->rua:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Rua', 'id' => 'rua']) !!}
    </div>

    <div class="form-group {{$errors->has('enderecos.numero') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[numero]', !empty($pessoa)? count($pessoa->endereco) != 0 ?  $pessoa->endereco[0]->numero:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Numero', 'id' => 'numero', 'required'=>'required']) !!}
    </div>

    <div class="form-group {{$errors->has('enderecos.cidade') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[cidade]', !empty($pessoa)? count($pessoa->endereco) != 0 ? $pessoa->endereco[0]->cidade:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Cidade', 'id' => 'cidade']) !!}
    </div>

    <div class="form-group {{$errors->has('enderecos.complemento') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[complemento]', !empty($pessoa)? count($pessoa->endereco) != 0 ? $pessoa->endereco[0]->complemento:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Complemento', 'id' => 'complemento']) !!}
    </div>

    <div class="form-group {{$errors->has('enderecos.bairro') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[bairro]',!empty($pessoa)?  count($pessoa->endereco) != 0 ? $pessoa->endereco[0]->bairro:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Bairro', 'id' => 'bairro']) !!}
    </div>

    <div class="form-group {{$errors->has('enderecos.estado') ? "has-error":""}} col-sm-6">
        {{--        {!! Form::text('enderecos[estado]', !empty($pessoa)? count($pessoa->endereco) != 0? $pessoa->endereco[0]->estado:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Estado', 'id' => 'estado']) !!}--}}

        {!! Form::select('enderecos[estado]', array('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO',), null, ['class' => 'form-control','required'=>'required', 'id'=> 'estado']) !!}


    </div>

    <div class="form-group {{$errors->has('enderecos.pais') ? "has-error":""}} col-sm-6">
        {!! Form::text('enderecos[pais]',!empty($pessoa)?  count($pessoa->endereco) != 0? $pessoa->endereco[0]->pais:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Pais', 'id' => 'pais']) !!}
    </div>

</div>