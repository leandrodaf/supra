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
                <div id="smartwizard">
                    <ul>
                        <li>
                            <a href="#step-1">
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                <br/>
                                <small>Aluno</small>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                                <br/>
                                <small>Responsável</small>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <i class="fa fa-heartbeat  fa-2x" aria-hidden="true"></i>
                                <br/>
                                <small>Dados médicos</small>
                            </a>
                        </li>

                    </ul>

                    <div>
                        <div id="step-1">
                            <div id="form-step-0" role="form" data-toggle="validator">
                                @include('matricula.aluno')
                            </div>
                        </div>
                        <div id="step-2">
                            <div id="form-step-1" role="form" data-toggle="validator">
                                @include('matricula.responsaveis')
                                <br/>
                            </div>
                        </div>
                        <div id="step-3">
                            <div id="form-step-2" role="form" data-toggle="validator">
                                @include('matricula.healthInformations')
                            </div>
                        </div>

                    </div>
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
                        <span aria-hidden="true">×</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <form id="form-responsavel">
                    <div class="numeroResponsavel"></div>
                    <div class="modal-body">
                        <div id="loadingCadastroResponsavel" class="overlay" style="display:none;">
                            <div class="fa fa-refresh fa-spin"></div>
                        </div>
                        <div id="fieldsResponsaveis">
                            @include('pessoas.fields')
                            {{ csrf_field() }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                        <button id="inputResponsavel" type="submit" class="btn btn-primary">Criar responsável</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('js/plugins/jquery.cpfcnpj.min.js')}}"></script>
    <script src="{{asset('/js/features/matricula.js')}}"></script>
@endsection