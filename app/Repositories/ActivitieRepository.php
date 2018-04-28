<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Helpers\StorageHelper;
use App\Models\Activitie;
use InfyOm\Generator\Common\BaseRepository;

class ActivitieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];


    private $pathFiles = "/attached/";

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Activitie::class;
    }


    public function storeActivitie($request)
    {
        $data = $request->all();
        $helper = new Helpers();
        $storage = new StorageHelper();
        $data['start_date'] = $helper->formataDataPtBr($data['start_date']);
        $data['end_date'] = $helper->formataDataPtBr($data['end_date']);
        $activitie = $this->create($data);

        if ($request->hasFile('attachedFile')) {
            $storage->saveFile($request, 'attachedFile', $activitie, 'activitie_id');
        }

        return $activitie;
    }


    public function loadActivitie($id)
    {
        $activitie = $this->findWithoutFail($id);
        $activitie->load(['fileentry' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'aluno' => function ($query) {
            $query->orderBy('nome_aluno', 'asc');
        }]);

        return $activitie;
    }

    public function syncAluno($request, $id)
    {
        $data = $request->all();
        $activitie = $this->findWithoutFail($id);

        if (empty($activitie)) {
            return response()->json(array('message' => 'Item not existe!'));
        }

        $activitie->aluno()->sync(array($data['idAluno'] => ['media' => $data['average']]), false);

        return response(200);

    }

    public function getActivitiesByAluno(Alunos $alunos)
    {

    }

}
