@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alunos
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
            <li><a href="#" class="active">Alunos</a></li>
            <li><a class="active"></a> {!! $alunos->nome_aluno !!}</li>
        </ol>

    </section>
    <div class="content">
        <div class="row">
            <div class="col-lg-8">

                <div class="box">
                    <div class="box-header with-border">

                        <div class="box-title" style="overflow: hidden">
                            <img src="http://www.gravatar.com/avatar/54c9108a293a39f6aba80e203ee7b1f0?d=mm&amp;s=100"
                                 class="avatar img-radius pull-left"
                                 style="margin-right: 25px; width: 100px; border-radius: 4px">
                            <div style="overflow: hidden">
                                <h3 class="profile-name justificado">TESTE - Pansutti</h3>
                                <small>
                                    &nbsp;ID {!! $alunos->id !!}
                                    <div class="profile-brief muted">{!! $alunos->tipoPessoa['nome'] !!}</div>
                                </small>
                            </div>
                        </div>

                        <div class="box-tools pull-right">
                            <!-- Collapse Button -->

                            <a href="{!! route('alunos.index') !!}" class="btn btn-box-tool">
                                <i class="fa  fa-long-arrow-left"></i>

                            </a>

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('alunos.show_fields')
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Responsáveis</h3>
                        <div class="box-tools pull-right">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('alunos.responsaveis')
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script src="{{asset('/js/features/alunos.js')}}"></script>
@endsection