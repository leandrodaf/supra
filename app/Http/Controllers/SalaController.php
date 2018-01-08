<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalaRequest;
use App\Http\Requests\UpdateSalaRequest;
use App\Repositories\SalaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SalaController extends AppBaseController
{
    /** @var  SalaRepository */
    private $salaRepository;

    public function __construct(SalaRepository $salaRepo)
    {
        $this->salaRepository = $salaRepo;
    }

    /**
     * Display a listing of the Sala.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salaRepository->pushCriteria(new RequestCriteria($request));
        $salas = $this->salaRepository->all();

        return view('salas.index')
            ->with('salas', $salas);
    }

    /**
     * Show the form for creating a new Sala.
     *
     * @return Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created Sala in storage.
     *
     * @param CreateSalaRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaRequest $request)
    {
        $input = $request->all();

        $sala = $this->salaRepository->create($input);

        Flash::success('Sala saved successfully.');

        return redirect(route('salas.index'));
    }

    /**
     * Display the specified Sala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sala = $this->salaRepository->findWithoutFail($id);

        if (empty($sala)) {
            Flash::error('Sala not found');

            return redirect(route('salas.index'));
        }

        return view('salas.show')->with('sala', $sala);
    }

    /**
     * Show the form for editing the specified Sala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sala = $this->salaRepository->findWithoutFail($id);

        if (empty($sala)) {
            Flash::error('Sala não encontrada');

            return redirect(route('salas.index'));
        }

        return view('salas.edit')->with('sala', $sala);
    }

    /**
     * Update the specified Sala in storage.
     *
     * @param  int              $id
     * @param UpdateSalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaRequest $request)
    {
        $sala = $this->salaRepository->findWithoutFail($id);

        if (empty($sala)) {
            Flash::error('Sala não encontrada');

            return redirect(route('salas.index'));
        }

        $sala = $this->salaRepository->update($request->all(), $id);

        Flash::success('Sala atualizada com sucesso.');

        return redirect(route('salas.index'));
    }

    /**
     * Remove the specified Sala from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sala = $this->salaRepository->findWithoutFail($id);

        if (empty($sala)) {
            Flash::error('Sala não encontrada');

            return redirect(route('salas.index'));
        }

        $this->salaRepository->delete($id);

        Flash::success('Sala deletada com sucesso.');

        return redirect(route('salas.index'));
    }
}
