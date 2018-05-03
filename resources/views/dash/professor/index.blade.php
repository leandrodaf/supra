@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Mensagens</h3>

                </div>
                <div class="box-body">
                </div>
                <div class="box-footer no-padding">

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-graduation-cap    "></i> Turmas</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Sala</th>
                                <th class="text-center">Inicia</th>
                                <th class="text-center">Encerra</th>
                                <th class="text-center">Matéria</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($turmas as $turma)
                                <tr class="clickable-row {{$turma['lockStatus'] > 0 ? 'table-light': 'table-danger'}}"
                                    data-href='{{route('class.show', $turma['id'])}}' style="cursor: pointer;">
                                    <td>{{$turma['sala']}}</td>
                                    <td class="text-center">{{$turma['inicia']}}</td>
                                    <td class="text-center">{{$turma['encerra']}}</td>
                                    <td class="text-center">{{$turma['materia']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer no-padding">
                    {{$turmas->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Chamadas Pendentes</h3>

                </div>
                <div class="box-body">

                </div>
                <div class="box-footer no-padding">

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Diarios de alunos Pendentes</h3>

                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Aluno</th>
                            <th class="text-center">Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($diarios as $diario)
                            <tr class="clickable-row"
                                data-href='{{route('alunos.show', $diario['alunos_id'])}}' style="cursor: pointer;">
                                <td>{{$diario->alunos->get(0)->nome_aluno}}</td>
                                <td class="text-center">{{$diario->date->format('d/m/Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer no-padding">
                    {{$diarios->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });
    </script>

@endsection