<dl class="dl-horizontal">

    @if(!empty($pessoa->id))
    <!-- Id Field -->
    <dt>{!! Form::label('id', 'Id:') !!}</dt>
    <dd>{!! $pessoa->id !!}</dd>
    @endif

    @if(!empty($pessoa->nome))
    <!-- Nome Field -->
    <dt>{!! Form::label('nome', 'Nome:') !!}</dt>
    <dd>{!! $pessoa->nome !!}</dd>
    @endif

    @if(!empty($pessoa->cpf_cnpj))
    <!-- Cpf Cnpj Field -->
    <dt>{!! Form::label('cpf_cnpj', strlen($pessoa->cpf_cnpj) != 14 ? "CNPJ":"CPF") !!}</dt>
    <dd>{!! $pessoa->cpf_cnpj !!}</dd>
    @endif

    @if(!empty($pessoa->gender->nome))
    <!-- Sexo Field -->
    <dt>{!! Form::label('sexo', 'Sexo:') !!}</dt>
    <dd>{!! $pessoa->gender->nome !!}</dd>
    @endif



    @if(!empty($pessoa->rg))
    <!-- Rg Field -->
    <dt>{!! Form::label('rg', 'RG:') !!}</dt>
    <dd>{!! $pessoa->rg !!}</dd>
    @endif

    @if(!empty($pessoa->dataNascimento))
    <!-- Datanascimento Field -->
    <dt>{!! Form::label('dataNascimento', 'Nascimento:') !!}</dt>
    <dd>{!! $pessoa->dataNascimento !!}</dd>
    @endif

    @if(!empty($pessoa->getFamilySituation->nome))
    <!-- familySituation Field -->
    <dt>{!! Form::label('familySituation', 'Estado Civil:') !!}</dt>
    <dd>{!! $pessoa->getFamilySituation->nome !!}</dd>
    @endif

    @if(!empty($pessoa->razaoSocial))
    <!-- Razaosocial Field -->
    <dt>{!! Form::label('razaoSocial', 'Razao Social:') !!}</dt>
    <dd>{!! $pessoa->razaoSocial !!}</dd>
    @endif

    @if(!empty($pessoa->nomeFantasia))
    <!-- Nomefantasia Field -->
    <dt>{!! Form::label('nomeFantasia', 'Nome Fantasia:') !!}</dt>
    <dd>{!! $pessoa->nomeFantasia !!}</dd>
    @endif

    @if(!empty($pessoa->inscricaoEstadual))
    <!-- Inscricaoestadual Field -->
    <dt>{!! Form::label('inscricaoEstadual', 'Inscricao Estadual:') !!}</dt>
    <dd>{!! $pessoa->inscricaoEstadual !!}</dd>
    @endif

    @if(!empty($pessoa->getCitizenship->nome))
    <!-- Citizenship Field -->
    <dt>{!! Form::label('citizenship', 'Nacionalidade:') !!}</dt>
    <dd>{!! $pessoa->getCitizenship->nome !!}</dd>
    @endif

    @if(!empty($pessoa->status))
    <!-- Status Field -->
    <dt>{!! Form::label('status', 'Status:') !!}</dt>
    <dd>{!! $pessoa->status ? "Ativo":"Inativo"!!}</dd>
    @endif

    @if(!empty($pessoa->tipoPessoa->nome))
        <!-- Tipo Pessoas Id Field -->
    <dt>{!! Form::label('tipo_pessoas_id', 'Tipo Pessoa:') !!}</dt>
    <dd>{!! $pessoa->tipoPessoa->nome !!}</dd>
    @endif

    @if(!empty($pessoa->created_at))
    <!-- Created At Field -->
    <dt>{!! Form::label('created_at', 'Criando em:') !!}</dt>
    <dd>{!! $pessoa->created_at->format('d/m/Y') !!}</dd>
    @endif

    @if(!empty($pessoa->updated_at))
    <!-- Updated At Field -->
    <dt>{!! Form::label('updated_at', 'Atualizado em:') !!}</dt>
    <dd>{!! $pessoa->updated_at !!}</dd>
    @endif

    @if(!empty($pessoa->deleted_at))
    <!-- Deleted At Field -->
        <dt>{!! Form::label('deleted_at', 'Deletado em:') !!}</dt>
        <dd>{!! $pessoa->deleted_at !!}</dd>
    @endif
</dl>