
    <li class="{{ Request::is('pessoas*') ? 'active' : '' }}">
        <a href="{!! route('pessoas.index') !!}"><i class="fa fa-users"></i><span>Pessoas</span></a>
    </li>

    <li class="{{ Request::is('alunos*') ? 'active' : '' }}">
        <a href="{!! route('alunos.index') !!}"><i class="fa fa-child"></i><span>Alunos</span></a>
    </li>



    @if(Auth::user()->hasRole('admin'))
        <li class="{{ Request::is('user/management*') ? 'active' : '' }}">
            <a href="{!! route('management.index') !!}"><i class="fa fa-gears"></i><span>Gerenciar Usuários</span></a>
        </li>
    @endif


