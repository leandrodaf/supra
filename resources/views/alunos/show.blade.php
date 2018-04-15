@extends('layouts.app')


@section('css')

    <link rel="stylesheet" href="{{asset('css/plugins/trumbowyg.min.css')}}">
    <meta name="notification-title" content="{{ old('title') }}">
    <meta name="user-id" content="{{ $alunos->id }}">


    <style>
        .trumbowyg-editor[contenteditable=true]:empty::before {
            content: attr(placeholder);
            color: #999;
        }
    </style>

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
                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle"
                                        data-toggle="dropdown">
                                    Ações &nbsp; <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{!! route('alunos.edit', [$alunos->id]) !!}">Editar</a></li>
                                    <li class="divider"></li>
                                    {{--<li>--}}
                                        {{--<a href="#deletetarUsuario"--}}
                                           {{--onclick="document.getElementById('#deletetarUsuario').submit();">Excluir</a>--}}
                                    {{--</li>--}}

                                    <li>
                                        <a href="#notificar" data-toggle="modal" data-target="#notificationModal">Notificar aluno</a>
                                    </li>
                                </ul>
                                <!-- Collapse Button -->
                                {{--<button type="button" class="btn btn-info btn-sm btn-flat" data-widget="collapse">--}}
                                {{--<i class="fa fa-minus"></i>--}}
                                {{--</button>--}}
                                {!! Form::open(['route' => ['alunos.destroy', $alunos->id], 'method' => 'delete', 'id' => 'deletetarUsuario']) !!}

                                {!! Form::close() !!}

                            </div>

                        </div>
                        <div class="box-title" style="overflow: hidden">
                            <img src="{{$alunos->foto_aluno == "avatarPadrao.jpg" ? asset('uploads/'.$alunos->foto_aluno):asset('uploads/avatars/'.$alunos->foto_aluno)}}"
                                 class="avatar img-radius pull-left"
                                 style="margin-right: 25px; width: 100px; border-radius: 4px">
                            <div style="overflow: hidden">
                                <h3 class="profile-name justificado">{!! $alunos->nome_aluno !!}</h3>
                            </div>
                            <span class="label label-info">ID {!! $alunos->tipoPessoa['nome'] !!}
                                : {!! $alunos->id !!}</span>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('alunos.show_fields')
                    </div>
                    <!-- /.box-body -->
                </div>


                <div class="box collapsed-box">
                    <div class="box-header with-border">
                        <div class="box-title" style="overflow: hidden">
                            <i class="fa fa-heartbeat"></i> Dados médicos
                        </div>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-toggle="modal" data-target="#editarHealthInformations">
                                <i class="glyphicon glyphicon-edit"></i>
                                Editar
                            </a>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>


                    </div>
                    <div class="box-body">
                        @include('alunos.healthInformations')
                    </div>
                    <div class="overlay" style="display:none;" id="loadingHealthInformations">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>


                <div class="box collapsed-box">
                    <div class="box-header with-border">

                        <div class="box-title" style="overflow: hidden">
                            <i class="fa fa-comment-o"></i> Notificações
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </div>

                    </div>
                    <div class="box-body">
                        @include('alunos.timeLineNotification')
                    </div>
                    <div class="overlay" style="display:none;" id="loadingHealthInformations">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                @include('alunos.docAluno')
                @include('alunos.responsavel')
                @include('alunos.yearClass')
                @include('alunos.presence')
                @include('alunos.studentDiary')
            </div>
        </div>

        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Adicionar responsáveis e Autorizados</h4>
                    </div>
                    {!! Form::open(['route' => ['alunos.updateResponsaveis', $alunos->id], 'id' => 'formularioResponsaveis']) !!}

                    <div class="modal-body">
                        <select name="responsavel" id="responsavel" class="form-control" required="required"></select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-doc-aluno" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Adicionar Documento</h4>
                    </div>
                    {!! Form::open(['route' => 'alunos.storeDoc', 'files' => true, 'id' => 'activitiesClass', 'data-toggle' => 'validator', 'autocomplete' => 'off']) !!}

                    <input type="hidden" name="alunos_id" value="{{ $alunos->id }}">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="doc_type">Tipo do documento</label>
                            <select name="type_doc" class="form-control mb-2 mr-sm-2 mb-sm-0" id="type_doc"
                                    required="required">
                                <option disabled="disabled" selected="selected">Tipo do documento</option>
                                @foreach($docType as $type)
                                    <option value="{{$type->id}}" {{old('type_doc') == $type->id ? 'selected="selected"':null}}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('attachedFile') ? ' has-error' : '' }}">
                            <label for="attachedFile" class="form-control-label">Anexar Documento:</label>
                            <input name="attachedFile" type="file" value="{{old('attachedFile')}}" required="required">
                            @if ($errors->has('attachedFileemail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('attachedFile') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>

    {{--Modal Notificação geral --}}

    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['route' => ['notification.aluno.new'],'id' => 'notificationModal', 'data-toggle' => 'validator', 'autocomplete' => 'off',  'method' => 'put']) !!}

            <input id="alunos_id" name="alunos_id" type="hidden" value="{{$alunos->id}}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleMakeCall">
                        <i class="fa fa-comment"></i> Notificar aluno
                    </h5>


                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Titulo:</label>
                                <input name="title" value="{{ old('title') }}" type="text" id="recipient-name"
                                       required="required"
                                       class="form-control" maxlength="220"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exibition" class="form-control-label">Expira em:</label>
                                <input name="exibition" value="{{ old('exibition') }}" type="text" id="exibitionDate"
                                       required="required" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exibition" class="form-control-label">Tipo de notificação:</label>

                                <select class="form-control" name="notification_type_id">
                                    @foreach($notificationType as $type)
                                        <option value="{{$type->id}}" {{$type->id == old('notification_type_id') ? 'selected':'' }} >{{$type->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <textarea name="description" id="notifictionMessage" class="trumbowyg-editor"
                              placeholder="Sua menssagem...">{{ old('description') }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="doneCall">Concluir</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="modal fade" id="studentDiaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 450px; ">
            {!! Form::open(['route' => 'diary.store', 'id' => 'callMakeForm', 'data-toggle' => 'validator', 'autocomplete' => 'off', 'class' => '']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleMakeCall"><i class="fa fa-book"></i> Diario do Aluno</h5>
                </div>

                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-sm-3 col-lg-3 col-form-label">Data</label>
                        <div class="col-sm-9 col-lg-9">
                            <input id="dateDiary" name="date" type="hidden" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                            <input id="userAuth" name="user_id" type="hidden" value="{{Auth()->user()->id}}">
                            <input id="idAluno" name="alunos_id" type="hidden" value="{{$alunos->id}}">
                            <p id="fakeDate" class="form-control-static">{{\Carbon\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>

                    <div class="form-inline row">
                        <label class="col-sm-3 col-lg-3 col-form-label">Atenção</label>
                        <div class="radio col-sm-9 col-lg-9">
                            <label style="margin-right: 10px;">
                                <input type="radio" id="atention1" name="flg_atention" value="1" required> Bom
                            </label>
                            <label style="margin-right: 10px;">
                                <input type="radio" id="atention2" name="flg_atention" value="2" required> Regular
                            </label>
                            <label style="margin-right: 10px;"s>
                                <input type="radio" id="atention3" name="flg_atention" value="3" required> Ruim
                            </label>
                        </div>
                    </div>

                    <div class="form-inline row">
                        <label class="col-sm-3 col-lg-3 col-form-label">Disciplina</label>
                        <div class="radio col-sm-9 col-lg-9">
                            <label style="margin-right: 10px;">
                                <input type="radio" id="discipline1" name="flg_discipline" value="1" required> Bom
                            </label>
                            <label style="margin-right: 10px;">
                                <input type="radio" id="discipline2" name="flg_discipline" value="2" required> Regular
                            </label>
                            <label style="margin-right: 10px;">
                                <input type="radio" id="discipline3" name="flg_discipline" value="3" required> Ruim
                            </label>
                        </div>
                    </div>
                    <div class="form-inline row">
                        <label class="col-sm-3 col-lg-3 col-form-label">Humor</label>
                        <div class="radio col-sm-9 col-lg-9">
                            <label style="margin-right: 10px;">
                                <input type="radio" id="humor1" name="flg_humor" value="1" required> Bom
                            </label>
                            <label style="margin-right: 10px;">
                                <input type="radio" id="humor2" name="flg_humor" value="2" required> Regular
                            </label>
                            <label style="margin-right: 10px;">
                                <input type="radio" id="humor3" name="flg_humor" value="3" required> Ruim
                            </label>
                        </div>
                    </div>

                    <div class="form-inline row">
                        <label class="col-sm-3 col-lg-3 col-form-label">Anotação</label>
                        <div class="textarea col-sm-9 col-lg-9">
                            <textarea name="description" id="diaryMessage" class="trumbowyg-editor"
                                      placeholder="Anotação do professor...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="doneCall">Concluir</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/alunos.js')}}"></script>
    <script src="{{asset('/js/features/notification.js')}}"></script>
    <script src="{{asset('js/plugins/trumbowyg.min.js')}}"></script>
    <script src="{{asset('js/plugins/pt_br.min.js')}}"></script>
@endsection