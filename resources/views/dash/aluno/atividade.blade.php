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
                        <th>Titulo</th>
                        <th class="text-center">Abertura</th>
                        <th class="text-center">Encerra</th>
                        <th class="text-center">Encerra em</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($atividadespaginate as $atividade)
                        <tr data-toggle="popover" data-placement="left" title=""
                            data-content="{{$atividade->description}}"
                            data-container="body" data-original-title="{{$atividade->title}}"
                            style="cursor: pointer;">

                            <td>{{$atividade->title}}</td>
                            <td class="text-center">{{$atividade->start_date}}</td>
                            <td class="text-center">{{$atividade->end_date}}</td>
                            <td class="text-center">{{$atividade->encerra < 1 ? 'Encerrado': $atividade->encerra . " Dias P/Encerrar"}}</td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
            {{ $atividadespaginate->links() }}
            <br/>
        </div>
    </div>
@endsection

@section('scripts')
@endsection