@extends('layouts.app')

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
                    {!! Form::open(['route' => 'pessoas.store', 'id' => 'criarPessoa']) !!}

                    @include('pessoas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/pessoas.js')}}"></script>
@endsection