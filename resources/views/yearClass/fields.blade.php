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

        <input type="text" class="form-control" name="activeTime" id="activeTime" value="">

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

        <div class="input-group startTime" data-placement="right" data-align="top" data-autoclose="true">
            <input type="text" name="startTime"  id="startTime" class="form-control" value="00:00" size="5" maxlength="5">
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

        <div class="input-group endTime" data-placement="right" data-align="top" data-autoclose="true">
            <input type="text" name="endTime" id="endTime" class="form-control" value="00:00" size="5" maxlength="5">
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


</div>