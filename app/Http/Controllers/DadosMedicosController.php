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
    public function index()
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
     * @param  int $idDadosMedicos
     *
     * @return Response
     */
    public function show($idDadosMedicos)
    {
        $dadosMedicos = $this->dadosMedicosRepository->findWithoutFail($idDadosMedicos);

        if (empty($dadosMedicos)) {
            return response()->json(['errors' => 'Não encontrado']);
        }

        return response()->json($dadosMedicos);
    }

    /**
     * Update the specified DadosMedicos in storage.
     *
     * @param  int $idDadosMedicos
     * @param UpdateDadosMedicosRequest $request
     *
     * @return Response
     */
    public function update($idDadosMedicos, UpdateDadosMedicosRequest $request)
    {
        $dadosMedicos = $this->dadosMedicosRepository->findWithoutFail($idDadosMedicos);

        if (empty($dadosMedicos)) {
            return response()->json(['errors' => 'Não encontrado']);
        }

        $dadosMedicos = $this->dadosMedicosRepository->update($request->all(), $idDadosMedicos);
        return response()->json($dadosMedicos);
    }

    /**
     * Remove the specified DadosMedicos from storage.
     *
     * @param  int $idDadosMedicos
     *
     * @return Response
     */
    public function destroy($idDadosMedicos)
    {
        $dadosMedicos = $this->dadosMedicosRepository->findWithoutFail($idDadosMedicos);

        if (empty($dadosMedicos)) {
            return response()->json(['errors' => 'Não encontrado']);
        }
        $this->dadosMedicosRepository->delete($idDadosMedicos);
    }
}
