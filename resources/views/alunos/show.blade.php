@extends('layouts.app')

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
                                    <li>
                                        <a href="#deletetarUsuario"
                                           onclick="document.getElementById('#deletetarUsuario').submit();">Excluir</a>
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


                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                        </div>
                        <div class="box-title" style="overflow: hidden">
                            <i class="fa fa-heartbeat"></i> Dados médicos
                        </div>
                        <div class="box-tools pull-right">
                            <a class="btn btn-box-tool" data-toggle="modal" data-target="#editarHealthInformations">
                                <i class="glyphicon glyphicon-edit"></i>
                                Editar
                            </a>
                        </div>

                    </div>
                    <div class="box-body">
                        @include('alunos.healthInformations')
                    </div>
                    <div class="overlay" style="display:none;" id="loadingHealthInformations">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                @include('alunos.responsavel')
                @include('alunos.yearClass')
                @include('alunos.presence')
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
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/alunos.js')}}"></script>
@endsection