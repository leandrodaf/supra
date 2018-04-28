@extends('dash.aluno.layout.app')

@section('css')
@endsection

@section('content')
    <div class="tab-content">
        <div class="tab-pane active show" style="width: 650px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Departamento</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($notifciationPaginate as $notification)
                        <tr
                                data-html="true"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-content="{{$notification->description}}"
                                title="<b>{{$notification->title}}</b> - <small>{{$notification->created_at->format('d/m/Y')}}</small>">
                            <td>{{$notification->title}}</td>
                            <td class="text-center">
                                {{$notification->created_at->format('d/m/Y')}}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm" data-toggle="tooltip" data-original-title="{{$notification->type[0]->title}}">
                                    <i class="fa
                                {{$notification->type[0]->id == 1 ? 'fa-money':''}}
                                    {{$notification->type[0]->id == 2 ? 'fa-file-text-o':''}}
                                    {{$notification->type[0]->id == 3 ? 'fa-graduation-cap':''}}"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <br/>
            {{ $notifciationPaginate->links() }}
        </div>
    </div>
@endsection

@section('scripts')
@endsection