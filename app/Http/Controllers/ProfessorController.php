<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Diary;
use App\Repositories\DashProfessorRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{

    private $dashProfessorRepository;

    public function __construct(DashProfessorRepository $dashprofessorRepo)
    {
        $this->middleware('auth');
        $this->dashProfessorRepository = $dashprofessorRepo;
    }

    public function index()
    {
        if (Auth::user()->hasRole('Professor')) {
            $turmas = $this->turmas();
            $diarios = $this->diarioAluno();
            $chamadas = $this->chamadaAluno();

            return view('dash.professor.index')->with(compact('turmas', 'diarios', 'chamadas'));
        } else {
            return redirect(Auth::user()->getRoutePanel());
        }
    }

    public function turmas()
    {
        $pessoa = \App\Models\Pessoa::find(Auth::user()->pessoa_id);
        $turmas = Auth::user()->pessoa->getTurmaByIdAluno($pessoa);

        $turmasPaginate = \App\Helpers\Paginate::paginate($turmas, 5);

        $turmasPaginate->withPath('/dash/professor');

        return $turmasPaginate;
    }

    public function diarioAluno()
    {
        $pessoa = \App\Models\Pessoa::find(Auth::user()->pessoa_id);
        $dateNow = Carbon::now();
        $dateFiltrar = Carbon::create($dateNow->year, $dateNow->month, $dateNow->day, 0, 0, 0);
        $diaryProfessor = new Collection();

        foreach ($pessoa->yearClass as $class) {
            foreach ($class->alunos as $alunos) {
                $diarios = $alunos->diairy->whereIn('date', [$dateFiltrar, $dateNow->addHours(24)]);

                if (count($diaryProfessor->where('alunos_id', $alunos->id)) != 1) {
                    if (count($diarios) == 0) {
                        $diaryPendent = new Diary();
                        $diaryPendent->alunos_id = $alunos->id;
                        $diaryPendent->date = $dateFiltrar;
                        $diaryProfessor->push($diaryPendent);
                    }
                }
            }

        }

        $diarioPaginate = \App\Helpers\Paginate::paginate($diaryProfessor, 5);

        $diarioPaginate->withPath('/dash/professor');

        return $diarioPaginate;
    }


    public function chamadaAluno()
    {
        $pessoa = \App\Models\Pessoa::find(Auth::user()->pessoa_id);
        $chamadas = new Collection();
        $yearclass = $pessoa->yearclass;
        $call = Call::whereIn('year_class_id', $yearclass->pluck('id'))->get();
        $dateNow = Carbon::now();

        foreach ($yearclass as $class) {
            $dateStart = \App\Helpers\RangeDates::createDate($class->activeTime);
            $dateEnd = Carbon::create($dateNow->year, $dateNow->month, $dateNow->day, 0, 0, 0);
            $rangeDate = \App\Helpers\RangeDates::generateDateRange($dateStart, $dateEnd, $class);
            $notRange = \App\Helpers\RangeDates::formatDateColection($call->pluck('date'));

            foreach ($rangeDate->whereNotIn('date', $notRange) as $item) {
                $chamadas->push($item);
            }
        }

        $chamadasPendentes = \App\Helpers\Paginate::paginate($chamadas, 5);
        $chamadasPendentes->withPath('/dash/professor');
        return $chamadasPendentes;
    }

}
