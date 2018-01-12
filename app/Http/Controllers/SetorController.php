<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSetorRequest;
use App\Http\Requests\UpdateSetorRequest;
use App\Repositories\SetorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

class SetorController extends AppBaseController
{
    /** @var  SetorRepository */
    private $setorRepository;

    public function __construct(SetorRepository $setorRepo)
    {
        $this->setorRepository = $setorRepo;
    }

    /**
     * Display a listing of the Setor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->setorRepository->pushCriteria(new RequestCriteria($request));
        $setores = $this->setorRepository->all();

        return view('setores.index')
            ->with('setores', $setores);
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
            $data = DB::table("setor")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new Setor.
     *
     * @return Response
     */
    public function create()
    {
        return view('setores.create');
    }

    /**
     * Store a newly created Setor in storage.
     *
     * @param CreateSetorRequest $request
     *
     * @return Response
     */
    public function store(CreateSetorRequest $request)
    {
        $input = $request->all();

        $setor = $this->setorRepository->create($input);

        Flash::success('Setor salvo com sucesso.');

        return redirect(route('setores.index'));
    }

    /**
     * Display the specified Setor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setor = $this->setorRepository->findWithoutFail($id);

        if (empty($setor)) {
            Flash::error('Setor não encontrado');

            return redirect(route('setores.index'));
        }

        return view('setores.show')->with('setor', $setor);
    }

    /**
     * Show the form for editing the specified Setor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setor = $this->setorRepository->findWithoutFail($id);

        if (empty($setor)) {
            Flash::error('Setor não encontrado');

            return redirect(route('setores.index'));
        }

        return view('setores.edit')->with('setor', $setor);
    }

    /**
     * Update the specified Setor in storage.
     *
     * @param  int              $id
     * @param UpdateSetorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSetorRequest $request)
    {
        $setor = $this->setorRepository->findWithoutFail($id);

        if (empty($setor)) {
            Flash::error('Setor não encontrado');

            return redirect(route('setores.index'));
        }

        $setor = $this->setorRepository->update($request->all(), $id);

        Flash::success('Setor updated successfully.');

        return redirect(route('setores.index'));
    }

    /**
     * Remove the specified Setor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $setor = $this->setorRepository->findWithoutFail($id);

        if (empty($setor)) {
            Flash::error('Setor não encontrado');

            return redirect(route('setores.index'));
        }

        $this->setorRepository->delete($id);

        Flash::success('Setor deletado com sucesso.');

        return redirect(route('setores.index'));
    }
}
