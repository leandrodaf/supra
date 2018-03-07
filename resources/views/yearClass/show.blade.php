@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <div class="btn-group">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample">
                                    Adicionar Aluno
                                </a>
                            </div>
                        </div>
                        Alunos
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="collapse" id="collapseExample">
                                <div class="card card-block">
                                    <div class="col-lg-10">
                                        <select name="aluno" id="aluno" class="form-control"
                                                required="required"></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary">Incluir aluno</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-body">


                        @include('yearClass.alunos_table')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('yearClass.teacher')

            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{asset('/js/features/yearClass.js')}}"></script>
@endsection