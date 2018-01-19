<!-- sarampo -->
<div class="form-group {{$errors->has('sarampo') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('sarampo', 'Sarampo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[sarampo]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[sarampo]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- rubeola -->
<div class="form-group {{$errors->has('rubeola') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('rubeola', 'Rubeola') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[rubeola]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[rubeola]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- catapora -->
<div class="form-group {{$errors->has('catapora') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('catapora', 'Catapora') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[catapora]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[catapora]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- escarlatina -->
<div class="form-group {{$errors->has('escarlatina') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('escarlatina', 'Escarlatina') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('escahealthInformations[escarlatina]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[escarlatina]', '0', true) !!} Não</label>
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
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[outradoenca]', false,['rows' => '3']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- bronquite -->
<div class="form-group {{$errors->has('bronquite') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('bronquite', 'Bronquite') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[bronquite]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[bronquite]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- faltadear -->
<div class="form-group {{$errors->has('faltadear') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('faltadear', 'Faltadear') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[faltadear]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[faltadear]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- diabete -->
<div class="form-group {{$errors->has('diabete') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('diabete', 'Diabete') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[diabete]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[diabete]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- refluxo -->
<div class="form-group {{$errors->has('refluxo') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('refluxo', 'Refluxo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[refluxo]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[refluxo]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- convulsao -->
<div class="form-group {{$errors->has('convulsao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('convulsao', 'Convulsao') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('cohealthInformations[convulsao]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[convulsao]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- medicamentotomar -->
<div class="form-group {{$errors->has('medicamentotomar') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('medicamentotomar', 'Quais medicamentos tomar') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[medicamentotomar]', false,['rows' => '3']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- alergia -->
<div class="form-group {{$errors->has('alergia') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('alergia', 'Alergia') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[alergia]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[alergia]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- sintomasalergia -->
<div class="form-group {{$errors->has('sintomasalergia') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('sintomasalergia', 'Sintomas da alergia') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[sintomasalergia]', false,['rows' => '3']) !!}</label>
        </label>
    </div>
</div>
<br/>
<!-- visao -->
<div class="form-group {{$errors->has('visao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('visao', 'Deficiente visaul') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('radiohealthInformations[visao]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[visao]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- fala -->
<div class="form-group {{$errors->has('fala') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('fala', 'Deficiencia na fala') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[fala]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[fala]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- audicao -->
<div class="form-group {{$errors->has('audicao') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('audicao', 'Deficiente auditivo') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('healthInformations[audicao]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[audicao]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- edfisica -->
<div class="form-group {{$errors->has('edfisica') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('edfisica', 'Deficiente Fisica') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::radio('ehealthInformations[edfisica]', '1', false) !!} Sim</label>
            <label class="checkbox-inline">{!! Form::radio('healthInformations[edfisica]', '0', true) !!} Não</label>
        </label>
    </div>
</div>
<br/>
<!-- outradeficienciax -->
<div class="form-group {{$errors->has('outradeficienciax') ? "has-error":""}} col-sm-12">
    <div class="col-sm-3 -align-right">
        {!! Form::label('outradeficienciax', 'Outra deficiente ') !!}
    </div>
    <div class="col-sm-3 -align-left">
        <label class="checkbox-inline">
            <label class="checkbox-inline">{!! Form::textarea('healthInformations[outradeficienciax]', false,['rows' => '3']) !!} </label>
        </label>
    </div>
</div>
