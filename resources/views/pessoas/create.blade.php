@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }
        .error { border-color: #F70202 }

    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Pessoa
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pessoas.store', 'id' => 'criarPessoa', 'autocomplete' => 'off']) !!}

                    @include('pessoas.fields')
                    <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('pessoas.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/plugins/jquery.cpfcnpj.min.js')}}"></script>
    <script src="{{asset('/js/features/pessoas.js')}}"></script>
@endsection