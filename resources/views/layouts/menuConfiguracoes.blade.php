@if(Auth::user()->hasRole('secretaria') || Auth::user()->hasRole('admin'))
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Configurações<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">

            <li class="{{ Request::is('classrooms*') ? 'active' : '' }}">
                <a href="{!! route('classrooms.index') !!}"><i class="fa fa-caret-right"></i><span>Salas</span></a>
            </li>

            <li class="{{ Request::is('schoolsubject*') ? 'active' : '' }}">
                <a href="{!! route('schoolsubject.index') !!}"><i
                            class="fa fa-caret-right"></i><span>Matérias</span></a>
            </li>

            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{!! route('roles.index') !!}"><i class="fa fa-caret-right"></i><span>Funções</span></a>
            </li>

            <li class="{{ Request::is('departments*') ? 'active' : '' }}">
                <a href="{!! route('departments.index') !!}"><i class="fa fa-caret-right"></i><span>Departamentos</span></a>
            </li>

        <li class="divider"></li>
    </ul>
</li>
@endif