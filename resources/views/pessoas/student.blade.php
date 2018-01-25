<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Alunos Vinculados</h3>
        <div class="box-tools pull-right">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(count($pessoa->alunos->toArray()) != 0)
            <ul class="nav nav-stacked">
                <table class="table table-condensed">
                    <tbody>
                    @foreach($pessoa->alunos as $aluno)

                        <tr>
                            <td>
                                <a onclick="document.getElementById({!! "'#desvincular-".$aluno->id."'" !!}).submit();">
                                    <i class="fa fa-plug" data-toggle="tooltip" title="Desvincular"></i>
                                </a>
                            </td>
                            <td class="verInfo" id="{{$aluno->id}}" data-toggle="modal" data-target="#detalhes">
                                <span class="informacoesTitulo" data-toggle="tooltip" style="cursor:pointer;"
                                      data-placement="top"
                                      title="Clique para ver o perfil de {{$aluno->nome_aluno}}">{{$aluno->nome_aluno}}</span>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </ul>

        @else
            <h4 class="text-center">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Não há alunos vinculados!
                </button>
            </h4>
        @endif
    </div>
    <!-- /.box-body -->
</div>


<div id="detalhes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Informações do aluno</h4>
            </div>

            <div class="modal-body">
                <div id="loadingResponsavel" class="overlay" style="display:none;">
                    <div class="fa fa-refresh fa-spin"></div>
                </div>

                <dl class="dl-horizontal">
                    <dt>Nome:</dt>
                    <dd id="nomedynamic"></dd>

                    <dt>Nascimento:</dt>
                    <dd id="dataNascimentodynamic"></dd>

                    <dt>Sexo:</dt>
                    <dd id="sexodynamic"></dd>

                    <dt>RG:</dt>
                    <dd id="rgdynamic"></dd>
                </dl>

                <div class="text-center">
                    <a id="redirectdynamic"> Ver perfil completo</a>
                </div>
            </div>
        </div>

    </div>
</div>