<?php

namespace App\Http\Controllers;

use App\Models\YearClass;
use App\Repositories\YearClassRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class YearClassController extends Controller
{

    private $yearClassRepository;


    public function __construct(YearClassRepository $yearClassRepo)
    {
        $this->middleware('auth');
        $this->yearClassRepository = $yearClassRepo;
    }

    public function index()
    {
        return view('yearClass.index');
    }


    public function show($idClass)
    {
        $class = YearClass::find($idClass);


        return view('yearClass.show')->with(compact('class'));
    }


    public function getBasicData()
    {

        $yearClass = YearClass::select(['id', 'classroom_id', 'activeTime', 'startTime', 'endTime']);

        return Datatables::of($yearClass)
            ->editColumn('classroom_id', function ($yearClass) {
                return $yearClass->classroom->nome_sala;
            })
            ->editColumn('startTime', function ($yearClass) {
                $startTime = Carbon::parse($yearClass->startTime);
                $endTime = Carbon::parse($yearClass->endTime);

                $diferenca = $startTime->diffInHours($endTime);

                return $startTime->format('h:i A') . ' ás ' . $endTime->format('h:i A') . ' - ' . $diferenca . 'h';
            })
            ->editColumn('activeTime', function ($yearClass) {

                $activeTime = Carbon::parse($yearClass->activeTime);

                $diferenca = Carbon::now()->diffInMonths($activeTime);
                return $activeTime->format('M-Y') . ' Encerra em ' . $diferenca . ' Meses';
            })
            ->addColumn('link', function ($yearClass) {
                return '
                <a href="/class/' . $yearClass->id . '' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="/class/' . $yearClass->id . '/edit' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                ';
            })
            ->rawColumns(['link', 'funcionamento'])
            ->make(true);
    }

    public function create()
    {
        return view('yearClass.create');
    }


    public function store(Request $request)
    {

        $input = $request->all();
        $input['activeTime'] = '01-' . $input['activeTime'];
        $input['activeTime'] = Carbon::createFromFormat('d-m-Y', $input['activeTime'])->format('Y-m-d');


        $class = $this->yearClassRepository->create($input);
        $class->pessoa()->sync(
            $input['professor_id']
        );

        $class->schoolSubject()->sync(
            $input['schoolsubjects_id']
        );

        return redirect(route('class.show', $class->id));
    }

    public function syncAluno(Request $request, $id)
    {
        return $this->yearClassRepository->addAlunoToYearClass($request, $id);
    }

    public function synchronizedStudents($id)
    {
        return $this->yearClassRepository->synchronizedStudents($id);
    }

}
