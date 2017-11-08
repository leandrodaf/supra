{{ Form::hidden('id', null) }}


<!-- Foto Aluno Field -->
<div class="form-group {{$errors->has('foto_aluno') ? "has-error":""}} col-sm-12">

    @if(!empty($alunos))
        <img src="{{asset('uploads/avatars/'.$alunos->foto_aluno)}}"
             class="avatar img-radius pull-left"
             style="margin-right: 25px; width: 100px; border-radius: 4px">
    @endif
    {!! Form::label('foto_aluno', 'Foto Aluno:') !!}
    {!! Form::file('foto_aluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Aluno Field -->
<div class="form-group {{$errors->has('nome_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('nome_aluno', 'Nome Aluno:') !!}
    {!! Form::text('nome_aluno', null, ['class' => 'form-control', 'required'=>'required']) !!}
</div>

<!-- Nome Aluno Field -->


<!-- Rg Aluno Field -->
<div class="form-group  {{$errors->has('rg_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('rg_aluno', 'Rg Aluno:') !!}
    {!! Form::text('rg_aluno', null, ['class' => 'form-control', 'required'=>'required']) !!}
</div>

<!-- Data Nascimento Aluno Field -->
<div class="form-group {{$errors->has('data_nascimento_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('data_nascimento_aluno', 'Data Nascimento Aluno:') !!}
    {!! Form::text('data_nascimento_aluno', null, ['class' => 'form-control', 'required'=>'required', 'data-date-format' => 'mm/dd/yyyy']) !!}
</div>

<!-- Sexo Aluno Field -->
<div class="form-group {{$errors->has('sexo_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('sexo_aluno', 'Sexo Aluano:') !!}
    {!! Form::select('sexo_aluno', $generos, !empty($alunos)? $alunos->sexo_aluno:null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Pessoas Id Field -->
<div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6">
    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoas:') !!}
    {!! Form::select('tipo_pessoas_id', $tipo_pessoas, !empty($alunos) ?$alunos->tipo_pessoas:null, ['class' => 'form-control']) !!}
</div>


<div class="form-group {{$errors->has('email') ? "has-error":""}} col-sm-5">
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


                    <a href="#deletar-{{$email['id']}}" class="btn btn-default btn-flat"
                       onclick="document.getElementById({!! "'#deletar-".$email['id']."'" !!}).submit();" {{count($alunos->email->toArray()) >1 ?"":"disabled" }}>
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </dt>
                <dd>{{$email['email']}}</dd>
            @endforeach
        </dl>
    @endif
</div>

<!-- Flg Certidao Nascimento Aluno Field -->
<div class="form-group {{$errors->has('flg_certidao_nascimento_aluno') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_certidao_nascimento_aluno', 'Apresentou certidao de nascimento:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            {!! Form::hidden('flg_certidao_nascimento_aluno', false) !!}
            <label class="checkbox-inline">{!! Form::radio('flg_certidao_nascimento_aluno', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_certidao_nascimento_aluno', '0', true) !!} Não</label>
        </label>
    </div>

</div>

<!-- Flg Carteira Vacinacao Aluno Field -->
<div class="form-group {{$errors->has('flg_carteira_vacinacao_aluno') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_carteira_vacinacao_aluno', 'Apresentou carteira de vacinacaox:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            {!! Form::hidden('flg_carteira_vacinacao_aluno', false) !!}
            <label class="checkbox-inline">{!! Form::radio('flg_carteira_vacinacao_aluno', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_carteira_vacinacao_aluno', '0', true) !!} Não</label>
        </label>
    </div>

</div>

<!-- Flg Frequentou Escola Aluno Field -->
<div class="form-group {{$errors->has('flg_frequentou_escola_aluno') ? "has-error":""}} col-sm-12">

    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_frequentou_escola_aluno', 'Frequentou outra escola:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            {!! Form::hidden('flg_frequentou_escola_aluno', false) !!}
            <label class="checkbox-inline">{!! Form::radio('flg_frequentou_escola_aluno', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_frequentou_escola_aluno', '0', true) !!} Não</label>
        </label>
    </div>
</div>

<!-- Flg Irmaos Aluno Field -->
<div class="form-group {{$errors->has('flg_irmaos_aluno') ? "has-error":""}} col-sm-12">

    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_irmaos_aluno', 'Possui irmãos:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            {!! Form::hidden('flg_irmaos_aluno', false) !!}
            <label class="checkbox-inline">{!! Form::radio('flg_irmaos_aluno', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_irmaos_aluno', '0', true) !!} Não</label>
        </label>
    </div>
</div>

<!-- Qtd Irmaos Aluno Field -->
<div id="qtdAlunos"
     class="form-group {{$errors->has('qtd_irmaos_aluno') ? "has-error":""}} col-sm-12" {{ !empty($alunos) ? $alunos->flg_irmaos_aluno ? "":"hidden":"hidden" }}>

    <div class="col-sm-2 -align-left">
        {!! Form::number('qtd_irmaos_aluno', null, ['class' => 'form-control', 'placeholder' => 'Qtd. de irmãos']) !!}
    </div>

</div>

<!-- Flg Juntos Aos Pais Aluno Field -->
<div class="form-group {{$errors->has('flg_juntos_aos_pais_aluno') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_juntos_aos_pais_aluno', 'Mora junto aos pais:') !!}

    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            {!! Form::hidden('flg_juntos_aos_pais_aluno', false) !!}
            <label class="checkbox-inline">{!! Form::radio('flg_juntos_aos_pais_aluno', '1', true) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_juntos_aos_pais_aluno', '0', true) !!} Não</label>
        </label>
    </div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(!empty($alunos) ? 'Atualizar aluno':'Criar aluno', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alunos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
