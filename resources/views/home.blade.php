@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <style>
        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }

        .error {
            border-color: #F70202
        }

    </style>
@endsection

@section('content')
    <section class="content-header">
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-12 col-md-6">

                        @include('messages.table')

                    </div>

                </div>

            </div>

        </div>
        

        

        <div class="clearfix"></div>
    
    </div>



@endsection



@section('scripts')
    <script src="{{asset('js/plugins/jquery.cpfcnpj.min.js')}}"></script>
    <script src="{{asset('/js/features/recados.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/locale/pt-br.js"></script> -->
    <script src="{{asset('/js/features/matricula.js')}}"></script>
    
    
    
@endsection
