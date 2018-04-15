@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Arquivos</h1>
        <h1 class="pull-right">
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body " tabindex="1">
                @include('fileEntrys.table')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/fileentry.js')}}"></script>
@endsection