<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;
use App\Repositories\PessoaRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Helpers\Helpers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

class PessoaController extends AppBaseController
{
    /** @var  PessoaRepository */
    private $pessoaRepository;

    public function __construct(PessoaRepository $pessoaRepo)
    {
        $this->pessoaRepository = $pessoaRepo;
    }

    /**
     * Display a listing of the Pessoa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pessoaRepository->pushCriteria(new RequestCriteria($request));
        return view('pessoas.index');
    }

    public function getBasicData()
    {
        $pessoas = Pessoa::select(['id', 'nome', 'cpf_cnpj', 'status', 'tipo_pessoas_id']);

        return Datatables::of($pessoas)
            ->editColumn('status', function ($pessoa) {
                return $pessoa->status == 1 ? 'Ativo' : 'Inativo';
            })
            ->editColumn('tipo_pessoas_id', function ($pessoa) {

                if ($pessoa->tipo_pessoas_id == 1) {
                    return 'Aluno';
                } else if ($pessoa->tipo_pessoas_id == 2) {
                    return 'Responsável';
                } else if ($pessoa->tipo_pessoas_id == 3) {
                    return 'Autorizado';
                } else if ($pessoa->tipo_pessoas_id == 4) {
                    return 'Funcionário';
                } else if ($pessoa->tipo_pessoas_id == 5) {
                    return 'Empresa';
                }

            })
            ->addColumn('link', function ($pessoa) {
                return '
                <a href="/pessoas/' . $pessoa->id . '' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="/pessoas/' . $pessoa->id . '/edit' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                ';
            })
            ->rawColumns(['link'])
            ->make(true);
    }

    /**
     * Show the form for creating a new Pessoa.
     *
     * @return Response
     */
    public function create()
    {
        $tipoPessoas = \App\Models\TipoPessoa::where([['status', '=', 1], ['id', '!=', 1]])->get()->pluck('nome', 'id');
        $genders = \App\Models\Gender::where('status', '=', 1)->get()->pluck('nome', 'id');
        $familySituation = \App\Models\FamilySituation::where('status', '=', 1)->get()->pluck('nome', 'id');
        $citizenships = \App\Models\Citizenship::where('status', '=', 1)->get()->pluck('nome', 'id');

        $departments = \App\Models\Department::where('status', '=', 1)->get();
        $roles = \App\Models\Role::where('status', '=', 1)->get();

        return view('pessoas.create')->with(compact('tipoPessoas', 'genders', 'familySituation', 'citizenships', 'departments', 'roles'));
    }

    /**
     * Store a newly created Pessoa in storage.
     *
     * @param CreatePessoaRequest $request
     *
     * @return Response
     */
    public function store(CreatePessoaRequest $request)
    {
        $input = $request->all();

        try {
            $helper = new Helpers();

            $input['dataNascimento'] = $helper->formataDataPtBr($input['dataNascimento']);
            $input['data_admissao'] = $helper->formataDataPtBr($input['data_admissao']);
            $input['salario_base'] = $helper->formataValoresMonetarios($input['salario_base']);
            $input['vale_refeicao'] = $helper->formataValoresMonetarios($input['vale_refeicao']);
            $input['vale_transporte'] = $helper->formataValoresMonetarios($input['vale_transporte']);


            $locations['location'] = array_get($input, 'locations');
            $locations['location']['flg_principal'] = true;
            $emails = array_get($input, 'email');
            $departments = array_get($input, 'department');
            $roles = array_get($input, 'role');
            $healthInformations = array_get($input, 'healthInformations');
            $phones = array_get($input, 'phone');


            array_forget($input, 'healthInformations');
            array_forget($input, 'locations');
            array_forget($input, 'email');
            array_forget($input, 'department');
            array_forget($input, 'role');
            array_forget($input, 'phone');

            $pessoa = $this->pessoaRepository->create($input);

            if (!empty($locations)) {
                $pessoa->location()->createMany(
                    $locations
                );
            }

            if (!empty($emails)) {
                $pessoa->email()->createMany(
                    $emails
                );
            }

            if (!empty($phones)) {
                $pessoa->phone()->createMany(
                    $phones
                );
            }

            if (!empty($departments)) {
                $pessoa->departments()->sync(
                    $departments
                );
            }

            if (!empty($roles)) {
                $pessoa->roles()->sync(
                    $roles
                );
            }


            if (!empty($healthInformations)) {
                $healthInformations = $pessoa->getHealthInformation()->create(
                    $healthInformations
                );
                $pessoa->healthInformations_id = $healthInformations->id;
                $pessoa->save();
            }

            $flash = new Flash();
            $flash::success('Pessoa criada com sucesso.');

            return redirect(route('pessoas.show', $pessoa->id));
        } catch (\Exception $exception) {

            $flash = new Flash();
            $flash::success('Algo deu errado - Informe o administrador do sistema.');

            return redirect(route('pessoas.index'));
        }

    }

    /**
     * Store a newly created Pessoa in storage.
     *
     * @param CreatePessoaRequest $request
     *
     * @return Response
     */
    public function storeAjax(CreatePessoaRequest $request)
    {
        $input = $request->all();

        $helper = new Helpers();

        $input['dataNascimento'] = $helper->formataDataPtBr($input['dataNascimento']);

        $locations['location'] = array_get($input, 'locations');
        $locations['location']['flg_principal'] = true;

        $emails = array_get($input, 'email');
        $phones = array_get($input, 'phone');

        array_forget($input, 'locations');
        array_forget($input, 'email');
        array_forget($input, 'phone');

        $pessoa = $this->pessoaRepository->create($input);

        if (!empty($locations)) {
            $pessoa->location()->createMany(
                $locations
            );
        }

        if (!empty($emails)) {
            $pessoa->email()->createMany(
                $emails
            );
        }

        if (!empty($phones)) {
            $pessoa->phone()->createMany(
                $phones
            );
        }

        return response()->json($pessoa);

    }

