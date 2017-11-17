<!-- Nome Field -->
<div class="form-group {{$errors->has('nome') ? "has-error":""}} col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Cpf Cnpj Field -->
<div class="form-group {{$errors->has('cpf_cnpj') ? "has-error":""}} col-sm-6">
    {!! Form::label('cpf_cnpj', 'CPF:') !!}
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
    {!! Form::date('dataNascimento', !empty($pessoa)? $pessoa->dataNascimento:null, ['class' => 'form-control','required'=>'required', 'format' => 'dd/MM/yyyy']) !!}
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

<!-- Tipo Pessoas Id Field -->
<div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoa:') !!}
    {!! Form::select('tipo_pessoas_id', $tipoPessoas, !empty($pessoa)? $pessoa->tipo_pessoa_id:2, ['class' => 'form-control','required'=>'required']) !!}
</div>


<!-- Razaosocial Field -->
{{--<div class="form-group {{$errors->has('razaoSocial') ? "has-error":""}} col-sm-6">--}}
{{--{!! Form::label('razaoSocial', 'Razão social:') !!}--}}
{{--{!! Form::text('razaoSocial', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Nomefantasia Field -->
{{--<div class="form-group {{$errors->has('nomeFantasia') ? "has-error":""}} col-sm-6">--}}
{{--{!! Form::label('nomeFantasia', 'Nome fantasia:') !!}--}}
{{--{!! Form::text('nomeFantasia', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Inscricaoestadual Field -->
{{--<div class="form-group {{$errors->has('inscricaoEstadual') ? "has-error":""}} col-sm-6">--}}
{{--{!! Form::label('inscricaoEstadual', 'Inscrição estadual:') !!}--}}
{{--{!! Form::text('inscricaoEstadual', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Status Field -->
<div class="form-group {{$errors->has('status') ? "has-error":""}} col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null,['required'=>'required', 'checked' => 'checked']) !!} Ativo
    </label>
</div>

<!-- Sexo Field -->
<div class="form-group {{$errors->has('sexo') ? "has-error":""}} col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    <label class="checkbox-inline">
        {!! Form::select('sexo', $generos, !empty($pessoa)? $pessoa->sexo:null, ['class' => 'form-control','required'=>'required']) !!}
    </label>
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