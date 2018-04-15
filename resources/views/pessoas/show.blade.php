@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="id" content="{{ $pessoa->id }}">
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
                @include('pessoas.docPessoa')

                @if($pessoa->tipoPessoa['id'] == 2 || $pessoa->tipoPessoa['id'] == 3)
                    @include('pessoas.student')
                @endif
                @if($pessoa->tipoPessoa['id'] == 4 && \App\Helpers\Helpers::canRole(array_pluck($pessoa->departments->toArray(), 'nome'), ['Departamento acadêmico']))
                    @include('pessoas.teatcher')
                    @include('pessoas.yearClass')
                @endif
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-doc-pessoa" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Adicionar Documento</h4>
                </div>
                {!! Form::open(['route' => 'pessoa.storeDoc', 'files' => true, 'id' => 'activitiesClass', 'data-toggle' => 'validator', 'autocomplete' => 'off']) !!}

                <input type="hidden" name="pessoa_id" value="{{ $pessoa->id }}">

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

@endsection

@section('scripts')
    <script src="{{asset('/js/features/pessoas.js')}}"></script>
@endsection