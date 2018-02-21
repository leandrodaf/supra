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
    {!! Form::label('nome_aluno', 'Nome completo:') !!}
    {!! Form::text('nome_aluno', null, ['class' => 'form-control', 'required'=>'required']) !!}
</div>

<!-- Nome Aluno Field -->


<!-- Rg Aluno Field -->
<div class="form-group  {{$errors->has('rg_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('rg_aluno', 'Rg Aluno:') !!}
    {!! Form::text('rg_aluno', null, ['class' => 'form-control', 'required'=>'required']) !!}
</div>

<!-- Datanascimento Field -->
<div class="form-group {{$errors->has('data_nascimento_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('data_nascimento_aluno', 'Data de nascimento:') !!}
    {!! Form::text('data_nascimento_aluno', !empty($alunos) ? $alunos->data_nascimento_aluno->format('d/m/Y') : null, ['class' => 'form-control', 'required' => 'required']) !!}

</div>

<!-- Sexo Aluno Field -->
<div class="form-group {{$errors->has('sexo_aluno') ? "has-error":""}} col-sm-6">
    {!! Form::label('sexo_aluno', 'Sexo:') !!}
    {!! Form::select('sexo_aluno', $genders, !empty($alunos)? $alunos->sexo_aluno:null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Pessoas Id Field -->
<div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6" style="display: none">
    {!! Form::label('tipo_pessoas_id', 'Tipo:') !!}
    {!! Form::select('tipo_pessoas_id', $tipoPessoas, !empty($alunos) ?$alunos->tipo_pessoas:1, ['class' => 'form-control']) !!}
</div>


<div class="form-group {{$errors->has('email') ? "has-error":""}} col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <select id="email" name="email[][email]" multiple="multiple"></select>

    @if(!empty($alunos) )
        <p></p>
        @if(count($alunos->email) != 0)
            {!! Form::label('email', 'E-mails cadastrados:') !!}
        @endif

        <dl class="dl-horizontal">
            <p></p>
            <!-- lista de emails -->
            @foreach($alunos->email->toArray() as $email)
                <dt>


                    <a href="#deletar-email-{{$alunos['id']}}"
                       class="btn btn-default btn-flat {{count($alunos->email->toArray()) >1 && $email['pivot']['flg_principal'] != 1 ?"":"disabled" }}"
                       onclick="document.getElementById({!! "'#deletar-email-".$email['id']."'" !!}).submit();" {{count($alunos->email->toArray()) >1 ?"":"disabled" }}>

                        <i class="glyphicon glyphicon-trash"></i>

                    </a>
                    {{--onclick="document.getElementById({!! "'#emailMain-".$email['id']."'" !!}).submit();--}}

                </dt>
                <dd>
                    <a class="listEmail" href="#mainEmail"
                       {{count($alunos->email->toArray()) >1 && $email['pivot']['flg_principal'] != 1 ?'':'data-toggle="tooltip"' }} id="{{$alunos->id.'-'.$email['id']}}"
                       title="{{$email['pivot']['flg_principal'] != 0 ? "E-mail principal": "Tornar o e-mail principal"}}">{{$email['email']}}</a>
                    <span class="label label-info">{{$email['pivot']['flg_principal'] == 1 ? "Principal":""}}</span>
                </dd>
            @endforeach
        </dl>
    @endif
</div>


<div class="form-group {{$errors->has('phone') ? "has-error":""}} col-sm-6">
    {!! Form::label('phone', 'Telefone:') !!}
    <select id="telefoneAluno" name="phone[][number]" multiple="multiple"></select>

    @if(!empty($alunos) )
        <p></p>
        @if(count($alunos->phone) != 0)
            {!! Form::label('phone', 'Telefones cadastrados:') !!}
        @endif
        <dl class="dl-horizontal">
            <p></p>
            <!-- lista de phones -->

            @foreach($alunos->phone->toArray() as $phone)
                <dt>

                    <a href="#deletar-phone-{{$alunos['id']}}"
                       class="btn btn-default btn-flat {{count($alunos->phone->toArray()) >1 && $phone['pivot']['flg_principal'] != 1 ?"":"disabled" }}"
                       onclick="document.getElementById({!! "'#deletar-phone-".$phone['id']."'" !!}).submit();" {{count($alunos->phone->toArray()) >1 ?"":"disabled" }}>

                        <i class="glyphicon glyphicon-trash"></i>

                    </a>

                </dt>
                <dd>
                    <a class="listphone" href="#mainphone"
                       {{count($alunos->phone->toArray()) >1 && $phone['pivot']['flg_principal'] != 1 ?'':'data-toggle="tooltip"' }} id="{{$alunos->id.'-'.$phone['id']}}"
                       title="{{$phone['pivot']['flg_principal'] != 0 ? "Telefone principal": "Tornar o Telefone principal"}}">{{$phone['number']}}</a>
                    <span class="label label-info">{{$phone['pivot']['flg_principal'] == 1 ? "Principal":""}}</span>
                </dd>
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
            <label class="checkbox-inline">{!! Form::radio('flg_certidao_nascimento_aluno', '1', true) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_certidao_nascimento_aluno', '0') !!} Não</label>
        </label>
    </div>
    {{--{{!empty($alunos) ? $alunos->flg_irmaos_aluno ? true:false:false}}--}}
</div>

<!-- Flg Carteira Vacinacao Aluno Field -->
<div class="form-group {{$errors->has('flg_carteira_vacinacao_aluno') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_carteira_vacinacao_aluno', 'Apresentou carteira de vacinação:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('flg_carteira_vacinacao_aluno', '1') !!} Sim</label>
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
            <label class="checkbox-inline">{!! Form::radio('flg_frequentou_escola_aluno', '1') !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_frequentou_escola_aluno', '0', true) !!} Não</label>
        </label>
    </div>
</div>

<!-- Flg Irmaos Aluno Field -->
<div class="form-group {{$errors->has('flg_irmaos_aluno') ? "has-error":""}} col-sm-12">

    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_irmaos_alunoLabel', 'Possui irmãos:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">


{{--            {{dd(!empty($aluno) ? $alunos->flg_irmaos_aluno ? true:false:false)}}--}}

            <label class="checkbox-inline">{!! Form::radio('flg_irmaos_aluno', '1') !!} Sim</label>
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
            <label class="checkbox-inline">{!! Form::radio('flg_juntos_aos_pais_aluno', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_juntos_aos_pais_aluno', '0', true) !!} Não</label>
        </label>
    </div>

</div>

