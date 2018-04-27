@extends('dash.aluno.layout.app')

@section('styles')
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane active show" style="width: 650px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sala</th>
                        <th class="text-center">Inicia</th>
                        <th class="text-center">Encerra</th>
                        <th class="text-center">Professor</th>
                        <th class="text-center">Matéria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($turmasPaginate as $turma)
                        <tr class="{{$turma['lockStatus'] > 0 ? 'table-light': 'table-danger'}}">
                            <td>{{$turma['sala']}}</td>
                            <td class="text-center">{{$turma['inicia']}}</td>
                            <td class="text-center">{{$turma['encerra']}}</td>
                            <td class="text-center">{{$turma['professor']}}</td>
                            <td class="text-center">{{$turma['materia']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $turmasPaginate->links() }}
            <br/>
        </div>
    </div>
@endsection

@section('scripts')
@endsection