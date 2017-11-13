@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
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
                <div id="rootwizard">
                    <div class="navbar-inner">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a href="#tab1" data-toggle="tab">Aluno</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab2" data-toggle="tab">Responsável</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab3" data-toggle="tab">Dados médicos</a>
                            </li>
                        </ul>
                    </div>
                    <div id="bar" class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                             aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                            @include('matricula.aluno')
                        </div>
                        <div class="tab-pane" id="tab2">
                            @include('matricula.responsaveis')
                        </div>
                        <div class="tab-pane" id="tab3">
                            @include('matricula.dadosmedicos')
                        </div>

                        <ul class="pager wizard">
                            <li class="previous first" style="display:none;">
                                <a href="#">First</a>
                            </li>
                            <li class="previous">
                                <a href="#">Voltar</a>
                            </li>
                            <li class="next last" style="display:none;">
                                <a href="#">Last</a>
                            </li>
                            <li class="next">
                                <a href="#">Próximo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/matricula.js')}}"></script>
@endsection