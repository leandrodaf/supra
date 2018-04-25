<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Repositories\ActivitieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $this->activitieRepository->storeActivitie($request);

        return redirect()->back();
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

        Storage::delete($activitie->fileentry->pluck('filename'));

        $this->activitieRepository->delete($activitieId);

        return response(200);
    }

    public function syncAluno(Request $request, $id)
    {
        return $this->activitieRepository->syncAluno($request, $id);
    }

}
