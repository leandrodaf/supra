

<li class="{{ Request::is('salas*') ? 'active' : '' }}">
    <a href="{!! route('classrooms.index') !!}"><i class="fa fa-edit"></i><span>Salas</span></a>
</li>

<li class="{{ Request::is('schoolSubjectRepositorys*') ? 'active' : '' }}">
    <a href="{!! route('schoolsubject.index') !!}"><i class="fa fa-edit"></i><span>Materias</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Funções</span></a>
</li>

<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{!! route('departments.index') !!}"><i class="fa fa-edit"></i><span>Departamentos</span></a>
</li>

