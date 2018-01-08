@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Materia
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($materia, ['route' => ['materias.update', $materia->id], 'method' => 'patch']) !!}

                        @include('materias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection