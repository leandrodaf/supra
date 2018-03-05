<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoMatricula;
use App\Repositories\AlunosRepository;
use Flash;
use App\Helpers\Helpers;

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

        return view('matricula.index')->with(compact('tipoPessoas', 'genders', 'familySituation', 'citizenships','departments','roles', 'tipoPessoasResponsavel'));
    }


    public function store(StoreAlunoMatricula $request)
    {

        $helper = new Helpers();
        $input = $request->all();


        $emails = array_get($input, 'email');
        $responsaveis = array_get($input, 'responsaveis');
        $healthInformations = array_get($input, 'healthInformations');
        $phones = array_get($input, 'phone');

        array_forget($input, 'responsaveis');
        array_forget($input, 'healthInformations');
        array_forget($input, 'email');
        array_forget($input, 'phone');


        $input['data_nascimento_aluno'] = $helper->formataDataPtBr($input['data_nascimento_aluno']);

        $input['foto_aluno'] = $this->alunosRepository->matriculaAvatar($request);

        $aluno = $this->alunosRepository->create($input);

        if (!empty($emails)) {
            $aluno->email()->createMany(
                $emails
            );
        }

        if (!empty($phones)) {
            $aluno->phone()->createMany(
                $phones
            );
        }

        if (!empty($responsaveis)) {
            $aluno->pessoa()->sync($responsaveis);
        }

        if (!empty($healthInformations)) {
            $healthInformations = $aluno->getHealthInformation()->create(
                $healthInformations
            );

            $aluno->healthInformations_id = $healthInformations->id;

            $aluno->save();

        }


        $flash = new Flash();
        $flash::success('Aluno criado com sucesso.');

        return redirect(route('alunos.show', $aluno->id));
    }
}
