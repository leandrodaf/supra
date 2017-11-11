<div class="row">
    <div class="col-lg-6">

        <dl class="dl-horizontal">
            <!-- Nome Aluno Field -->
            <dt>{!! Form::label('nome_aluno', 'Nome Aluno:') !!}</dt>
            <dd>{!! $alunos->nome_aluno !!}</dd>

            <!-- Rg Aluno Field -->
            <dt> {!! Form::label('rg_aluno', 'RG:') !!}</dt>
            <dd> {!! $alunos->rg_aluno !!}</dd>

            <!-- Data Nascimento Aluno Field -->
            <dt> {!! Form::label('data_nascimento_aluno', 'Data nascimento:') !!}</dt>
            <dd> {!! \Carbon\Carbon::parse($alunos->data_nascimento_aluno)->format('d/m/Y') !!}</dd>

            <!-- Tipo Pessoas Id Field -->
            <dt> {!! Form::label('tipo_pessoas_id', 'Tipo:') !!}</dt>
            <dd> {!! $alunos->tipoPessoa->nome !!}</dd>

            <!-- Tipo Pessoas Id Field -->
            <dt> {!! Form::label('email', count($alunos->email) > 1 ?'E-mails:':'E-mail') !!}</dt>

            @foreach($alunos->email as $email)
                <dd> {{$email->email}} <span class="label label-info">{{$email['pivot']->flg_principal ? "P":""}}</span></dd>
            @endforeach

            <!-- Created At Field -->
            <dt> {!! Form::label('created_at', 'Criado em:') !!} </dt>
            <dd> {!! \Carbon\Carbon::parse($alunos->created_at)->format('d/m/Y') !!}</dd>

            @if(!empty($alunos->deleted_at))
                    <!-- Deleted At Field -->
                    <dt> {!! Form::label('deleted_at', 'Deletado em:') !!} </dt>
                    <dd>{!! \Carbon\Carbon::parse($alunos->deleted_at)->format('d/m/Y') !!} </dd>
            @endif
            <!-- Sexo Aluno Field -->
            <dt> {!! Form::label('sexo_aluno', 'Sexo Aluno:') !!} </dt>
            <dd> {!! $alunos->genero->nome !!}</dd>

            <!-- Flg Certidao Nascimento Aluno Field -->
            <dt> {!! Form::label('flg_certidao_nascimento_aluno', 'Certidão de nascimento:') !!} </dt>
            <dd> {!! $alunos->flg_certidao_nascimento_aluno ? "Apresentou": "Não"!!}</dd>

            <!-- Flg Carteira Vacinacao Aluno Field -->

            <dt> {!! Form::label('flg_carteira_vacinacao_aluno', 'Carteira de vacinação:') !!} </dt>
            <dd> {!! $alunos->flg_carteira_vacinacao_aluno ? "Apresentou": "Não"!!}</dd>

            <!-- Flg Frequentou Escola Aluno Field -->

            <dt> {!! Form::label('flg_frequentou_escola_aluno', 'Freq. outras escola:') !!} </dt>
            <dd>{!! $alunos->flg_frequentou_escola_aluno ? "Sim": "Não"!!} </dd>

            <!-- Flg Irmaos Aluno Field -->
            <dt> {!! Form::label('flg_irmaos_aluno', 'Possui irmãos:') !!} </dt>
            <dd>{!! $alunos->flg_irmaos_aluno ? "Sim": "Não"!!} </dd>

            @if($alunos->flg_irmaos_aluno || $alunos->qtd_irmaos_aluno != 0)
                <!-- Qtd Irmaos Aluno Field -->
                    <dt> {!! Form::label('qtd_irmaos_aluno', 'Irmãos:') !!} </dt>
                    <dd> {!! $alunos->qtd_irmaos_aluno !!}</dd>
            @endif

            <!-- Flg Juntos Aos Pais Aluno Field -->
            <dt> {!! Form::label('flg_juntos_aos_pais_aluno', 'Mora com os pais:') !!} </dt>
            <dd>{!! $alunos->flg_juntos_aos_pais_aluno ? "Sim": "Não"!!} </dd>

            <!-- Updated At Field -->
            <dt> {!! Form::label('updated_at', 'Ultima atualização:') !!} </dt>
            <dd>{!! $alunos->updated_at->format('d/m/Y')  !!} </dd>
        </dl>


    </div>


</div>

