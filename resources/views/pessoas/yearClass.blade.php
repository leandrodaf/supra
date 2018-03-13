<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Turmas</h3>
        <div class="box-tools pull-right">

            <a href="#formIncluirParticipante" class="module-control pull-right" data-toggle="modal">
                <i class="icon-plus"></i>
            </a>


        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        @if(count($pessoa->yearClass) != 0)

            @include('pessoas.yearClass_table')

        @else
            O professor não gerencia nenhuma turma
        @endif

    </div>
    <!-- /.box-body -->
</div>