<!-- Nome Aluno Field -->

<div class="row text-center">
    <div class="form-group {{$errors->has('nome_aluno') ? "has-error":""}} col-sm-6">
        <div class="text-left">
            {!! Form::label('responsavel', 'Responsável 1:') !!}
        </div>
        <select name="responsavel[nome]" id="responsavel1" class="form-control"></select>
        <p></p>
        <a href="#responsavel1" id="1" class="responsavel" data-toggle="modal" data-target="#modal-default-responsavel">
            <i class="fa fa-user"></i> Novo responsável
        </a>
    </div>


    <div class="form-group {{$errors->has('nome_aluno') ? "has-error":""}} col-sm-6">
        <div class="text-left">
            {!! Form::label('responsavel', 'Responsável 2:') !!}
        </div>
        <select name="responsavel[nome]" id="responsavel2" class="form-control"></select>
        <p></p>
        <a href="#responsavel2" id="2" class="responsavel" data-toggle="modal" data-target="#modal-default-responsavel">
            <i class="fa fa-user"></i> Novo responsável
        </a>
    </div>
</div>


{{-- Aqui modal--}}


<div class="modal fade" id="modal-default-responsavel" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <form id="form-responsavel">
                <div class="numeroResponsavel"></div>
                <div class="modal-body">
                    <div id="loadingCadastroResponsavel" class="overlay" style="display:none;">
                        <div class="fa fa-refresh fa-spin"></div>
                    </div>
                    <div id="fieldsResponsaveis">
                        @include('pessoas.fields')
                        {{ csrf_field() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <button id="inputResponsavel" type="submit" class="btn btn-primary">Criar responsável</button>
                </div>
            </form>

        </div>
    </div>
</div>
