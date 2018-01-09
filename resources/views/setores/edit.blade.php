@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Setor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($setor, ['route' => ['setores.update', $setor->id], 'method' => 'patch']) !!}

                        @include('setores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection