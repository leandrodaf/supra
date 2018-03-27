<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateNotificationRequest;
use App\Repositories\NotificationRepository;

class NotificationController extends Controller
{

    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepo)
    {
        $this->middleware('auth');
        $this->notificationRepository = $notificationRepo;
    }

    public function store(CreateNotificationRequest $request)
    {

        return dd($request);

    }
}
