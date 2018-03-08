<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $classroom->id !!}</p>
</div>

<!-- Nome Sala Field -->
<div class="form-group">
    {!! Form::label('nome_sala', 'Nome da Sala:') !!}
    <p>{!! $classroom->nome_sala !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $classroom->status !!}</p>
</div>

<!-- Capacidade Field -->
<div class="form-group">
    {!! Form::label('capacidade', 'Capacidade:') !!}
    <p>{!! $classroom->capacidade !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $classroom->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $classroom->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deletado em:') !!}
    <p>{!! $classroom->deleted_at !!}</p>
</div>

