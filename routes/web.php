<?php

Route::get('/', function () {
    return redirect(route('login.aluno'));
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
Route::post('alunos/storedoc', 'AlunosController@storeDoc')->name('alunos.storeDoc');
Route::post('alunos/disableOrEnableAluno/{id}', 'AlunosController@disableOrEnableAluno')->name('alunos.disableOrEnableAluno');
Route::post('aluno/create/new/{idAluno}', 'AlunosController@createUserAluno');

Route::get('pessoas/getBasicData', 'PessoaController@getBasicData')->name('pessoas.getBasicData');
Route::get('pessoas/getInfoUser/{idPessoa}', 'PessoaController@getInfoUser')->name('pessoas.getInfoUser');
Route::get('pessoas/getAjax', 'PessoaController@dataAjax')->name('pessoas.getAjaxSelect2');
Route::get('pessoas/funcionario', 'PessoaController@dataAjaxPessoa')->name('pessoas.getFuncionarioAjaxSelect2');
Route::get('pessoas/getAllTeatcher', 'PessoaController@getAllTeatcher')->name('pessoa.getAllTeatcher');
Route::get('pessoas/teatcherSchoolSubjects/{id}', 'PessoaController@teatcherSchoolSubjects')->name('pessoa.teatcherSchoolSubjects');
Route::post('pessoas/emailMain', 'PessoaController@mainEmailPessoaAjax')->name('pessoa.emailMain');
Route::post('pessoas/phoneMain', 'PessoaController@mainPhonePessoaAjax')->name('pessoa.phoneMain');
Route::post('pessoas/storeAjax', 'PessoaController@storeAjax')->name('pessoa.storeAjax');
Route::post('pessoas/storedoc', 'PessoaController@storeDoc')->name('pessoa.storeDoc');

Route::get('matricula', 'MatriculaController@index')->name('matricula.index');
Route::get('roles/getAjax', 'RoleController@dataAjax')->name('roles.getAjaxSelect2');
Route::post('matricula', 'MatriculaController@store')->name('matricula.store');

Route::get('departments/getAjax', 'DepartmentController@dataAjax')->name('departments.getAjaxSelect2');

Route::get('management/getBasicData', 'UserManagementController@getBasicData')->name('management.getBasicData');
Route::post('management/resetSenha/{id}', 'UserManagementController@resetSenha')->name('management.resetSenha');

Route::put('notification/class/new', 'NotificationController@storeByYearClass')->name('notification.class.new');
Route::put('notification/aluno/new', 'NotificationController@storeByAluno')->name('notification.aluno.new');
Route::get('notification/{id}', 'NotificationController@show')->name('notification.show');
Route::get('notification/aluno/{id}', 'NotificationController@getNotification')->name('management.getNotification');
Route::get('notification/', 'NotificationController@getAll')->name('management.getAll');


Route::get('classrooms/getAll', 'ClassRoomController@getAll');
Route::get('class/getBasicData', 'YearClassController@getBasicData')->name('class.getBasicData');
Route::get('class/synchronizedStudents/{id}', 'YearClassController@synchronizedStudents')->name('class.synchronizedStudents');
Route::post('class/syncAluno/{id}', 'YearClassController@syncAluno')->name('class.syncAluno');
Route::post('class/unsyncAluno', 'YearClassController@detachStudents')->name('class.detachStudents');
Route::get('class/getAlunos', 'YearClassController@getAlunos')->name('class.getAlunos');


Route::get('schoolsubject/teacher/{idPessoa}', 'SchoolSubjectController@teacherAll');
Route::post('schoolsubject/teacher/{idPessoa}', 'SchoolSubjectController@teacherAdd');
Route::delete('schoolsubject/teacher/{idPessoa}', 'SchoolSubjectController@teacherRemove');

Route::get('disk/file', 'FileentryController@getFile')->name('file.get');
Route::get('disk/file/delete', 'FileentryController@deleteFile')->name('file.delete');
Route::get('file', 'FileentryController@index')->name('file.index');
Route::get('file/getBasicData', 'FileentryController@getBasicData')->name('file.getBasicData');

Route::get('/activitie/{id}', 'ActivitieController@loadActivitie');
Route::post('/activitie/{id}/pessoa', 'ActivitieController@syncAluno');

Route::get('teste/{id}', 'AlunosController@getActivitieByAluno');

Route::get('call/existCall/{date}', 'CallController@existCall');

//Dashboard Secretária
Route::get('dash/secretaria/topBox', 'DashSecretariaController@dataBoxCountTop')->name('dash.secretaria.dataBoxCountTop');
Route::get('dash/secretaria/BoxTurmas', 'DashSecretariaController@dataBoxTurmas')->name('dash.secretaria.dataBoxTurmas');
Route::get('dash/secretaria/dataAlunosxAlunos', 'DashSecretariaController@dataAlunosxAlunos')->name('dash.secretaria.dataAlunosxAlunos');
Route::get('dash/secretaria/getBasicData', 'NotificationController@getBasicData')->name('management.getBasicData');

//Dashboard Aluno

Route::get('aluno/login', 'LoginAlunoController@loginUserAluno')->name('login.aluno');
Route::post('aluno/login', 'LoginAlunoController@login');

Route::get('aluno/dash/atividade', 'AlunosAcessoController@atividade')->name('aluno.dash.atividade');
Route::get('aluno/dash/turma', 'AlunosAcessoController@turma')->name('aluno.dash.turma');
Route::get('aluno/dash/mensagem', 'AlunosAcessoController@mensagem')->name('aluno.dash.mensagem');

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
Route::resource('diary', 'DiaryController');
Route::resource('dash/secretaria', 'DashSecretariaController');
Route::resource('aluno/dash', 'AlunosAcessoController');