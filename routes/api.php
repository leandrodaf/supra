<?php

use Illuminate\Http\Request;

Route::middleware(['auth:api'])->group(function () {

    Route::get('/aluno', function (Request $request) {
        $aluno = \App\Models\Alunos::find($request->user()->alunos_id);
        return response()->json($aluno, 200);
    });

    Route::get('/aluno/atividades', function (Request $request) {
        $aluno = \App\Models\Alunos::find($request->user()->alunos_id);
        $activities = $aluno->getActivitiesByAluno($aluno);
        return response()->json($activities, 200);
    });

    Route::get('/aluno/turmas', function (Request $request) {
        $aluno = \App\Models\Alunos::find($request->user()->alunos_id);
        $turmas = $aluno->getTurmaByIdAluno($aluno);
        return response()->json($turmas, 200);
    });

    Route::get('/aluno/mensagens', function (Request $request) {
        $aluno = \App\Models\Alunos::find($request->user()->alunos_id);
        $notifications = $aluno->notification()->whereBetween('created_at', [\Carbon\Carbon::today()->subDays(15), \Carbon\Carbon::today()->addDays(20)])->orderBy('created_at', 'asc')->get();
        return response()->json($notifications, 200);
    });

    Route::get('/aluno/diarios', function (Request $request) {
        $aluno = \App\Models\Alunos::find($request->user()->alunos_id);
        $diarios = $aluno->diairy()->take(5)->get();
        return response()->json($diarios, 200);
    });

});