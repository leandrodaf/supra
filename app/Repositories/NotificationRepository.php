<?php

namespace App\Repositories;

use App\Models\Notification;
use InfyOm\Generator\Common\BaseRepository;

class NotificationRepository extends BaseRepository
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
        return Notification::class;
    }


    public function store($request)
    {
        if ($request->has('alunos')) {
            foreach ($request->alunos as $alunos) {
                $this->create([
                    'description' => $request->description,
                    'flg_satus' => $request->satus,
                    'exibition' => !empty($request->exibition) ? $request->exibition : null,
                    'notification_type_id' => $request->notification_type_id,
                    'alunos_id' => $alunos->id
                ]);
            }
            return response(200);
        }

        $this->create([
            'description' => $request->description,
            'flg_satus' => $request->satus,
            'exibition' => !empty($request->exibition) ? $request->exibition : null,
            'notification_type_id' => $request->notification_type_id,
            'alunos_id' => $request->aluno->id
        ]);
    }

}
