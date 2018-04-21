<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateNotificationRequest;
use App\Models\Notification;
use App\Repositories\NotificationRepository;
use Validator;
use Yajra\DataTables\DataTables;

class NotificationController extends Controller
{

    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepo)
    {
        $this->middleware('auth');
        $this->notificationRepository = $notificationRepo;
    }

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

    public function getNotification($id)
    {
        $notification = $this->notificationRepository->getNotifciationById($id);
        return response()->json($notification);
    }

    public function getAll()
    {
        $notifications = $this->notificationRepository->getAll();

        return response()->json($notifications);
    }

    public function getBasicData()
    {
        $notifications = Notification::select(['id', 'title', 'exibition', 'notification_type_id']);

        return Datatables::of($notifications)
            ->editColumn('title', function ($notifications) {
                return $notifications->title;
            })
            ->editColumn('exibition', function ($notifications) {
                return $notifications->exibition->format('d/m/Y');
            })
            ->editColumn('notification_type_id', function ($notifications) {
                return $notifications->type->get(0)->title;
            })
            ->addColumn('link', function ($alunos) {
                return '
                <div class="text-center"><a data-id="' . $alunos->id . '" data-toggle="modal" data-target="#modal-doc-notifciation" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a></div>
                ';
            })
            ->rawColumns(['link'])
            ->make(true);
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        $notification->load(['type', 'aluno', 'yearclass']);

        return response()->json($notification);
    }

}
