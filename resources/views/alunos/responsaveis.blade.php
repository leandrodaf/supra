@if(!count($alunos->pessoa->toArray()) < 1)
    <ul class="nav nav-stacked">

        @foreach($alunos->pessoa as $responsavel)
            <table class="table table-condensed">
                <tbody>

                <tr>
                    <td>
                        <a onclick="document.getElementById({!! "'#desvincular-".$responsavel->id."'" !!}).submit();">
                            <i class="fa fa-plug" data-toggle="tooltip" title="Desvincular"></i>
                        </a>
                    </td>
                    <td>
                        {{$responsavel->nome}}
                    </td>
                    <td>
                        @if($responsavel->pivot->flg_autorizado)
                            <span class="pull-right badge bg-blue">Autorizado</span>
                        @elseif($responsavel->pivot->flg_principal)
                            <span class="pull-right badge bg-blue">Responsável</span>
                        @endif
                    </td>
                </tr>

                </tbody>
            </table>



        @endforeach
    </ul>

@else
    <h4 class="text-center">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            Atribua um responsável!
        </button>
    </h4>
@endif


@if(!empty($alunos->pessoa ))
    <!-- lista de emails -->
    @foreach($alunos->pessoa->toArray() as $responsavel)
        {!! Form::open(['route' => ['alunos.desvincularAluno', $responsavel['id']], 'id' => "#desvincular-".$responsavel['id']]) !!}
        {{ Form::hidden('id', $alunos->id) }}
        {!! Form::close() !!}
    @endforeach
@endif