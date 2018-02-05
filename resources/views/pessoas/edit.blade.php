@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="tipo-user"  content="{{$pessoa->tipo_pessoas_id}}"/>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Pessoa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pessoa, ['route' => ['pessoas.update', $pessoa->id], 'method' => 'patch']) !!}

                        @include('pessoas.fields')

                   <div class="form-group col-sm-12">
                       {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('pessoas.index') !!}" class="btn btn-default">Cancel</a>
                   </div>

                   {!! Form::close() !!}
                   @if(!empty($pessoa->email))
                       <!-- lista de emails -->
                           @foreach($pessoa->email->toArray() as $email)
                               {!! Form::open(['route' => ['emails.destroy', $email['id']], 'method' => 'delete', 'id' => "#deletar-email-".$email['id']]) !!}
                               {!! Form::close() !!}

                               {!! Form::open(['route' => ['pessoa.emailMain', 'idPessoa' => $pessoa->id, 'idEmail'=> $email['id']], 'method' => 'post', 'id' => "#emailMain-".$email['id']]) !!}
                               {!! Form::close() !!}
                           @endforeach
                       @endif

                   @if(!empty($pessoa->phone))
                   <!-- Formularios remover Phones -->
                       @foreach($pessoa->phone->toArray() as $phone)
                           {!! Form::open(['route' => ['phones.destroy', $phone['id']], 'method' => 'delete', 'id' => "#deletar-phone-".$phone['id']]) !!}
                           {!! Form::close() !!}
                       @endforeach
                   @endif
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script src="{{asset('js/plugins/jquery.cpfcnpj.min.js')}}"></script>
    <script src="{{asset('/js/features/pessoas.js')}}"></script>
@endsection