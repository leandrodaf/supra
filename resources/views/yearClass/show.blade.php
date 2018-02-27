@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <section class="content-header">

    </section>
    <div class="contnt">
        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">

                            <div class="btn-group">


                            </div>

                        </div>
                        <div class="box-title" style="overflow: hidden">
                            @include('yearClass.header')

                        </div>
                    </div>
                    <div class="box-body">


                    </div>
                </div>


            </div>
            <div class="col-lg-4">


            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/pessoas.js')}}"></script>
@endsection