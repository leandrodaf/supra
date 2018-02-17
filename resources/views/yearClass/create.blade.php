@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turma
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                    {!! Form::open(['route' => 'class.store', 'autocomplete' => 'off']) !!}
                    @include('yearClass.fields')
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('class.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/yearClass.js')}}"></script>
@endsection