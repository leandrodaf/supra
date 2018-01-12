@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Diciplina
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($schoolSubject, ['route' => ['schoolsubject.update', $schoolSubject->id], 'method' => 'patch']) !!}

                        @include('schoolsubject.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection