<!-- Flg Certidao Nascimento Aluno Field -->
<div class="form-group {{$errors->has('flg_certidao_nascimento_aluno') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('flg_certidao_nascimento_aluno', 'Apresentou certidao de nascimento:') !!}
    </div>

    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('flg_certidao_nascimento_aluno', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('flg_certidao_nascimento_aluno', '0', true) !!} Não</label>
        </label>
    </div>

</div>

<!-- sarampo -->
<div class="form-group {{$errors->has('sarampo') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('sarampo', 'Aprensentou sarampo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[sarampo]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[sarampo]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- rubeola -->
<div class="form-group {{$errors->has('rubeola') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('rubeola', 'Aprensentou rubeola') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[rubeola]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[rubeola]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- catapora -->
<div class="form-group {{$errors->has('catapora') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('catapora', 'Aprensentou catapora') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[atapora]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[catapora]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- escarlatina -->
<div class="form-group {{$errors->has('escarlatina') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('escarlatina', 'Aprensentou escarlatina') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('escadadosMedicos[rlatina]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[escarlatina]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- outradoenca -->
<div class="form-group {{$errors->has('outradoenca') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('outradoenca', 'Aprensentou outradoenca') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[outradoenca]', null,['rows' => '3']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- bronquite -->
<div class="form-group {{$errors->has('bronquite') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('bronquite', 'Aprensentou bronquite') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[onquite]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[bronquite]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- faltadear -->
<div class="form-group {{$errors->has('faltadear') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('faltadear', 'Aprensentou faltadear') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[ltadear]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[faltadear]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- diabete -->
<div class="form-group {{$errors->has('diabete') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('diabete', 'Aprensentou diabete') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[diabete]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[diabete]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- refluxo -->
<div class="form-group {{$errors->has('refluxo') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('refluxo', 'Aprensentou refluxo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[refluxo]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[refluxo]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- convulsao -->
<div class="form-group {{$errors->has('convulsao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('convulsao', 'Aprensentou convulsao') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('codadosMedicos[nvulsao]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[convulsao]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- medicamentotomar -->
<div class="form-group {{$errors->has('medicamentotomar') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('medicamentotomar', 'Aprensentou medicamentotomar') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[medicamentotomar]', null,['rows' => '3']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- alergia -->
<div class="form-group {{$errors->has('alergia') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('alergia', 'Aprensentou alergia') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[alergia]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[alergia]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- sintomasalergia -->
<div class="form-group {{$errors->has('sintomasalergia') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('sintomasalergia', 'Aprensentou sintomasalergia') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[sintomasalergia]', null,['rows' => '3']) !!}</label>

        </label>
    </div>
</div>
<br/>
<!-- visao -->
<div class="form-group {{$errors->has('visao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('visao', 'Aprensentou visao') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('radiodadosMedicos[visao]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[visao]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- fala -->
<div class="form-group {{$errors->has('fala') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('fala', 'Aprensentou fala') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[fala]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[fala]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- audicao -->
<div class="form-group {{$errors->has('audicao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('audicao', 'Aprensentou audicao') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[audicao]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[audicao]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- edfisica -->
<div class="form-group {{$errors->has('edfisica') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('edfisica', 'Aprensentou edfisica') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('edadosMedicos[dfisica]', '1', null) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('dadosMedicos[edfisica]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- outradeficienciax -->
<div class="form-group {{$errors->has('outradeficienciax') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('outradeficienciax', 'Aprensentou outradeficienciax') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('dadosMedicos[outradeficienciax]', null,['rows' => '3']) !!} </label>
        </label>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
