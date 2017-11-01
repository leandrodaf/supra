<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpf Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf_cnpj', 'Cpf Cnpj:') !!}
    {!! Form::text('cpf_cnpj', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('sexo', false) !!}
        {!! Form::checkbox('sexo', '1', null) !!} 1
    </label>
</div>

<!-- Rg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rg', 'Rg:') !!}
    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
</div>

<!-- Datanascimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dataNascimento', 'Datanascimento:') !!}
    {!! Form::date('dataNascimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocivil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivil', 'Estadocivil:') !!}
    {!! Form::text('estadoCivil', null, ['class' => 'form-control']) !!}
</div>

<!-- Razaosocial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razaoSocial', 'Razaosocial:') !!}
    {!! Form::text('razaoSocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomefantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomeFantasia', 'Nomefantasia:') !!}
    {!! Form::text('nomeFantasia', null, ['class' => 'form-control']) !!}
</div>

<!-- Inscricaoestadual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inscricaoEstadual', 'Inscricaoestadual:') !!}
    {!! Form::text('inscricaoEstadual', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacionalidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacionalidade', 'Nacionalidade:') !!}
    {!! Form::text('nacionalidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Tipo Pessoas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoas Id:') !!}
    {!! Form::number('tipo_pessoas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pessoas.index') !!}" class="btn btn-default">Cancel</a>
</div>
