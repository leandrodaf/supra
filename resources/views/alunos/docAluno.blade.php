@if(Auth::user()->hasRole('secretaria') || Auth::user()->hasRole('admin'))
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Documentos do aluno</h3>
            <div class="box-tools pull-right">

                <button data-toggle="modal" data-target="#modal-doc-aluno" class="btn btn-box-tool">
                    <i class="fa fa-address-card-o"></i>
                </button>

            </div>
        </div>
        <div class="box-body">
            @include('alunos.doc_tables')
        </div>
    </div>

@endif