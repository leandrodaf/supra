@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Função
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                    {!! Form::open(['route' => 'management.store', 'autocomplete' => 'off']) !!}
                    @include('userManagement.fields')
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('management.index') !!}" class="btn btn-default">Cancel</a>
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