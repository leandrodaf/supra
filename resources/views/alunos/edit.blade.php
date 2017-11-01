@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alunos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($alunos, ['route' => ['alunos.update', $alunos->id], 'method' => 'patch']) !!}

                        @include('alunos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/alunos.js')}}"></script>
@endsection