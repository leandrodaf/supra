@extends('dash.aluno.layout.app')

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card card-signup">
                <h2 class="card-title text-center">Acesso</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="info info-horizontal">
                                <div class="icon icon-rose">
                                    <i class="material-icons">blur_on</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Sobre nós</h4>
                                    <p class="description">
                                        Somos uma escola focada em educação infantil, localizada numa travessa da Av. Barreira Grande.
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">toys</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Programas</h4>
                                    <p class="description">
                                        Programas Venha conhecer nossos programas de aprendizagem e tudo que disponibilizamos para a boa educação de nossas crianças.
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">photo</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Galeria</h4>
                                    <p class="description">
                                        Entre para ver nossa galeria de fotos, aqui sempre postamos imagens dos nossos eventos e momentos especiais.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mr-auto">

                            <form class="form" method="post" action="{{ url('aluno/login') }}">
                                {!! csrf_field() !!}
                                <div class="form-group {{ $errors->has('email') ? ' has-danger bmd-form-group' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons {{ $errors->has('email') ? ' text-danger' : '' }}">mail</i>
                                                    </span>
                                        </div>

                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                                               placeholder="E-mail...">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-danger bmd-form-group' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons {{ $errors->has('email') ? ' text-danger' : '' }}">lock_outline</i>
                                                    </span>
                                        </div>
                                        <input name="password" type="password" placeholder="Senha..."
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-check" style="padding: 20px 0px 0px 22px;">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" checked name="remember">
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        Manter logado

                                    </label>
                                </div>
                                <div class="text-center" style="margin: 10% 0px 0px 0px;">
                                    <button type="submit" class="btn btn-primary btn-round">Acessar o painel</button>

                                </div>

                                <p class="text-danger text-center" style="margin-top: 15px;">
                                    <strong>{{ $errors->first('email') }}</strong><br/>
                                    <strong>{{ $errors->first('password') }}</strong>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection