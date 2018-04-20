@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <section class="content">
    <info-box></info-box>
        <!-- Info boxes -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <info-class :title="'Turmas'"></info-class>
            </div>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <year-class :title="'Situação de turmas'"></year-class>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
        
        </div>

    </section>
@endsection

@section('scripts')
@endsection