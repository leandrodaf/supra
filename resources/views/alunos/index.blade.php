@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Alunos</h1>
        @if(Auth::user()->hasRole('secretaria') || Auth::user()->hasRole('admin'))
            <h1 class="pull-right">
                {{--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"--}}
                {{--href="{!! route('alunos.create') !!}">Novo Aluno</a>--}}
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                   href="{!! route('matricula.index') !!}">Criar matricula</a>
            </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body " tabindex="1">
                @include('alunos.table')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/alunos.js')}}"></script>
@endsection