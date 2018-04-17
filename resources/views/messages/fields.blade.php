<!-- Nome Field -->
<div class="form-group nome {{$errors->has('nome') ? "has-error":""}} col-sm-6 col-md-6">
    {!! Form::label('nome', 'Descrição') !!}
    <br>
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>
<br>

<!-- Datanascimento Field -->
<div class="form-group dataNascimento {{$errors->has('data_message') ? "has-error":""}} col-sm-6 pull-none">
    {!! Form::label('data_message', 'Data do recado:') !!}
    {!! Form::text('data_message', !empty($message->data_message)? $message->data_message->format('d/m/Y') :null, ['class' => 'form-control', 'format' => 'dd/MM/yyyy']) !!}
</div>

<br>

<!-- Contato -->
<!-- <div class="form-group dataNascimento {{$errors->has('dataNascimento') ? "has-error":""}} col-sm-6 pull-none">
    {!! Form::label('phone', 'Contato:') !!}
    {!! Form::text('phone', !empty($message->data_message)? $message->data_message->format('d/m/Y') :null, ['class' => 'form-control', 'format' => 'dd/MM/yyyy']) !!}
</div> -->



<div class="form-group {{$errors->has('phone') ? "has-error":""}} col-sm-6 col-md-6 pull-none">
    {!! Form::label('phone', 'Telefone') !!}
    <select id="telefoneResponsavel" name="phone[][number]" multiple="multiple"></select>

    @if(!empty($message) )
        <p></p>
        {!! Form::label('phone', 'Telefones cadastrados:') !!}
        <dl class="dl-horizontal">
            <p></p>
            <!-- lista de phones -->

            @foreach($message->phone->toArray() as $phone)
                <dt>

                    <a href="#deletar-phone-{{$message['id']}}"
                       class="btn btn-default btn-flat {{count($message->phone->toArray()) >1 && $phone['pivot']['flg_principal'] != 1 ?"":"disabled" }}"
                       onclick="document.getElementById({!! "'#deletar-phone-".$phone['id']."'" !!}).submit();" {{count($pessoa->phone->toArray()) >1 ?"":"disabled" }}>

                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                </dt>
                <dd>
                    <a class="listphone" href="#mainphone"
                       {{count($message->phone->toArray()) >1 && $phone['pivot']['flg_principal'] != 1 ?'':'data-toggle="tooltip"' }} id="{{$message->id.'-'.$phone['id']}}"
                       title="{{$phone['pivot']['flg_principal'] != 0 ? "Telefone principal": "Tornar o Telefone principal"}}">{{$phone['number']}}</a>
                    <span class="label label-info">{{$phone['pivot']['flg_principal'] == 1 ? "Principal":""}}</span>
                </dd>
            @endforeach
        </dl>
    @endif
</div>