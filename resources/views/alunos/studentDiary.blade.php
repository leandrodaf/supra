<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Diário do aluno</h3>
        <div class="box-tools pull-right">
            @if(Auth::user()->hasRole('Professor') || Auth::user()->hasRole('admin'))
                <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#studentDiaryModal">
                    <i class="fa fa-plus"></i>
                </button>
            @endif

        </div>
    </div>
    <div class="box-body">
        @if(count($alunos->diairy()->take(5)->get()) != 0)
            @include('alunos.studentDiary_table')
        @else
            O aluno não possui registro de diário
        @endif
    </div>
</div>