<div class="row">
    <div class="col-lg-6">

        <!-- Nome Aluno Field -->
        <div class="form-group">
                {!! Form::label('nome_aluno', 'Nome Aluno:') !!}
            <p>{!! $alunos->nome_aluno !!}</p>
        </div>



        <!-- Rg Aluno Field -->
        <div class="form-group">
            {!! Form::label('rg_aluno', 'Rg Aluno:') !!}
            <p>{!! $alunos->rg_aluno !!}</p>
        </div>
        <!-- Data Nascimento Aluno Field -->
        <div class="form-group">
            {!! Form::label('data_nascimento_aluno', 'Data Nascimento Aluno:') !!}
            <p>{!! $alunos->data_nascimento_aluno !!}</p>
        </div>

        <!-- Tipo Pessoas Id Field -->
        <div class="form-group">
            {!! Form::label('tipo_pessoas_id', 'Tipo Pessoas Id:') !!}
            <p>{!! $alunos->tipo_pessoas_id !!}</p>
        </div>

        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{!! $alunos->created_at !!}</p>
        </div>


        <!-- Deleted At Field -->
        <div class="form-group">
            {!! Form::label('deleted_at', 'Deleted At:') !!}
            <p>{!! $alunos->deleted_at !!}</p>
        </div>

    </div>
    <div class="col-lg-6">
        <!-- Sexo Aluno Field -->
        <div class="form-group">
            {!! Form::label('sexo_aluno', 'Sexo Aluno:') !!}
            <p>{!! $alunos->sexo_aluno !!}</p>
        </div>

        <!-- Flg Certidao Nascimento Aluno Field -->
        <div class="form-group">
            {!! Form::label('flg_certidao_nascimento_aluno', 'Flg Certidao Nascimento Aluno:') !!}
            <p>{!! $alunos->flg_certidao_nascimento_aluno !!}</p>
        </div>

        <!-- Flg Carteira Vacinacao Aluno Field -->
        <div class="form-group">
            {!! Form::label('flg_carteira_vacinacao_aluno', 'Flg Carteira Vacinacao Aluno:') !!}
            <p>{!! $alunos->flg_carteira_vacinacao_aluno !!}</p>
        </div>

        <!-- Flg Frequentou Escola Aluno Field -->
        <div class="form-group">
            {!! Form::label('flg_frequentou_escola_aluno', 'Flg Frequentou Escola Aluno:') !!}
            <p>{!! $alunos->flg_frequentou_escola_aluno !!}</p>

        </div>

        <!-- Flg Irmaos Aluno Field -->
        <div class="form-group">
            {!! Form::label('flg_irmaos_aluno', 'Flg Irmaos Aluno:') !!}
            <p>{!! $alunos->flg_irmaos_aluno !!}</p>
        </div>

        <!-- Flg Juntos Aos Pais Aluno Field -->
        <div class="form-group">
            {!! Form::label('flg_juntos_aos_pais_aluno', 'Flg Juntos Aos Pais Aluno:') !!}
            <p>{!! $alunos->flg_juntos_aos_pais_aluno !!}</p>
        </div>

        <!-- Qtd Irmaos Aluno Field -->
        <div class="form-group">
            {!! Form::label('qtd_irmaos_aluno', 'Qtd Irmaos Aluno:') !!}
            <p>{!! $alunos->qtd_irmaos_aluno !!}</p>

        </div>

        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{!! $alunos->updated_at !!}</p>
        </div>
    </div>

</div>

