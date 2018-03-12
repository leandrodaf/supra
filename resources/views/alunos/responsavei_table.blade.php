@if(count($alunos->pessoa->toArray()) != 0)
    <ul class="nav nav-stacked">
        <table class="table table-condensed table-responsive">
            <tbody>
            @foreach($alunos->pessoa as $responsavel)

                <tr>
                    <td>
                        <a onclick="document.getElementById({!! "'#desvincular-".$responsavel->id."'" !!}).submit();">
                            <i class="fa fa-plug" data-toggle="tooltip" title="Desvincular"></i>
                        </a>
                    </td>
                    <td class="verInfo" id="{{$responsavel->id}}" data-toggle="modal" data-target="#detalhes">
                        <span class="informacoesTitulo" style="cursor:pointer;" data-placement="top"
                              title="Clique para ver o perfil de {{$responsavel->nome}}">{{$responsavel->nome}}</span>
                    </td>
                    <td>
                        @if($responsavel->tipoPessoa['id'] == 2)
                            <span class="pull-right badge bg-blue">Responsável</span>
                        @elseif($responsavel->tipoPessoa['id'] == 3)
                            <span class="pull-right badge bg-blue">Autorizado</span>
                        @endif
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </ul>

@else
    <h4 class="text-center">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            Atribua um responsável!
        </button>
    </h4>
@endif


@if(!$alunos->pessoa->isEmpty())
    <!-- lista de emails -->
    @foreach($alunos->pessoa->toArray() as $responsavel)
        {!! Form::open(['route' => ['alunos.desvincularAluno', $responsavel['id']], 'id' => "#desvincular-".$responsavel['id']]) !!}
        {{ Form::hidden('id', $alunos->id) }}
        {!! Form::close() !!}
    @endforeach
@endif


<!-- Modal -->
<div id="detalhes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Informações do responsável</h4>
            </div>

            <div class="modal-body">
                <div id="loadingResponsavel" class="overlay" style="display:none;">
                    <div class="fa fa-refresh fa-spin"></div>
                </div>

                <dl class="dl-horizontal">
                    <dt>Nome:</dt>
                    <dd id="nomedynamic"></dd>

                    <dt>CPF:</dt>
                    <dd id="cpfdynamic"></dd>

                    <dt>Nascimento:</dt>
                    <dd id="dataNascimentodynamic"></dd>

                    <dt>RG:</dt>
                    <dd id="rgdynamic"></dd>

                    <dt>Status</dt>
                    <dd id="statusdynamic"></dd>

                    <dt>Nacionalidade</dt>
                    <dd id="citizenshipdynamic"></dd>

                    <dt>Estado civil</dt>
                    <dd id="familySituationdynamic"></dd>
                </dl>

                <div class="text-center">
                    <a id="redirectdynamic"> Ver perfil completo</a>
                </div>
            </div>
        </div>

    </div>
</div>