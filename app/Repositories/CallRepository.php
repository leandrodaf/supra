<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Models\Call;
use InfyOm\Generator\Common\BaseRepository;


class CallRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Call::class;
    }


    public function store($request)
    {
        if (empty($request)) {
            return response(500);
        }

        $data = $request->all();

        $helper = new Helpers();

        $data['date'] = $helper->formataDataPtBr($data['date']);

        $call = $this->model->create($data);

        $call->aluno()->sync($request->aluno);

        return response(200);
    }


    public function checkDate($date)
    {
        $helper = new Helpers();

        try {
            $calls = Call::whereDate('date', $helper->formataDataPtBr($date))->firstOrFail();
            return $calls->aluno;
        } catch (\Exception $e) {
            return array();
        }

    }

    public function checkDateUpdate($request)
    {
        $helper = new Helpers();

        try {
            $data = $request->all();

            $calls = Call::whereDate('date', $helper->formataDataPtBr($request->date))->firstOrFail();

            $calls->aluno()->sync($request->aluno);

            return response(200);


        } catch (\Exception $e) {
            return array();
        }

    }


}
