<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Funcionalidades<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        @if(Auth::user()->hasRole('secretaria') || Auth::user()->hasRole('admin'))
            <li class="{{ Request::is('pessoas*') ? 'active' : '' }}">
                <a href="{!! route('pessoas.index') !!}"><i class="fa fa-users"></i><span>Pessoas</span></a>
            </li>

            <li class="{{ Request::is('alunos*') ? 'active' : '' }}">
                <a href="{!! route('alunos.index') !!}"><i class="fa fa-child"></i><span>Alunos</span></a>
            </li>

            <li class="{{ Request::is('class') || Request::is('class/*')? 'active' : '' }}">
                <a href="{!! route('class.index') !!}"><i class="fa fa-graduation-cap"></i><span>Gerenciar Turmas</span></a>
            </li>

            <li class="{{ Request::is('file*') ? 'active' : '' }}">
                <a href="{!! route('file.index') !!}"><i class="fa fa-folder-open"></i><span>Arquivos</span></a>
            </li>
        @endif

        @if(Auth::user()->hasRole('admin'))
            <li class="divider"></li>
            <li class="{{ Request::is('management*') ? 'active' : '' }}">
                <a href="{!! route('management.index') !!}"><i
                            class="fa fa-gears"></i><span>Gerenciar Usuários</span></a>
            </li>
        @endif
    </ul>
</li>
