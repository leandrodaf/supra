<?php

use Illuminate\Http\Request;

Route::middleware(['auth:api'])->group(function () {

    Route::get('/aluno', 'API\AlunosController@aluno');
    Route::get('/aluno/atividade', 'API\AlunosController@atividade');
    Route::get('/aluno/turma', 'API\AlunosController@turma');
    Route::get('/aluno/mensagem', 'API\AlunosController@mensagem');
    Route::get('/aluno/diario', 'API\AlunosController@diario');

});