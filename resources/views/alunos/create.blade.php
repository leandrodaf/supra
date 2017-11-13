@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Alunos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                    {!! Form::open(['route' => 'alunos.store', 'files' => true, 'id' => 'formularioAlunos', 'data-toggle' => 'validator']) !!}

                    @include('alunos.fields')



                    <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit(!empty($alunos) ? 'Atualizar aluno':'Criar aluno', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('alunos.index') !!}" class="btn btn-default">Cancelar</a>
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
