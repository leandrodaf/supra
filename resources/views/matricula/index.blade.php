@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <style>
        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }

        .error {
            border-color: #F70202
        }

    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Matricula</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body " tabindex="1">
            {!! Form::open(['route' => 'matricula.store', 'files' => true, 'id' => 'matriculaAluno', 'data-toggle' => 'validator', 'autocomplete' => 'off']) !!}

            <!-- SmartWizard html -->
                <div>
                    <h3>Aluno</h3>
                    <section>
                        @include('matricula.aluno')
                    </section>
                    <h3>Responsável</h3>
                    <section>
                        @include('matricula.responsaveis')
                    </section>
                    <h3>Dados médicos</h3>
                    <section>
                        @include('matricula.healthInformations')
                    </section>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>



    {{-- Aqui modal--}}


    <div class="modal fade" id="modal-default-responsavel" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>

                <div>
                    <form id="form-responsavel">
                        <div class="numeroResponsavel"></div>
                        <div class="modal-body">
                            <div id="loadingCadastroResponsavel" class="overlay" style="display:none;">
                                <div class="fa fa-refresh fa-spin"></div>
                            </div>
                            <div id="fieldsResponsaveis">
                                <!-- Tipo Pessoas Id Field -->
                                <div class="form-group {{$errors->has('tipo_pessoas_id') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('tipo_pessoas_id', 'Tipo Pessoa:') !!}
                                    {!! Form::select('tipo_pessoas_id', $tipoPessoasResponsavel, !empty($pessoa)? $pessoa->tipo_pessoa_id:2, ['class' => 'form-control', 'required'=>'required']) !!}
                                </div>


                                <!-- Nome Field -->
                                <div class="form-group nome {{$errors->has('nome') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('nome', 'Nome Completo:', ['id' => 'nomeLabel']) !!}
                                    {!! Form::text('nome', null, ['class' => 'form-control', 'required'=>'required']) !!}
                                </div>

                                <!-- Cpf Cnpj Field -->
                                <div class="form-group {{$errors->has('cpf_cnpj') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('cpf_cnpj', 'CPF:', ['class' =>'cpfCnpj']) !!}
                                    {!! Form::text('cpf_cnpj', null, ['class' => 'form-control validatecpf', 'required'=>'required']) !!}
                                </div>

                                <!-- Rg Field -->
                                <div class="form-group rg {{$errors->has('rg') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('rg', 'Rg:') !!}
                                    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Datanascimento Field -->
                                <div class="form-group dataNascimento {{$errors->has('dataNascimento') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('dataNascimento', 'Nascimento:') !!}
                                    {!! Form::text('dataNascimento', !empty($pessoa->dataNascimento)? $pessoa->dataNascimento->format('d/m/Y') :null, ['class' => 'form-control', 'format' => 'dd/MM/yyyy', 'required'=>'required']) !!}
                                </div>

                                <!-- familySituation Field -->
                                <div class="form-group familySituation {{$errors->has('familySituation') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('familySituation', 'Estado civil:') !!}
                                    {!! Form::select('familySituation', $familySituation, !empty($pessoa)? $pessoa->familySituation:null, ['class' => 'form-control', 'required'=>'required']) !!}
                                </div>

                                <!-- Citizenship Field -->
                                <div class="form-group citizenship {{$errors->has('citizenship') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('citizenship', 'Nacionalidade:') !!}
                                    {!! Form::select('citizenship', $citizenships, !empty($pessoa)? $pessoa->citizenship:7, ['class' => 'form-control', 'required'=>'required']) !!}
                                </div>


                                <!-- Sexo Field -->
                                <div class="form-group sexo {{$errors->has('sexo') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('sexo', 'Sexo:') !!}
                                    <label class="checkbox-inline">
                                        {!! Form::select('sexo', $genders, !empty($pessoa)? $pessoa->sexo:null, ['class' => 'form-control', 'required'=>'required']) !!}
                                    </label>
                                </div>

                                <div class="form-group  col-sm-6">
                                </div>
                                <div class="form-group  col-sm-6">
                                </div>

                                {{--Add fild mail--}}
                                <div class="form-group {{$errors->has('email') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('email', 'Email:') !!}
                                    <select id="emailResponsavel" name="email[][email]" multiple="multiple"
                                            required="required"></select>
                                </div>

                                {{--Add fild Phone--}}
                                <div class="form-group {{$errors->has('phone') ? "has-error":""}} col-sm-6">
                                    {!! Form::label('phone', 'Telefone:') !!}
                                    <select id="telefoneResponsavel" name="phone[][number]"
                                            multiple="multiple" required="required"></select>
                                </div>

                                <div class="form-group {{$errors->has('location') ? "has-error":""}} col-sm-12">
                                    {!! Form::label('location', 'Endereço:') !!}
                                </div>
                                <!-- Endereço -->
                                <div class="form-group col-sm-12">

                                    {{ Form::hidden('locations[id]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->id:null:null) }}

                                    <div class="form-group {{$errors->has('locations.zipCode') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[zipCode]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->zipCode:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'CEP', 'id' => 'zipCode', 'required'=>'required']) !!}
                                    </div>

                                    <div class="form-group {{$errors->has('locations.street') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[street]',!empty($pessoa)?  count($pessoa->location) != 0 ? $pessoa->location[0]->street:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Rua', 'id' => 'street']) !!}
                                    </div>

                                    <div class="form-group {{$errors->has('locations.number') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[number]', !empty($pessoa)? count($pessoa->location) != 0 ?  $pessoa->location[0]->number:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Número', 'id' => 'number', 'required'=>'required']) !!}
                                    </div>

                                    <div class="form-group {{$errors->has('locations.city') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[city]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->city:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Cidade', 'id' => 'city']) !!}
                                    </div>

                                    <div class="form-group {{$errors->has('locations.complement') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[complement]', !empty($pessoa)? count($pessoa->location) != 0 ? $pessoa->location[0]->complement:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Complemento', 'id' => 'complement']) !!}
                                    </div>

                                    <div class="form-group {{$errors->has('locations.neighborhood') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[neighborhood]',!empty($pessoa)?  count($pessoa->location) != 0 ? $pessoa->location[0]->neighborhood:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Bairro', 'id' => 'neighborhood']) !!}
                                    </div>

                                    <div class="form-group {{$errors->has('locations.state') ? "has-error":""}} col-sm-6">
                                        {{--        {!! Form::text('locations[estado]', !empty($pessoa)? count($pessoa->location) != 0? $pessoa->location[0]->estado:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'state', 'id' => 'state']) !!}--}}

                                        {!! Form::select('locations[state]', array('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO',), !empty($pessoa)?  count($pessoa->location) != 0 ? $pessoa->location[0]->state:null:null, ['class' => 'form-control', 'id'=> 'state']) !!}


                                    </div>

                                    <div class="form-group {{$errors->has('locations.country') ? "has-error":""}} col-sm-6">
                                        {!! Form::text('locations[country]',!empty($pessoa)?  count($pessoa->location) != 0? $pessoa->location[0]->country:null:null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'País', 'id' => 'country']) !!}
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary', 'data-dismiss'=> 'modal', 'id'=>'inputResponsavel']) !!}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('js/plugins/jquery.cpfcnpj.min.js')}}"></script>
    <script src="{{asset('/js/features/matricula.js')}}"></script>
@endsection