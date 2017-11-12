<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDadosMedicosRequest;
use App\Http\Requests\UpdateDadosMedicosRequest;
use App\Repositories\DadosMedicosRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class DadosMedicosController extends AppBaseController
{
    /** @var  DadosMedicosRepository */
    private $dadosMedicosRepository;

    public function __construct(DadosMedicosRepository $dadosMedicosRepo)
    {
        $this->dadosMedicosRepository = $dadosMedicosRepo;
    }

    /**
     * Display a listing of the DadosMedicos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json(['errors' => 'Não encontrado']);
    }

    /**
     * Show the form for creating a new DadosMedicos.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created DadosMedicos in storage.
     *
     * @param CreateDadosMedicosRequest $request
     *
     * @return Response
     */
    public function store(CreateDadosMedicosRequest $request)
    {
        $input = $request->all();

        $dadosMedicos = $this->dadosMedicosRepository->create($input);

        return response()->json($dadosMedicos);
    }

    /**
     * Display the specified DadosMedicos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dadosMedicos = $this->dadosMedicosRepository->findWithoutFail($id);

        if (empty($dadosMedicos)) {
            return response()->json(['errors' => 'Não encontrado']);
        }

        return response()->json($dadosMedicos);
    }

    /**
     * Show the form for editing the specified DadosMedicos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified DadosMedicos in storage.
     *
     * @param  int $id
     * @param UpdateDadosMedicosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDadosMedicosRequest $request)
    {
        $dadosMedicos = $this->dadosMedicosRepository->findWithoutFail($id);

        if (empty($dadosMedicos)) {
            return response()->json(['errors' => 'Não encontrado']);
        }

        $dadosMedicos = $this->dadosMedicosRepository->update($request->all(), $id);
        return response()->json($dadosMedicos);
    }

    /**
     * Remove the specified DadosMedicos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dadosMedicos = $this->dadosMedicosRepository->findWithoutFail($id);

        if (empty($dadosMedicos)) {
            return response()->json(['errors' => 'Não encontrado']);
        }
        $this->dadosMedicosRepository->delete($id);
    }
}
