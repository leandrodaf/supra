@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Email
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($email, ['route' => ['emails.update', $email->id], 'method' => 'patch']) !!}

                        @include('emails.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection