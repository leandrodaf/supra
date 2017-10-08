@extends('layouts/boxed_fixed_header')

{{-- Page title --}}

@section('title') SUPRA @stop

{{-- local styles --}}

@section('header_styles')

@stop

{{-- Page Header--}}

@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('index')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li> Layouts</li>
            <li class="active">
                Dashboard
            </li>
        </ol>
    </section>
@stop {{-- Page content --}} @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="outer">
                Você esta logado
                <!-- /.inner -->
            </div>
        </div>

    </div>
@stop
{{-- local scripts --}}
@section('footer_scripts')

@stop
