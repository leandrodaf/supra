@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="id-user" content="{{$user->id}}">
@endsection

@section('content')
    <section class="content-header">

    </section>
    <div class="contnt">
        <div class="row">
            <div class="col-lg-4">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-black"
                         style="background: url('https://picsum.photos/g/360/218/?random') center center;">
                        <h3 class="widget-user-username">{{$user->name}}</h3>
                        <h5 class="widget-user-desc">{{$user->pessoa->tipoPessoa->nome}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle"
                             src="{{Gravatar::get($user->email != true ? "no-replay@gmail.com":$user->email, 'default')}}"
                             alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <span class="btn btn-block btn-success btn-sm" data-toggle="modal"
                                          data-target="#modal-senha">
                                        <span class="fa fa-key"></span> Alterar senha</span>
                                </div>
                            </div>
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <span class="btn btn-block btn-default btn-sm">
                                        <span class="fa fa-edit"></span> Editar
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <div class="box box-primary direct-chat direct-chat-primary">
                {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">Removable</h3>--}}

                {{--<div class="box-tools pull-right">--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                {{--</div>--}}
                {{--<!-- /.box-tools -->--}}
                {{--</div>--}}
                <!-- /.box-header -->
                    <div class="box-body">
                        The body of the boxlalala
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
    </div>


    <div class="modal fade" id="modal-senha" style="display: none;">
        <div class="modal-dialog" style="  width: 300px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 id="modalTitle" class="modal-title">
                        Alterar senha
                    </h4>
                </div>

                <div class="modal-body">
                    <form id="resetSenha" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="passwordchose">Senha</label>
                            <input id="passwordchose" type="password" class="form-control" placeholder="Senha" required="required"/>

                            <label for="password_again">Repetir Senha</label>
                            <input class="form-control" id="password_again" name="password_again"
                                   placeholder="Repetir senha" type="password" required="required"/>
                        </div>

                        <div class="form-group">
                            <input id="btnReset" type="button" value="Salvar" class="btn btn-block btn-success btn-sm btnReset">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="{{asset('/js/features/management.js')}}"></script>
@endsection