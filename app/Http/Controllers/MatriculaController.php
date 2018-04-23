<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\StoreAlunoMatricula;
use App\Repositories\AlunosRepository;
use Flash;

class MatriculaController extends AppBaseController
{
    /** @var  AlunosRepository */
    private $alunosRepository;

    public function __construct(AlunosRepository $alunosRepo)
    {
        $this->middleware('auth');
        $this->alunosRepository = $alunosRepo;
    }

    public function index()
    {
        $tipoPessoas = \App\Models\TipoPessoa::where([['status', '=', 1], ['id', '=', 1]])->get()->pluck('nome', 'id');
        $tipoPessoasResponsavel = \App\Models\TipoPessoa::where([['status', '=', 1], ['id', '=', 2]])
            ->orWhere('id', '3')
            ->get()->pluck('nome', 'id');

        $genders = \App\Models\Gender::where('status', '=', 1)->get()->pluck('nome', 'id');
        $familySituation = \App\Models\FamilySituation::where('status', '=', 1)->get()->pluck('nome', 'id');
        $citizenships = \App\Models\Citizenship::where('status', '=', 1)->get()->pluck('nome', 'id');
        $departments = \App\Models\Department::where('status', '=', 1)->get();
        $roles = \App\Models\Role::where('status', '=', 1)->get();

        return view('matricula.refac')->with(compact('tipoPessoas', 'genders', 'familySituation', 'citizenships', 'departments', 'roles', 'tipoPessoasResponsavel'));
    }


    public function store(StoreAlunoMatricula $request)
    {
        $helper = new Helpers();
        $input = $request->all();

        $emails = array_get($input, 'emailAluno');
        $responsavel1 = array_get($input, 'responsavel1');
        $responsavel2 = array_get($input, 'responsavel2');

        $healthInformations = array_get($input, 'boxMedico');
        $phones = array_get($input, 'telefoneAluno');

        array_forget($input, 'responsaveis');
        array_forget($input, 'boxMedico');
        array_forget($input, 'emailAluno');
        array_forget($input, 'telefoneAluno');

        $input['data_nascimento_aluno'] = $helper->formataDataPtBr($input['data_nascimento_aluno']);
        $input['foto_aluno'] =  $this->alunosRepository->matriculaAvatarEncode64($input['foto_aluno']);
        $aluno = $this->alunosRepository->create($input);

        $aluno->email()->create(['email' => $emails]);
        $aluno->phone()->create(['number' => $phones]);
        $healthInformations = $aluno->getHealthInformation()->create($healthInformations);
        $aluno->healthInformations_id = $healthInformations->id;
        $aluno->save();

        $aluno->pessoa()->sync($responsavel1['id']);

        if (!empty($responsavel2['id'])) {
            $aluno->pessoa()->syncWithoutDetaching($responsavel2['id'], true);
        }

        return response()->json($aluno->id);
    }
}
