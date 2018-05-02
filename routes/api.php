<?php

use Illuminate\Http\Request;

Route::middleware(['auth:api'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::get('/aluno', 'AlunosController@aluno');
    Route::get('/alunos/atividade', 'AlunosController@atividade');
    Route::get('/alunos/turma', 'AlunosController@turma');
    Route::get('/alunos/mensagem', 'AlunosController@mensagem');
    Route::get('/alunos/diario', 'AlunosController@diario');

});