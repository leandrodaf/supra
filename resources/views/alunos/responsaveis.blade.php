@if(!empty($alunos->pessoa))

    @foreach($alunos->pessoa as $responsavel)
        {{$responsavel->nome}}
        @if($responsavel->pivot->flg_autorizado)
            <span class="label label-primary pull-right">Autorizado</span>
        @elseif($responsavel->pivot->flg_principal)
            <span class="label label-primary pull-right">Responsável</span>
        @endif
    @endforeach

@else
    <h4 class="text-center">
        Atribua um responsável ao aluno
    </h4>
@endif