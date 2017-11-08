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
                {!! Form::close() !!}
                @if(!empty($alunos->email))
                    <!-- lista de emails -->
                    @foreach($alunos->email->toArray() as $email)
                        {!! Form::open(['route' => ['emails.destroy', $email['id']], 'method' => 'delete', 'id' => "#deletar-".$email['id']]) !!}
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