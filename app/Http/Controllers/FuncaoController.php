<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFuncaoRequest;
use App\Http\Requests\UpdateFuncaoRequest;
use App\Repositories\FuncaoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FuncaoController extends AppBaseController
{
    /** @var  FuncaoRepository */
    private $funcaoRepository;

    public function __construct(FuncaoRepository $funcaoRepo)
    {
        $this->funcaoRepository = $funcaoRepo;
    }

    /**
     * Display a listing of the Funcao.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->funcaoRepository->pushCriteria(new RequestCriteria($request));
        $funcoes = $this->funcaoRepository->all();

        return view('funcoes.index')
            ->with('funcoes', $funcoes);
    }

    /**
     * Show the form for creating a new Funcao.
     *
     * @return Response
     */
    public function create()
    {
        return view('funcoes.create');
    }

    /**
     * Store a newly created Funcao in storage.
     *
     * @param CreateFuncaoRequest $request
     *
     * @return Response
     */
    public function store(CreateFuncaoRequest $request)
    {
        $input = $request->all();

        $funcao = $this->funcaoRepository->create($input);

        Flash::success('Função salva com sucesso.');

        return redirect(route('funcoes.index'));
    }

    /**
     * Display the specified Funcao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $funcao = $this->funcaoRepository->findWithoutFail($id);

        if (empty($funcao)) {
            Flash::error('Função não encontrada');

            return redirect(route('funcoes.index'));
        }

        return view('funcoes.show')->with('funcoes', $funcao);
    }

    /**
     * Show the form for editing the specified Funcao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $funcao = $this->funcaoRepository->findWithoutFail($id);

        if (empty($funcao)) {
            Flash::error('Função não encontrada');

            return redirect(route('funcoes.index'));
        }

        return view('funcoes.edit')->with('funcoes', $funcao);
    }

    /**
     * Update the specified Funcao in storage.
     *
     * @param  int              $id
     * @param UpdateFuncaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFuncaoRequest $request)
    {
        $funcao = $this->funcaoRepository->findWithoutFail($id);

        if (empty($funcao)) {
            Flash::error('Função não encontrada');

            return redirect(route('funcoes.index'));
        }

        $funcao = $this->funcaoRepository->update($request->all(), $id);

        Flash::success('Função atualizada com sucesso.');

        return redirect(route('funcoes.index'));
    }

    /**
     * Remove the specified Funcao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $funcao = $this->funcaoRepository->findWithoutFail($id);

        if (empty($funcao)) {
            Flash::error('Função não encontrada');

            return redirect(route('funcoes.index'));
        }

        $this->funcaoRepository->delete($id);

        Flash::success('Função deletada com sucesso.');

        return redirect(route('funcoes.index'));
    }
}
