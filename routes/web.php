<?php

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('alunos/getBasicData', 'AlunosController@getBasicData')->name('alunos.getBasicData');
Route::get('alunos/getInfoUser/{idAluno}', 'AlunosController@getInfoUser')->name('alunos.getInfoUser');
Route::get('alunos/availableAlunos', 'AlunosController@availableAlunos')->name('availableAlunos');
Route::get('alunos/getAllAlunosClass/{id}', 'AlunosController@getAllAlunos')->name('alunos.getAllAlunosClass');
Route::post('alunos/emailMain', 'AlunosController@mainEmailAlunoAjax')->name('alunos.emailMain');
Route::post('alunos/responsaveis/{responsavel}', 'AlunosController@updateResponsaveis')->name('alunos.updateResponsaveis');
Route::post('alunos/responsaveis/{responsavel}/desvincular', 'AlunosController@desvincularAluno')->name('alunos.desvincularAluno');
Route::post('alunos/phoneMain', 'AlunosController@mainPhoneAlunosAjax')->name('alunos.phoneMain');


Route::get('pessoas/getBasicData', 'PessoaController@getBasicData')->name('pessoas.getBasicData');
Route::get('pessoas/getInfoUser/{idPessoa}', 'PessoaController@getInfoUser')->name('pessoas.getInfoUser');
Route::get('pessoas/getAjax', 'PessoaController@dataAjax')->name('pessoas.getAjaxSelect2');
Route::get('pessoas/funcionario', 'PessoaController@dataAjaxPessoa')->name('pessoas.getFuncionarioAjaxSelect2');
Route::get('pessoas/getAllTeatcher', 'PessoaController@getAllTeatcher')->name('pessoa.getAllTeatcher');
Route::get('pessoas/teatcherSchoolSubjects/{id}', 'PessoaController@teatcherSchoolSubjects')->name('pessoa.teatcherSchoolSubjects');
Route::post('pessoas/emailMain', 'PessoaController@mainEmailPessoaAjax')->name('pessoa.emailMain');
Route::post('pessoas/phoneMain', 'PessoaController@mainPhonePessoaAjax')->name('pessoa.phoneMain');
Route::post('pessoas/storeAjax', 'PessoaController@storeAjax')->name('pessoa.storeAjax');

//TIPOATIVO
Route::get('typeactives/', 'TypeActiveController@index')->name('typeactives.index');
Route::get('typeactives/create', 'TypeActiveController@create')->name('typeactives.create');
Route::delete('typeactives/destroy/{id}', 'TypeActiveController@destroy')->name('typeactives.destroy');
Route::get('typeactives/{id}/edit', 'TypeActiveController@edit')->name('typeactives.edit');
Route::get('typeactives/typeActioveGetBasicData', 'TypeActiveController@typeActiveGetBasicData')->name('typeActive.typeActiveGetBasicData');
Route::get('typeactives/getInfoTypeActives/{idTypeActibe}', 'TypeActiveController@getInfoTypeActive')->name('typeActives.getInfoTypeActive');
Route::post('typeactives/store', 'TypeActiveController@store')->name('typeactives.store');
Route::patch('typeactives/update/{id}', 'TypeActiveController@update')->name('typeactives.update');

//RECADOS
Route::get('/home/messageGetBasicData', 'HomeController@messageGetBasicData')->name('home.messageGetBasicData');
// Route::get('/home/getInfoMessage/{idMessage}', 'HomeController@getInfoMessage')->name('messages.getInfoMessage');
Route::post('/home/messageStore', 'HomeController@messageStore')->name('message.store');
Route::post('/home/messageUpdate', 'HomeController@messageUpdate')->name('message.update');
Route::post('/home/destroy/{idMessage}', 'HomeController@destroy')->name('message.destroy');
//rota para trazer os dados do recado para o modal
Route::get('/home/getInfoMessage/{idMessage}', 'HomeController@getInfoMessage')->name('message.getInfoMessage');

Route::get('matricula', 'MatriculaController@index')->name('matricula.index');
Route::get('roles/getAjax', 'RoleController@dataAjax')->name('roles.getAjaxSelect2');
Route::post('matricula', 'MatriculaController@store')->name('matricula.store');

Route::get('departments/getAjax', 'DepartmentController@dataAjax')->name('departments.getAjaxSelect2');

Route::get('management/getBasicData', 'UserManagementController@getBasicData')->name('management.getBasicData');
Route::post('management/resetSenha/{id}', 'UserManagementController@resetSenha')->name('management.resetSenha');

Route::put('notification/class/new', 'NotificationController@storeByYearClass')->name('notification.class.new');
Route::put('notification/aluno/new', 'NotificationController@storeByAluno')->name('notification.aluno.new');

Route::get('classrooms/getAll', 'ClassRoomController@getAll');
Route::get('class/getBasicData', 'YearClassController@getBasicData')->name('class.getBasicData');
Route::get('class/synchronizedStudents/{id}', 'YearClassController@synchronizedStudents')->name('class.synchronizedStudents');
Route::post('class/syncAluno/{id}', 'YearClassController@syncAluno')->name('class.syncAluno');
Route::post('class/syncAluno', 'YearClassController@detachStudents')->name('class.detachStudents');
Route::get('class/getAlunos', 'YearClassController@getAlunos')->name('class.getAlunos');


Route::get('schoolsubject/teacher/{idPessoa}', 'SchoolSubjectController@teacherAll');
Route::post('schoolsubject/teacher/{idPessoa}', 'SchoolSubjectController@teacherAdd');
Route::delete('schoolsubject/teacher/{idPessoa}', 'SchoolSubjectController@teacherRemove');

Route::get('disk/file', 'FileentryController@getFile')->name('file.get');


Route::get('/activitie/{id}', 'ActivitieController@loadActivitie');
Route::post('/activitie/{id}/pessoa', 'ActivitieController@syncAluno');

Route::get('call/existCall/{date}', 'CallController@existCall');

Route::resource('call', 'CallController');
Route::resource('class', 'YearClassController');
Route::resource('alunos', 'AlunosController');
Route::resource('pessoas', 'PessoaController');
Route::resource('emails', 'EmailController');
Route::resource('phones', 'PhoneController');
Route::resource('healthInformations', 'HealthInformationsController');
Route::resource('roles', 'RoleController');
Route::resource('departments', 'DepartmentController');
Route::resource('management', 'UserManagementController');
Route::resource('classrooms', 'ClassRoomController');
Route::resource('schoolsubject', 'SchoolSubjectController');
Route::resource('activitie', 'ActivitieController');