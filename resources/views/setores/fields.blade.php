<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        <label class="checkbox-inline">{!! Form::radio('status', '1', null) !!} Ativo</label>
        <label class="checkbox-inline">{!! Form::radio('status', '0', true) !!} Inativo</label>
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('setores.index') !!}" class="btn btn-default">Cancelar</a>
</div>
