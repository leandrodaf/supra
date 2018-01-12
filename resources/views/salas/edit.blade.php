@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sala
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sala, ['route' => ['salas.update', $sala->id], 'method' => 'patch']) !!}

                        @include('salas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection