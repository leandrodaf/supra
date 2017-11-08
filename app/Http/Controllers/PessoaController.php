<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Repositories\PessoaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

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
        return view('pessoas.create');
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
        $this->pessoaRepository->create($input);

        $flash = new Flash();
        $flash::success('Pessoa saved successfully.');

        return redirect(route('pessoas.index'));
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
            $flash::error('Pessoa not found');

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

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa not found');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.edit')->with('pessoa', $pessoa);
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
        $pessoa = $this->pessoaRepository->findWithoutFail($idPessoa);

        if (empty($pessoa)) {
            $flash = new Flash();
            $flash::error('Pessoa not found');

            return redirect(route('pessoas.index'));
        }

        $pessoa = $this->pessoaRepository->update($request->all(), $idPessoa);

        $flash = new Flash();
        $flash::success('Pessoa updated successfully.');

        return redirect(route('pessoas.index'));
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
            $flash::error('Pessoa not found');

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
