<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Repositories\PessoaRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Helpers\Helpers;

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
        $pessoas = $this->pessoaRepository->all();

        return view('pessoas.index')
            ->with('pessoas', $pessoas);
    }

    /**
     * Show the form for creating a new Pessoa.
     *
     * @return Response
     */
    public function create()
    {
        $tipoPessoas = \App\Models\TipoPessoa::where([['status', '=', 1], ['id', '!=', 1]])->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');
        $estadoCivil = \App\Models\EstadoCivil::where('status', '=', 1)->get()->pluck('nome', 'id');
        $nacionalidades = \App\Models\Nacionalidade::where('status', '=', 1)->get()->pluck('nome', 'id');

        $setores = \App\Models\Setor::where('status', '=', 1)->get();
        $roles = \App\Models\Role::where('status', '=', 1)->get();

        return view('pessoas.create')->with(compact('tipoPessoas', 'generos', 'estadoCivil', 'nacionalidades', 'setores', 'funcoes'));
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

        $helper = new Helpers();
        $input = $request->all();

        $input['dataNascimento'] = $helper->formataDataPtBr($input['dataNascimento']);
        $input['data_admissao'] = $helper->formataDataPtBr($input['data_admissao']);
        $input['salario_base'] = $helper->formataValoresMonetarios($input['salario_base']);
        $input['vale_refeicao'] = $helper->formataValoresMonetarios($input['vale_refeicao']);
        $input['vale_transporte'] = $helper->formataValoresMonetarios($input['vale_transporte']);

        $enderecos['endereco'] = array_get($input, 'enderecos');
        array_forget($input, 'enderecos');

        $emails = array_get($input, 'email');
        array_forget($input, 'email');


        $setores = array_get($input, 'setores');
        array_forget($input, 'setores');

        $roles = array_get($input, 'funcoes');
        array_forget($input, 'funcoes');



        $pessoa = $this->pessoaRepository->create($input);

        if (!empty($enderecos)) {
            $pessoa->endereco()->createMany(
                $enderecos
            );
        }

        if (!empty($emails)) {
            $pessoa->email()->createMany(
                $emails
            );
        }

        if (!empty($setores)) {
            $pessoa->setor()->createMany(
                $setores
            );
        }

        if (!empty($roles)) {
            $pessoa->role()->createMany(
                $roles
            );
        }

        $flash = new Flash();
        $flash::success('Pessoa criada com sucesso.');

        return redirect(route('pessoas.show', $pessoa->id));
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

        $enderecos['endereco'] = array_get($input, 'enderecos');
        array_forget($input, 'enderecos');
        $pessoa = $this->pessoaRepository->create($input);
        $pessoa->endereco()->createMany($enderecos);
        return response()->json($pessoa);
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

        $resposta['nome'] = $pessoa->nome;
        $resposta['cpf_cnpj'] = $pessoa->cpf_cnpj;
        $resposta['sexo'] = $pessoa->genero->nome;
        $resposta['rg'] = $pessoa->rg;
        $resposta['dataNascimento'] = $pessoa->dataNascimento->format('d/m/Y');
        $resposta['status'] = $pessoa->status;
        $resposta['nacionalidade'] = $pessoa->getNacionalidade->nome;
        $resposta['estadoCivil'] = $pessoa->getEstadoCivil->nome;


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


        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada.');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.show')->with('pessoa', $pessoa);
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

        $tipoPessoas = \App\Models\TipoPessoa::where('status', '=', 1)->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');
        $estadoCivil = \App\Models\EstadoCivil::where('status', '=', 1)->get()->pluck('nome', 'id');
        $nacionalidades = \App\Models\Nacionalidade::where('status', '=', 1)->get()->pluck('nome', 'id');

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada.');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.edit')->with(compact('pessoa', 'nacionalidades', 'estadoCivil', 'tipoPessoas', 'generos'));
    }

    /**
     * Update the specified Pessoa in storage.
     *
     * @param  int $id
     * @param UpdatePessoaRequest $request
     *
     * @return Response
     */
    public function update($idPessoa, UpdatePessoaRequest $request)
    {
        $input = $request->all();

        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa não encontrada');

            return redirect(route('pessoas.index'));
        }

        $enderecoModel = new \App\Models\Endereco();

        $enderecos = array_get($input, 'enderecos');
        array_forget($input, 'enderecos');
        array_forget($enderecos, 'id');

        $enderecos = $enderecoModel::updateOrCreate(['id' => $pessoa->endereco->first()->id], $enderecos);

        $pessoa->endereco()->sync($enderecos->id);

        $pessoa = $this->pessoaRepository->update($input, $idPessoa);

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
    public function dataAjax(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("pessoas")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->limit(5)
                ->get();
        }

        return response()->json($data);
    }
}
