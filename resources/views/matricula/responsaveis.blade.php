<!-- Nome Aluno Field -->

<div class="row text-center">
    <div id="responsavel1erro" class="form-group {{$errors->has('nome_aluno') ? "has-error":""}} col-sm-6">
        <div class="text-left">
            {!! Form::label('responsaveis', 'Responsável 1:') !!}
        </div>
        <select name="responsaveis[]" id="responsavel1" class="form-control" required="required"></select>
        <p></p>
        <a href="#responsavel1" id="1" class="responsavel" data-toggle="modal" data-target="#modal-default-responsavel">
            <i class="fa fa-user"></i> Novo responsável
        </a>
    </div>


    <div id="responsavel2erro" class="form-group {{$errors->has('nome_aluno') ? "has-error":""}} col-sm-6">
        <div class="text-left">
            {!! Form::label('responsaveis', 'Responsável 2:') !!}
        </div>
        <select name="responsaveis[]" id="responsavel2Matricula" class="form-control"></select>
        <p></p>
        <a href="#responsavel2" id="2" class="responsavel" data-toggle="modal" data-target="#modal-default-responsavel">
            <i class="fa fa-user"></i> Novo responsável
        </a>
    </div>
</div>