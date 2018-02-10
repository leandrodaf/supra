@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    {!! Form::model($user, ['route' => ['management.update', $user->id], 'method' => 'patch']) !!}

                    @include('userManagement.fields')

                    <div class="form-group col-sm-12">
                        {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                        <a href="{{route('management.show', $user->id)}}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/management.js')}}"></script>
@endsection