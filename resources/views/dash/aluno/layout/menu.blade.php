<li class="nav-item">
    <a class="nav-link {{ Request::is('aluno/dash/atividade*') ? 'active' : '' }}" data-toggle="tab" >
        <i class="material-icons">class</i> Atividades
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('aluno/dash/turma*') ? 'active' : '' }}" data-toggle="tab" >
        <i class="material-icons">perm_contact_calendar</i> Turma
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('aluno/dash/mensagem*') ? 'active' : '' }}" data-toggle="tab" >
        <i class="material-icons">local_post_office</i> Mensagens
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('aluno/dash/user*') ? 'active' : '' }}" data-toggle="tab" >
        <i class="material-icons">face</i> Dados pessoais
    </a>
</li>