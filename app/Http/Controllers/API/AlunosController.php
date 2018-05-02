<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use http\Env\Request;

class AlunosController extends Controller
{

    public function aluno(Request $request)
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);

        return response()->json($aluno, 200);
    }

    public function atividade(Request $request)
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);
        $activities = $aluno->getActivitiesByAluno($aluno);

        return response()->json($activities, 200);
    }

    public function turma(Request $request)
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);
        $turmas = $aluno->getTurmaByIdAluno($aluno);

        return response()->json($turmas, 200);
    }

    public function mensagem(Request $request)
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);

        $notifications = $aluno->notification()->whereBetween('created_at', [\Carbon\Carbon::today()->subDays(15), \Carbon\Carbon::today()->addDays(20)])->orderBy('created_at', 'asc')->get();

        return response()->json($notifications, 200);
    }

    public function diario(Request $request)
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);

        $diarios = $aluno->diairy()->take(5)->get();

        return response()->json($diarios, 200);
    }
}