    public function mainEmailPessoaAjax(Request $request)
    {
        $parameters = $request->all();
        return $this->pessoaRepository->setEmailMain($parameters['idPessoa'], $parameters['idEmail']);
    }

    public function mainPhonePessoaAjax(Request $request)
    {
        $parameters = $request->all();
        return $this->pessoaRepository->setPhoneMain($parameters['idPessoa'], $parameters['idPhone']);
    }

    /**
     * Display the specified Pessoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getInfoUser($idPessoa)
    {
        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        $resposta = [];

        $resposta['id'] = $pessoa->id;
        $resposta['nome'] = $pessoa->nome;
        $resposta['cpf_cnpj'] = $pessoa->cpf_cnpj;
        $resposta['sexo'] = $pessoa->gender->nome;
        $resposta['rg'] = $pessoa->rg;
        $resposta['dataNascimento'] = $pessoa->dataNascimento->format('d/m/Y');
        $resposta['status'] = $pessoa->status;
        $resposta['citizenship'] = $pessoa->getCitizenship->nome;
        $resposta['familySituation'] = $pessoa->getFamilySituation->nome;


        return response()->json($resposta);
    }

    /**
     * Display the specified Pessoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($idPessoa)
    {
        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        $schoolsubjects = \App\Models\SchoolSubject::all();

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada.');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.show')->with(compact('schoolsubjects', 'pessoa'));
    }

    /**
     * Show the form for editing the specified Pessoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($idPessoa)
    {
        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        $tipoPessoas = \App\Models\TipoPessoa::where([['status', '=', 1], ['id', '!=', 1]])->get()->pluck('nome', 'id');
        $genders = \App\Models\Gender::where('status', '=', 1)->get()->pluck('nome', 'id');
        $familySituation = \App\Models\FamilySituation::where('status', '=', 1)->get()->pluck('nome', 'id');
        $citizenships = \App\Models\Citizenship::where('status', '=', 1)->get()->pluck('nome', 'id');

        $departments = \App\Models\Department::where('status', '=', 1)->get();
        $roles = \App\Models\Role::where('status', '=', 1)->get();

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada.');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.edit')->with(compact('pessoa', 'citizenships', 'familySituation', 'tipoPessoas', 'genders', 'departments', 'roles'));
    }

    /**
     * Update the specified Pessoa in storage.
     *
     * @param  int $id
     * @param UpdatePessoaRequest $request
     *
     * @return Response
     */
    public function update($idPessoa, Request $request)
    {
        $helper = new Helpers();

        $validator = validator($data = $request->all(), [
            'cpf_cnpj' => 'required|string|unique:pessoas,cpf_cnpj,' . $idPessoa,
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $input = $request->all();

        $input['dataNascimento'] = $helper->formataDataPtBr($input['dataNascimento']);
        $input['data_admissao'] = $helper->formataDataPtBr($input['data_admissao']);
        $input['salario_base'] = $helper->formataValoresMonetarios($input['salario_base']);
        $input['vale_refeicao'] = $helper->formataValoresMonetarios($input['vale_refeicao']);
        $input['vale_transporte'] = $helper->formataValoresMonetarios($input['vale_transporte']);


        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada');

            return redirect(route('pessoas.index'));
        }

        $locationModel = new \App\Models\Location();

        $locations = array_get($input, 'locations');
        array_forget($input, 'locations');
        array_forget($locations, 'id');

        $emails = array_get($input, 'email');
        array_forget($input, 'email');

        $phones = array_get($input, 'phone');
        array_forget($input, 'phone');

        $departments = array_get($input, 'department');
        array_forget($input, 'department');

        $roles = array_get($input, 'role');
        array_forget($input, 'role');

        $locations = $locationModel::updateOrCreate(['id' => $pessoa->location->first()->id], $locations);


        $pessoa->location()->sync($locations->id);
        $pessoa = $this->pessoaRepository->update($input, $idPessoa);


        if (!empty($emails)) {
            $pessoa->email()->createMany(
                $emails
            );
        }

        if (!empty($phones)) {
            $pessoa->phone()->createMany(
                $phones
            );
        }

        if (!empty($departments)) {
            $pessoa->departments()->sync(
                $departments
            );
        }

        if (!empty($roles)) {
            $pessoa->roles()->sync(
                $roles
            );
        }

        $flash = new Flash();
        $flash::success('Pessoa atualizada com sucesso.');

        return redirect(route('pessoas.show', $pessoa->id));
    }

    /**
     * Remove the specified Pessoa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($idPessoa)
    {
        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada.');

            return redirect(route('pessoas.index'));
        }

        $this->pessoaRepository->delete($idPessoa);

        $flash = new Flash();
        $flash::success('Pessoa deleted successfully.');

        return redirect(route('pessoas.index'));
    }


    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjaxPessoa(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;

            $pessoa = new Pessoa();

            $data = $pessoa
                ->select("id", "nome", 'cpf_cnpj', 'tipo_pessoas_id' )
                ->where([
                    ['nome', 'LIKE', "%$search%"],
                    ['tipo_pessoas_id', '=', '4']])
                ->limit(5)
                ->get();
        }

        return response()->json($data);
    }


    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;

            $pessoa = new Pessoa();

            $data = $pessoa
                ->select("id", "nome", 'cpf_cnpj', 'tipo_pessoas_id' )
                ->where([
                    ['nome', 'LIKE', "%$search%"],
                    ['tipo_pessoas_id', '=', '2']])
                ->orWhere('tipo_pessoas_id', '3')
                ->limit(5)
                ->get();
        }

        return response()->json($data);
    }
}
