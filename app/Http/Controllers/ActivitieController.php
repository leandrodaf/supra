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
            $flash = new Flash();
            $flash::error('Erro ao deletar atividade.');

            return redirect(route('class.index'));
        }

        $this->activitieRepository->delete($activitieId);

        $flash = new Flash();
        $flash::success('A atividade foi deletada com sucesso');

        return redirect()->back();
    }
}
