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
                    @if(count($turmas) != 0)
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
                    @else
                        <div class="alert alert-info">
                            <strong>Atenção!</strong> Você ainda não possui turmas!
                        </div>
                    @endif
                </div>
                <div class="box-footer no-padding text-center">
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
                    @if(count($chamadas) != 0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Sala</th>
                                <th class="text-center">Matéria</th>
                                <th class="text-center">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($chamadas as $chamada)
                                <tr class="clickable-row"
                                    data-href='{{route('class.show', $chamada['class']->id)}}'
                                    style="cursor: pointer;">
                                    <td>{{$chamada['class']->classroom->nome_sala}}</td>
                                    <td class="text-center">{{$chamada['class']->schoolSubject->get(0)->nome}}</td>
                                    <td class="text-center">
                                        {{Carbon\Carbon::create(explode("-", $chamada['date'])[0], explode("-", $chamada['date'])[1], explode("-", $chamada['date'])[2], 0, 0, 0)->format('d/m/Y')}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            <strong>Atenção!</strong> Todas as chamadas foram feitas!
                        </div>
                    @endif
                </div>
                <div class="box-footer no-padding text-center">
                    {{$chamadas->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Diarios de alunos Pendentes</h3>

                </div>
                <div class="box-body">
                    @if(count($diarios) != 0)
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
                    @else
                        <div class="alert alert-info">
                            <strong>Atenção!</strong> Todos os diarios foram preenchidos!
                        </div>
                    @endif
                </div>
                <div class="box-footer no-padding text-center">
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