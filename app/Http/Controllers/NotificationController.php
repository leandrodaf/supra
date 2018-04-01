<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateNotificationRequest;
use App\Repositories\NotificationRepository;
use Validator;

class NotificationController extends Controller
{

    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepo)
    {
        $this->middleware('auth');
        $this->notificationRepository = $notificationRepo;
    }

//    public function store(CreateNotificationRequest $request)

    public function storeByYearClass(CreateNotificationRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'year_class_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->notificationRepository->storeNotificationAllClass($request);
        return redirect()->back();
    }


    public function storeByAluno(CreateNotificationRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'alunos_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->notificationRepository->storeNotificationAluno($request);
        return redirect()->back();
    }
}
