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

                        </div>
                        <i class="fa fa-calendar"></i> Chamada
                    </div>

                    <div class="box-body">
                        @include('yearClass.call')
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <div class="btn-group">
                                <a data-toggle="collapse" href="#collapseAluno" aria-expanded="false"
                                   aria-controls="collapseAluno">
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
                @include('yearClass.classroom_activities')

            </div>
        </div>
    </div>

    <!-- Modal remover aluno -->
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

    <div class="modal fade" id="deleteActivities" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Desvincular aluno?</strong></h5>
                </div>
                <div class="modal-body text-center">

                    <div class="alert alert-warning">
                        <i id="alertDeleteActivities" class="fa fa-exclamation"
                           style="font-size:80px; color: #333;"></i>
                        <p></p>
                        <strong>Atenção!</strong> Você realmente deseja deletar essa atividade?
                    </div>

                    <p></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="deleteActivitiesButton" type="button" value="" class="btn btn-warning">Remover</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal add activities-->


    <div class="modal fade " id="activitiesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-text-o"></i> &nbsp; Nova
                        atividade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'activitie.store', 'files' => true, 'id' => 'activitiesClass', 'data-toggle' => 'validator', 'autocomplete' => 'off']) !!}

                <input name="yearClass_id" type="hidden" value="{{$class->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Titulo:</label>
                                <input name="title" type="text" class="form-control" id="recipient-name"
                                       required="required">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="start_date" class="form-control-label">Data inicío:</label>
                                <input name="start_date" type="text" class="form-control date" id="recipient-name"
                                       required="required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="end_date" class="form-control-label">Data fim:</label>
                                <input name="end_date" type="text" class="form-control date" id="recipient-name"
                                       required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="attachedFile" class="form-control-label">Anexar atividade:</label>
                                <input name="attachedFile[]" type="file" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description" class="form-control-label">Descrição:</label>
                                <textarea name="description" class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <div class="modal fade" id="activitiesInfoModal" role="dialog" aria-labelledby="activitiesInfoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="box-tools pull-right">
                        <button id="removeActivities" type="button" class="btn btn-box-tool" aria-expanded="false"
                                data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Excluir atividade">
                            <i class="fa fa-trash" style="font-size: 20px; color: #cb2027;"></i>
                        </button>
                    </div>
                    <h4 class="modal-title" id="title"></h4>
                    <h5 id="dates"></h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <select name="activitieAluno" id="activitieAluno" class="form-control"
                                    required="required"></select>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" min="0" max="100" step="5" maxlength="6"
                                       placeholder="0.00" name="media"
                                       id="media" required="" aria-required="true" aria-invalid="false"
                                       disabled="disabled">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" id="incluirAlunoActivitie" class="btn btn-primary"
                                    disabled="disabled">Incluir aluno
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="box box-success collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Arquivos Anexados</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                        aria-expanded="false">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body collapse">
                            <table class="table table-responsive" id="listDocs">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th style="text-align: center">Data</th>
                                    <th style="text-align: center">Formato</th>
                                    <th style="text-align: center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box box-primary" id="listAlunos">
                        <div class="overlay" id="listAluno" style="display: none;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>

                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Aluno</th>
                                <th>Nota</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="makeCall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => 'call.store', 'id' => 'callMakeForm', 'data-toggle' => 'validator', 'autocomplete' => 'off']) !!}
            <input id="date_call" name="date" type="hidden" value="">
            <input id="year_class_id" name="year_class_id" type="hidden" value="{{$class->id}}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleMakeCall"><i class="fa fa-calendar"></i> Chamada</h5>
                </div>

                <div class="modal-body">

                    <div class="table-responsive-sm">

                        <table class="table" id="tableCall">
                            <thead>
                            <tr>
                                <th scope="col">Aluno</th>
                                <th scope="col" align="right">Presença</th>
                                <th scope="col" align="right">Falta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($class->alunos as $user)
                                <tr>
                                    <th scope="row">{{$user->nome_aluno}}</th>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="aluno[{{$user->id}}][presence]">
                                            Presença
                                        </label>
                                    </td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="aluno[{{$user->id}}][presence]" checked>
                                            Falta
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="doneCall">Concluir</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    {{--Modal alterar chamada --}}

    <div class="modal fade" id="alterCall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['call.update', ''],'id' => 'callAlterForm', 'data-toggle' => 'validator', 'autocomplete' => 'off',  'method' => 'put']) !!}
            <input id="date_callUpdate" name="date" type="hidden" value="">
            <input id="year_class_id" name="year_class_id" type="hidden" value="{{$class->id}}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleMakeCall"><i class="fa fa-calendar"></i> Chamada</h5>
                </div>

                <div class="modal-body">

                    <div class="table-responsive-sm">

                        <table class="table" id="tableAlterCall">
                            <thead>
                            <tr>
                                <th scope="col">Aluno</th>
                                <th scope="col" align="right">Presença</th>
                                <th scope="col" align="right">Falta</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="doneCall">Concluir</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/yearClass.js')}}"></script>
    <script src="{{asset('/js/features/activities.js')}}"></script>

@endsection