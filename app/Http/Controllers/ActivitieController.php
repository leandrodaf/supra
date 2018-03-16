<?php

namespace App\Http\Controllers;

use App\Repositories\ActivitieRepository;
use Illuminate\Http\Request;
use Flash;

class ActivitieController extends Controller
{
    /** @var  ActivitieRepository */
    private $activitieRepository;

    public function __construct(ActivitieRepository $activitieRepo)
    {
        $this->middleware('auth');
        $this->activitieRepository = $activitieRepo;
    }

    public function store(Request $request)
    {
        return $this->activitieRepository->storeActivitie($request);

    }

    public function loadActivitie($id)
    {
        return response()->json($this->activitieRepository->loadActivitie($id));
    }


    public function destroy($activitieId)
    {
        $activitie = $this->activitieRepository->findWithoutFail($activitieId);

        if (empty($activitie)) {
            return response()->json(array('message' => 'Item not existe!'));
        }

        $this->activitieRepository->delete($activitieId);

        return response(200);

    }
}
