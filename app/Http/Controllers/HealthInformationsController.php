<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHealthInformationsRequest;
use App\Http\Requests\UpdateHealthInformationsRequest;
use App\Repositories\HealthInformationsRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class HealthInformationsController extends AppBaseController
{
    /** @var  HealthInformationsRepository */
    private $healthInformationsRepository;

    public function __construct(HealthInformationsRepository $healthInformationsRepo)
    {
        $this->middleware('auth');
        $this->healthInformationsRepository = $healthInformationsRepo;
    }

    /**
     * Display a listing of the HealthInformations.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        return response()->json(['errors' => 'Não encontrado']);
    }

    /**
     * Show the form for creating a new HealthInformations.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created HealthInformations in storage.
     *
     * @param CreateHealthInformationsRequest $request
     *
     * @return Response
     */
    public function store(CreateHealthInformationsRequest $request)
    {
        $input = $request->all();

        $healthInformations = $this->healthInformationsRepository->create($input);

        return response()->json($healthInformations);
    }

    /**
     * Display the specified HealthInformations.
     *
     * @param  int $idHealthInformations
     *
     * @return Response
     */
    public function show($idHealthInformations)
    {
        $healthInformations = $this->healthInformationsRepository->findWithoutFail($idHealthInformations);

        if (empty($healthInformations)) {
            return response()->json(['errors' => 'Não encontrado']);
        }

        return response()->json($healthInformations);
    }

    /**
     * Update the specified HealthInformations in storage.
     *
     * @param  int $idHealthInformations
     * @param UpdateHealthInformationsRequest $request
     *
     * @return Response
     */
    public function update($idHealthInformations, UpdateHealthInformationsRequest $request)
    {

        $input = $request->all();

        $data = array_get($input, 'healthInformations');
//        array_forget($input, 'healthInformations');

        $healthInformations = $this->healthInformationsRepository->findWithoutFail($idHealthInformations);

        if (empty($healthInformations)) {
            return response()->json(['errors' => 'Não encontrado']);
        }

        $dados = $this->healthInformationsRepository->update($data, $idHealthInformations);

        return response()->json($dados);
    }

    /**
     * Remove the specified HealthInformations from storage.
     *
     * @param  int $idHealthInformations
     *
     * @return Response
     */
    public function destroy($idHealthInformations)
    {
        $healthInformations = $this->healthInformationsRepository->findWithoutFail($idHealthInformations);

        if (empty($healthInformations)) {
            return response()->json(['errors' => 'Não encontrado']);
        }
        $this->healthInformationsRepository->delete($idHealthInformations);
    }
}
