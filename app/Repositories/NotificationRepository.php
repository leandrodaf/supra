<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Models\Notification;
use App\Models\YearClass;
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


    public function storeNotificationAllClass($request)
    {

        $helper = new Helpers();

        $notification = $request->all();
        $notification['flg_status'] = false;
        $notification['exibition'] = $helper->formataDataPtBr($request->exibition);

        array_forget($notification, '_token');
        array_forget($notification, '_method');

        $class = YearClass::find($request->year_class_id);

        foreach ($class->alunos as $alunos) {
            $notification['alunos_id'] = $alunos->id;
            $this->create($notification);
        }

    }

    public function storeNotificationAluno($request)
    {

        $helper = new Helpers();

        $notification = $request->all();

        $notification['flg_status'] = false;
        $notification['exibition'] = $helper->formataDataPtBr($request->exibition);

        array_forget($notification, '_token');
        array_forget($notification, '_method');

        $this->create($notification);
    }


}
