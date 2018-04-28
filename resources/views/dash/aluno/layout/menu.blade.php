<li class="nav-item">
    <a href="{{Request::is('aluno/dash/atividade*') ? '#atividade':route('aluno.dash.atividade')}}"
       class="nav-link {{ Request::is('aluno/dash/atividade*') ? 'active' : '' }}"
       style="cursor: pointer;">
        <i class="material-icons">class</i> Atividades
    </a>
</li>
<li class=" nav-item">
    <a href="{{Request::is('aluno/dash/turma*') ? '#turma':route('aluno.dash.turma')}}"
       class="nav-link {{ Request::is('aluno/dash/turma*') ? 'active' : '' }}"
       style="cursor: pointer;">
        <i class="material-icons">perm_contact_calendar</i> Turma
    </a>
</li>
<li class="nav-item">
    <a href="{{Request::is('aluno/dash/mensagem*') ? '#mensagens':route('aluno.dash.mensagem')}}"
       class="nav-link {{ Request::is('aluno/dash/mensagem*') ? 'active' : '' }}"
       style="cursor: pointer;">
        <i class="material-icons">local_post_office</i> Mensagens
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('aluno/dash/user*') ? 'active' : '' }}" data-toggle="tab"
       style="cursor: pointer;">
        <i class="material-icons">face</i> Dados pessoais
    </a>
</li>