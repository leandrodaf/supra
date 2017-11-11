<!-- Nome Field -->
<div class="form-group {{$errors->has('nome') ? "has-error":""}} col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Cpf Cnpj Field -->
<div class="form-group {{$errors->has('cpf_cnpj') ? "has-error":""}} col-sm-6">
    {!! Form::label('cpf_cnpj', 'CPF/CNPJ:') !!}
    {!! Form::text('cpf_cnpj', null, ['class' => 'form-control','required'=>'required']) !!}
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
    {!! Form::select('nacionalidade', $nacionalidades, !empty($pessoa)? $pessoa->nacionalidade:null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Tipo Pessoas Id Field -->
<div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoa:') !!}
    {!! Form::select('tipo_pessoas_id', $tipoPessoas, !empty($pessoa)? $pessoa->tipo_pessoa_id:null, ['class' => 'form-control','required'=>'required']) !!}
</div>


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
    {!! Form::label('inscricaoEstadual', 'Inscricaoestadual:') !!}
    {!! Form::text('inscricaoEstadual', null, ['class' => 'form-control']) !!}
</div>


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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pessoas.index') !!}" class="btn btn-default">Cancel</a>
</div>


