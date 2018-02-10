<?php

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('alunos/getBasicData', 'AlunosController@getBasicData')->name('alunos.getBasicData');
Route::get('alunos/getInfoUser/{idAluno}', 'AlunosController@getInfoUser')->name('alunos.getInfoUser');
Route::post('alunos/emailMain', 'AlunosController@mainEmailAlunoAjax')->name('alunos.emailMain');
Route::post('alunos/responsaveis/{responsavel}', 'AlunosController@updateResponsaveis')->name('alunos.updateResponsaveis');
Route::post('alunos/responsaveis/{responsavel}/desvincular', 'AlunosController@desvincularAluno')->name('alunos.desvincularAluno');
Route::post('alunos/phoneMain', 'AlunosController@mainPhoneAlunosAjax')->name('alunos.phoneMain');

Route::get('pessoas/getBasicData', 'PessoaController@getBasicData')->name('pessoas.getBasicData');
Route::get('pessoas/getInfoUser/{idPessoa}', 'PessoaController@getInfoUser')->name('pessoas.getInfoUser');
Route::get('pessoas/getAjax', 'PessoaController@dataAjax')->name('pessoas.getAjaxSelect2');
Route::get('pessoas/funcionario', 'PessoaController@dataAjaxPessoa')->name('pessoas.getFuncionarioAjaxSelect2');
Route::post('pessoas/emailMain', 'PessoaController@mainEmailPessoaAjax')->name('pessoa.emailMain');
Route::post('pessoas/phoneMain', 'PessoaController@mainPhonePessoaAjax')->name('pessoa.phoneMain');
Route::post('pessoas/storeAjax', 'PessoaController@storeAjax')->name('pessoa.storeAjax');

Route::get('matricula', 'MatriculaController@index')->name('matricula.index');
Route::get('roles/getAjax', 'RoleController@dataAjax')->name('roles.getAjaxSelect2');
Route::post('matricula', 'MatriculaController@store')->name('matricula.store');

Route::get('departments/getAjax', 'DepartmentController@dataAjax')->name('departments.getAjaxSelect2');

Route::get('management/getBasicData', 'UserManagementController@getBasicData')->name('management.getBasicData');
Route::post('management/resetSenha/{id}', 'UserManagementController@resetSenha')->name('management.resetSenha');


Route::resource('alunos', 'AlunosController');
Route::resource('pessoas', 'PessoaController');
Route::resource('emails', 'EmailController');
Route::resource('phones', 'PhoneController');
Route::resource('healthInformations', 'HealthInformationsController');
Route::resource('roles', 'RoleController');
Route::resource('departments', 'DepartmentController');
Route::resource('management', 'UserManagementController');
Route::resource('classrooms', 'ClassroomController');
Route::resource('schoolsubject', 'SchoolSubjectController');