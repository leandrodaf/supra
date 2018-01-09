<li class="{{ Request::is('pessoas*') ? 'active' : '' }}">
    <a href="{!! route('pessoas.index') !!}"><i class="fa fa-edit"></i><span>Pessoas</span></a>
</li>
<li class="{{ Request::is('alunos*') ? 'active' : '' }}">
    <a href="{!! route('alunos.index') !!}"><i class="fa fa-edit"></i><span>Alunos</span></a>
</li>

<li class="{{ Request::is('salas*') ? 'active' : '' }}">
    <a href="{!! route('salas.index') !!}"><i class="fa fa-edit"></i><span>Salas</span></a>
</li>

<li class="{{ Request::is('materias*') ? 'active' : '' }}">
    <a href="{!! route('materias.index') !!}"><i class="fa fa-edit"></i><span>Materias</span></a>
</li>

<li class="{{ Request::is('funcoes*') ? 'active' : '' }}">
    <a href="{!! route('funcoes.index') !!}"><i class="fa fa-edit"></i><span>Funções</span></a>
</li>

