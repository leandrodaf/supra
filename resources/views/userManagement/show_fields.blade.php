<dl class="dl-horizontal">

    @if(!empty($user->name))
        <!-- Name Field -->
        <dt>{!! Form::label('name', 'Nome') !!}</dt>
        <dd>{!! $user->name !!}</dd>
    @endif

    @if(!empty($user->email))
        <!-- email Field -->
        <dt>{!! Form::label('email', 'E-mail:') !!}</dt>
        <dd>{!! $user->email !!}</dd>
    @endif

    @if(!empty($user->pessoa))
        <!-- Pessoa Field -->
        <dt>{!! Form::label('pessoa', 'Pessoa Atribuida:') !!}</dt>
        <dd>{!! $user->pessoa->nome !!}</dd>
    @endif

    @if(!empty($user->getRoleNames()))
        <!-- Pessoa Field -->
            <dt>{!! Form::label('role', 'Regras:') !!}</dt>
            <dd>@foreach($user->getRoleNames() as $role)
                {{$role . ', '}}
                @endforeach
            </dd>
        @endif
</dl>