<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Ultimas chamadas</h3>
        <div class="box-tools pull-right">
            <a href="#formIncluirParticipante" class="module-control pull-right" data-toggle="modal">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
    <div class="box-body">
        @if(count($alunos->call) != 0)
            @include('alunos.presence_table')
        @else
            O aluno não possui registros de chamada
        @endif
    </div>
</div>