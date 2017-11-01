<!-- Nome Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_aluno', 'Nome Aluno:') !!}
    {!! Form::text('nome_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_aluno', 'Foto Aluno:') !!}
    {!! Form::text('foto_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Rg Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rg_aluno', 'Rg Aluno:') !!}
    {!! Form::text('rg_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo_aluno', 'Sexo Aluno:') !!}
    {!! Form::text('sexo_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Flg Certidao Nascimento Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flg_certidao_nascimento_aluno', 'Flg Certidao Nascimento Aluno:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('flg_certidao_nascimento_aluno', false) !!}
        {!! Form::checkbox('flg_certidao_nascimento_aluno', '1', null) !!} 1
    </label>
</div>

<!-- Flg Carteira Vacinacao Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flg_carteira_vacinacao_aluno', 'Flg Carteira Vacinacao Aluno:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('flg_carteira_vacinacao_aluno', false) !!}
        {!! Form::checkbox('flg_carteira_vacinacao_aluno', '1', null) !!} 1
    </label>
</div>

<!-- Flg Frequentou Escola Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flg_frequentou_escola_aluno', 'Flg Frequentou Escola Aluno:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('flg_frequentou_escola_aluno', false) !!}
        {!! Form::checkbox('flg_frequentou_escola_aluno', '1', null) !!} 1
    </label>
</div>

<!-- Flg Irmaos Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flg_irmaos_aluno', 'Flg Irmaos Aluno:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('flg_irmaos_aluno', false) !!}
        {!! Form::checkbox('flg_irmaos_aluno', '1', null) !!} 1
    </label>
</div>

<!-- Flg Juntos Aos Pais Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flg_juntos_aos_pais_aluno', 'Flg Juntos Aos Pais Aluno:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('flg_juntos_aos_pais_aluno', false) !!}
        {!! Form::checkbox('flg_juntos_aos_pais_aluno', '1', null) !!} 1
    </label>
</div>

<!-- Qtd Irmaos Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtd_irmaos_aluno', 'Qtd Irmaos Aluno:') !!}
    {!! Form::number('qtd_irmaos_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Nascimento Aluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_nascimento_aluno', 'Data Nascimento Aluno:') !!}
    {!! Form::date('data_nascimento_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Pessoas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoas Id:') !!}
    {!! Form::number('tipo_pessoas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alunos.index') !!}" class="btn btn-default">Cancel</a>
</div>
