<li class="{{ Request::is('pessoas*') ? 'active' : '' }}">
    <a href="{!! route('pessoas.index') !!}"><i class="fa fa-edit"></i><span>Pessoas</span></a>
</li>
<li class="{{ Request::is('alunos*') ? 'active' : '' }}">
    <a href="{!! route('alunos.index') !!}"><i class="fa fa-edit"></i><span>Alunos</span></a>
</li>

<li class="{{ Request::is('salas*') ? 'active' : '' }}">
    <a href="{!! route('salas.index') !!}"><i class="fa fa-edit"></i><span>Salas</span></a>
</li>

<li class="{{ Request::is('schoolSubjectRepositorys*') ? 'active' : '' }}">
    <a href="{!! route('schoolsubject.index') !!}"><i class="fa fa-edit"></i><span>Materias</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Funções</span></a>
</li>

<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{!! route('departments.index') !!}"><i class="fa fa-edit"></i><span>Departmentes</span></a>
</li>

