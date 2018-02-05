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
                    {!! Form::model($alunos, ['route' => ['alunos.update', $alunos->id], 'files' => true, 'method' => 'patch', 'id' => 'formularioAlunos', 'data-toggle' => 'validator']) !!}
                    @include('alunos.fields')
                    <div class="form-group col-sm-12">
                        {!! Form::submit(!empty($alunos) ? 'Atualizar aluno':'Criar aluno', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('alunos.index') !!}" class="btn btn-default">Cancelar</a>
                    </div>
                    {!! Form::close() !!}
                    @if(!empty($alunos->email))
                    <!-- lFormulário remover Emails -->
                        @foreach($alunos->email->toArray() as $email)
                            {!! Form::open(['route' => ['emails.destroy', $email['id']], 'method' => 'delete', 'id' => "#deletar-email-".$email['id']]) !!}
                            {!! Form::close() !!}
                        @endforeach
                    @endif

                    @if(!empty($alunos->phone))
                    <!-- Formularios remover Phones -->
                        @foreach($alunos->phone->toArray() as $phone)
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
    <script src="{{asset('/js/features/alunos.js')}}"></script>
@endsection