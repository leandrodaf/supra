<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Responsáveis e Autorizados</h3>
        <div class="box-tools pull-right">
            <!-- Collapse Button -->
            {{--<button type="button" class="btn btn-box-tool" data-widget="collapse">--}}
            {{--<i class="fa fa-minus"></i>--}}
            {{--</button>--}}

            <a href="#formIncluirParticipante" class="module-control pull-right" data-toggle="modal">
                <i class="icon-plus"></i>
            </a>

            @if(count($alunos->pessoa) <= 2 && count($alunos->pessoa) != 0)
                <a class="btn btn-box-tool">
                    <i data-toggle="modal"
                       data-target="#modal-default" class="fa fa-users"></i>
                </a>
            @endif
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @include('alunos.responsavei_table')
    </div>
    <!-- /.box-body -->
</div>