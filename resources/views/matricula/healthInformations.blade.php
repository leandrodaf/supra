<!-- sarampo -->
<div class="form-group {{$errors->has('healthInformations.sarampo') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('sarampo', 'Sarampo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[sarampo]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[sarampo]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- rubeola -->
<div class="form-group {{$errors->has('healthInformations.rubeola') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('rubeola', 'Rubeola') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[rubeola]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[rubeola]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- catapora -->
<div class="form-group {{$errors->has('healthInformations.catapora') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('catapora', 'Catapora') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[catapora]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[catapora]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- escarlatina -->
<div class="form-group {{$errors->has('healthInformations.escarlatina') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('escarlatina', 'Escarlatina') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[escarlatina]', true, false) !!}
                Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[escarlatina]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- outradoenca -->
<div class="form-group {{$errors->has('healthInformations.outradoenca') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('outradoenca', 'Aprensentou outradoenca') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[outradoenca]', false,['rows' => '3']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- bronquite -->
<div class="form-group {{$errors->has('healthInformations.bronquite') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('bronquite', 'Bronquite') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[bronquite]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[bronquite]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- faltadear -->
<div class="form-group {{$errors->has('healthInformations.faltadear') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('faltadear', 'Faltadear') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[faltadear]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[faltadear]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- diabete -->
<div class="form-group {{$errors->has('healthInformations.diabete') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('diabete', 'Diabete') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[diabete]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[diabete]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- refluxo -->
<div class="form-group {{$errors->has('healthInformations.refluxo') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('refluxo', 'Refluxo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[refluxo]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[refluxo]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- convulsao -->
<div class="form-group {{$errors->has('healthInformations.convulsao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('convulsao', 'Convulsao') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[convulsao]', true, false) !!}
                Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[convulsao]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- medicamentotomar -->
<div class="form-group medicamentotomar{{$errors->has('healthInformations.medicamentotomar') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('medicamentotomar', 'Quais medicamentos tomar') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[medicamentotomar]', false,['rows' => '3', 'disabled' => 'disabled']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- alergia -->
<div class="form-group {{$errors->has('healthInformations.alergia') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('alergia', 'Alergia') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[alergia]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[alergia]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- sintomasalergia -->
<div class="form-group {{$errors->has('healthInformations.sintomasalergia') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('sintomasalergia', 'Sintomas da alergia') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[sintomasalergia]', false,['rows' => '3','disabled' => 'disabled' ]) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- visao -->
<div class="form-group {{$errors->has('healthInformations.visao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('visao', 'Deficiente visaul') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[visao]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[visao]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- fala -->
<div class="form-group {{$errors->has('healthInformations.fala') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('fala', 'Deficiencia na fala') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[fala]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[fala]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- audicao -->
<div class="form-group {{$errors->has('healthInformations.audicao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('audicao', 'Deficiente auditivo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[audicao]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[audicao]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- edfisica -->
<div class="form-group {{$errors->has('healthInformations.edfisica') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('edfisica', 'Deficiente Fisica') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[edfisica]', true, false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[edfisica]', false, true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- outradeficienciax -->
<div class="form-group {{$errors->has('healthInformations.outradeficienciax') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('outradeficienciax', 'Outra deficiente ') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[outradeficienciax]', false,['rows' => '3']) !!} </label>
        </label>
    </div>
</div>
