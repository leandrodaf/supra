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
                                    <li><a href="{!! route('pessoas.edit', [$pessoa->id]) !!}">Editar</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#deletetarUsuario"
                                           onclick="document.getElementById('#deletetarUsuario').submit();">Excluir</a>
                                    </li>
                                </ul>


                                {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete', 'id' => 'deletetarUsuario']) !!}

                                {!! Form::close() !!}

                            </div>

                        </div>
                        <div class="box-title" style="overflow: hidden">
                            <img src="{{Gravatar::get($pessoa->mainEmail() != true ? "no-replay@gmail.com":$pessoa->mainEmail()->email, 'default')}}"
                                 class="avatar img-radius pull-left"
                                 style="margin-right: 25px; width: 100px; border-radius: 4px">
                            <div style="overflow: hidden">
                                <h3 class="profile-name justificado">{!! $pessoa->nome !!}</h3> <span
                                        class="label label-info label-bs"> {!! $pessoa->tipoPessoa['nome'] !!}</span>

                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('pessoas.show_fields')
                    </div>
                </div>
                @if($pessoa->tipoPessoa['id'] == 4 )
                    @include('pessoas.healthInformations')
                @endif

                <div class="box collapsed-box">
                    <div class="box-header with-border">
                        <div class="box-title" style="overflow: hidden">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Endereços
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                    </div>
                    <div class="box-body">
                        @include('pessoas.address')
                    </div>
                    <div class="overlay" style="display:none;" id="loadingHealthInformations">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                @if($pessoa->tipoPessoa['id'] == 2 || $pessoa->tipoPessoa['id'] == 3)
                    @include('pessoas.student')
                @endif

                @if($pessoa->tipoPessoa['id'] == 4)
                    @include('pessoas.teatcher')
                @endif

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/pessoas.js')}}"></script>
@endsection