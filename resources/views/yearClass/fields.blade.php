<div class="form-group col-sm-12">

    <div id="responsavel1erro" class="form-group {{$errors->has('classroom_id') ? "has-error":""}} col-sm-12">
        <div class="text-left">
            {!! Form::label('classroom', 'Sala:') !!}
        </div>
        <select name="classroom_id" id="classroom" class="form-control" required="required"></select>
    </div>


    <div class="form-group col-sm-4 has-feedback{{ $errors->has('activeTime') ? ' has-error' : '' }}">
        <div class="text-left">
            {!! Form::label('activeTime', 'Encerra em:') !!}
        </div>

        <input type="text" class="form-control" name="activeTime" id="activeTime" value="" required="required">

        @if ($errors->has('activeTime'))
            <span class="help-block">
                <strong>{{ $errors->first('activeTime') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-sm-4 inicio has-feedback{{ $errors->has('startTime') ? ' has-error' : '' }}">
        <div class="text-left">
            {!! Form::label('startTime', 'Horário de Início:') !!}
        </div>

        <div class="input-group startTime"  data-align="top" data-autoclose="true">
            <input type="text" name="startTime" id="startTime" class="form-control" placeholder="00:00" size="5"
                   maxlength="5" required="required">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>

        @if ($errors->has('startTime'))
            <span class="help-block">
                <strong>{{ $errors->first('startTime') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-sm-4 fim has-feedback{{ $errors->has('endTime') ? ' has-error' : '' }}">
        <div class="text-left">
            {!! Form::label('endTime', 'Horário de encerramento:') !!}
        </div>

        <div class="input-group endTime" data-align="top" data-autoclose="true">
            <input type="text" name="endTime" id="endTime" class="form-control" placeholder="00:00" size="5"
                   maxlength="5" required="required">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>

        @if ($errors->has('endTime'))
            <span class="help-block">
                <strong>{{ $errors->first('endTime') }}</strong>
            </span>
        @endif
    </div>

    <div id="professor_id" class="form-group {{$errors->has('professor_id') ? "has-error":""}} col-sm-8">
        <div class="text-left">
            {!! Form::label('classroom', 'Professor:') !!}
        </div>
        <select name="professor_id" id="professor" class="form-control" required="required"></select>
    </div>

    <div id="schoolSubjects" class="form-group col-sm-4">
        <div class="text-left">
            {!! Form::label('schoolsubjects_id', 'Matéria:') !!}
        </div>
        <select name="schoolsubjects_id" id="schoolsubjects" class="form-control" disabled="disabled"
                required="required">
            <option>Selecione uma matéria</option>
        </select>
    </div>


</div>