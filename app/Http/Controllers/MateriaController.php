<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;
use App\Repositories\MateriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MateriaController extends AppBaseController
{
    /** @var  MateriaRepository */
    private $materiaRepository;

    public function __construct(MateriaRepository $materiaRepo)
    {
        $this->materiaRepository = $materiaRepo;
    }

    /**
     * Display a listing of the Materia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->materiaRepository->pushCriteria(new RequestCriteria($request));
        $materias = $this->materiaRepository->all();

        return view('materias.index')
            ->with('materias', $materias);
    }

    /**
     * Show the form for creating a new Materia.
     *
     * @return Response
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created Materia in storage.
     *
     * @param CreateMateriaRequest $request
     *
     * @return Response
     */
    public function store(CreateMateriaRequest $request)
    {
        $input = $request->all();

        $materia = $this->materiaRepository->create($input);

        Flash::success('Materia salva com sucesso.');

        return redirect(route('materias.index'));
    }

    /**
     * Display the specified Materia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia não encontrada');

            return redirect(route('materias.index'));
        }

        return view('materias.show')->with('materia', $materia);
    }

    /**
     * Show the form for editing the specified Materia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia não encontrada');

            return redirect(route('materias.index'));
        }

        return view('materias.edit')->with('materia', $materia);
    }

    /**
     * Update the specified Materia in storage.
     *
     * @param  int              $id
     * @param UpdateMateriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMateriaRequest $request)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia não encontrada');

            return redirect(route('materias.index'));
        }

        $materia = $this->materiaRepository->update($request->all(), $id);

        Flash::success('Materia atualizada com sucesso.');

        return redirect(route('materias.index'));
    }

    /**
     * Remove the specified Materia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia não encontrada.');

            return redirect(route('materias.index'));
        }

        $this->materiaRepository->delete($id);

        Flash::success('Materia deletada com sucesso.');

        return redirect(route('materias.index'));
    }
}
