@extends('dash.aluno.layout.app')

@section('css')
    <style type="text/css">
        .popover {
            padding: 0 !important;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2) !important;
            max-width: 500px !important;
        }

        .text-green {
            color: #00a65a !important;
            size: 15px;
        }

        .text-red {
            color: #dd4b39 !important;
        }

        .text-yellow {
            color: #f39c12 !important;
        }
    </style>
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane active show" style="width: 650px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th class="text-center">Atenção</th>
                        <th class="text-center">Disciplina</th>
                        <th class="text-center">Humor</th>
                        <th class="text-center">Responsável</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($diarioPaginate as $diary)
                        <tr
                                data-html="true"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-content="{{$diary->description}}"
                                title="<small><b>Data: {{$diary->date->format('d/m/Y')}}</b></small> - {{strlen($diary->user->get(0)->pessoa->nome) >17 ? substr($diary->user->get(0)->pessoa->nome, 0, 17). '...':$diary->user->get(0)->pessoa->nome}}">
                            <td class="text-center">{{$diary->date->format('d/m/Y')}}</td>
                            <td class="text-center">
                                @if($diary->flg_atention == 1)
                                    <i class="fa fa-smile-o text-green fa-2x"></i>
                                @elseif($diary->flg_atention == 2)
                                    <i class="fa fa-meh-o text-yellow fa-2x"></i>
                                @elseif($diary->flg_atention == 3)
                                    <i class="fa fa-frown-o text-red fa-2x"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($diary->flg_discipline == 1)
                                    <i class="fa fa-smile-o text-green fa-2x"></i>
                                @elseif($diary->flg_discipline == 2)
                                    <i class="fa fa-meh-o text-yellow fa-2x"></i>
                                @elseif($diary->flg_discipline == 3)
                                    <i class="fa fa-frown-o text-red fa-2x"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($diary->flg_humor == 1)
                                    <i class="fa fa-smile-o text-green fa-2x"></i>
                                @elseif($diary->flg_humor == 2)
                                    <i class="fa fa-meh-o text-yellow fa-2x"></i>
                                @elseif($diary->flg_humor == 3)
                                    <i class="fa fa-frown-o text-yellow fa-2x"></i>
                                @endif
                            </td>
                            <td class="text-center">{{$diary->user->get(0)->pessoa->nome}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $diarioPaginate->links() }}
            <br/>
        </div>
    </div>
@endsection

@section('scripts')
@endsection