<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Repositories\DashProfessorRepository;
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

            return view('dash.professor.index')->with(compact('turmas', 'diarios'));
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
        $dateNow = \Carbon\Carbon::now();
        $dateFiltrar = \Carbon\Carbon::create($dateNow->year, $dateNow->month, $dateNow->day, 0, 0, 0);
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


}
