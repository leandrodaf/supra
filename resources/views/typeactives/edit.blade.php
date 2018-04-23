@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo de Ativo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeactive, ['route' => ['typeactives.update', $typeactive->id], 'method' => 'patch']) !!}

                        @include('typeactives.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection