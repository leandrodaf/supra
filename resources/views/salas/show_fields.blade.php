<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sala->id !!}</p>
</div>

<!-- Nome Sala Field -->
<div class="form-group">
    {!! Form::label('nome_sala', 'Nome Sala:') !!}
    <p>{!! $sala->nome_sala !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $sala->status !!}</p>
</div>

<!-- Capacidade Field -->
<div class="form-group">
    {!! Form::label('capacidade', 'Capacidade:') !!}
    <p>{!! $sala->capacidade !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sala->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sala->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $sala->deleted_at !!}</p>
</div>

