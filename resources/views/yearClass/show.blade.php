@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="id-class" content="{{ $class->id }}">
@endsection

@section('content')
    <section class="content-header">

    </section>
    <div class="contnt">
        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">

                            <div class="btn-group">


                            </div>

                        </div>
                        <div class="box-title" style="overflow: hidden">
                            @include('yearClass.header')

                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <div class="btn-group">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample">
                                    Adicionar Aluno
                                </a>
                            </div>
                        </div>
                        Alunos
                    </div>
                    <div class="box-body">
                        <div class="row">

                            @include('yearClass.add_alunos')


                        </div>
                    </div>
                    <div class="box-body">


                        @include('yearClass.alunos_table')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('yearClass.teacher')

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="unsync" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Desvincular aluno?</strong></h5>
                </div>
                <div class="modal-body text-center">

                    <div class="alert alert-warning">
                        <i id="alertDelete" class="fa fa-exclamation" style="font-size:80px; color: #333;"></i>
                        <p></p>
                        <strong>Atenção!</strong> Você realmente deseja remover esse aluno?
                    </div>

                    <p></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="unsyncButton" type="button" value="" class="btn btn-warning">Desvincular</button>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/yearClass.js')}}"></script>
@endsection