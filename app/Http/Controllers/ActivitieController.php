<?php

namespace App\Http\Controllers;

use App\Repositories\ActivitieRepository;
use Illuminate\Http\Request;

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

}
