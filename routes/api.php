<?php

use Illuminate\Http\Request;

Route::middleware(['auth:api'])->group(function () {

    Route::get('/aluno', 'AlunosController@aluno');
    Route::get('/aluno/atividade', 'AlunosController@atividade');
    Route::get('/aluno/turma', 'AlunosController@turma');
    Route::get('/aluno/mensagem', 'AlunosController@mensagem');
    Route::get('/aluno/diario', 'AlunosController@diario');

});