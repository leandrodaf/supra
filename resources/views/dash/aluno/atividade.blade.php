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
                            {{--<td class="td-actions text-right">--}}
                            {{--<button type="button" rel="tooltip" class="btn btn-info btn-just-icon btn-sm"--}}
                            {{--data-original-title="" title="">--}}
                            {{--<i class="material-icons">person</i>--}}
                            {{--</button>--}}
                            {{--<button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm"--}}
                            {{--data-original-title="" title="">--}}
                            {{--<i class="material-icons">edit</i>--}}
                            {{--</button>--}}
                            {{--<button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"--}}
                            {{--data-original-title="" title="">--}}
                            {{--<i class="material-icons">close</i>--}}
                            {{--</button>--}}

                            {{--</td>--}}
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
            {{--<div class="pagination-area">--}}
                {{--<ul class="pagination justify-content-center text-center">--}}
                    {{--<li class="page-item">--}}
                        {{--<a href="#pablo" class="page-link">«</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-item">--}}
                        {{--<a href="#pablo" class="page-link">1</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-item">--}}
                        {{--<a href="#pablo" class="page-link">2<div class="ripple-container"></div></a>--}}
                    {{--</li>--}}
                    {{--<li class="active page-item">--}}
                        {{--<a href="#pablo" class="page-link">3</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-item">--}}
                        {{--<a href="#pablo" class="page-link">4</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-item">--}}
                        {{--<a href="#pablo" class="page-link">5</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-item">--}}
                        {{--<a href="#pablo" class="page-link">»</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{ $atividadespaginate->links() }}
            <br/>
        </div>
    </div>
@endsection

@section('scripts')
@endsection