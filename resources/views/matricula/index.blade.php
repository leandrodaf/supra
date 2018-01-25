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

                </form>

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('js/plugins/jquery.cpfcnpj.min.js')}}"></script>
    <script src="{{asset('/js/features/matricula.js')}}"></script>
@endsection