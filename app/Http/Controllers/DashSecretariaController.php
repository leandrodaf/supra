<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Classroom;
use App\Models\Pessoa;
use App\Models\YearClass;
use App\Repositories\DashSecretariaRepository;

class DashSecretariaController extends Controller
{
    private $dashSecretariaRepository;

    public function __construct(DashSecretariaRepository $ashSecretariaRepo)
    {
        $this->middleware('auth');
        $this->dashSecretariaRepository = $ashSecretariaRepo;
    }


    public function index()
    {
        return view('dash.secretaria.index');
    }


    public function dataBoxCountTop()
    {
        $turmasAbertas = YearClass::count();
        $funcionarios = Pessoa::where('tipo_pessoas_id', '=', '4')->count();
        $totalAlunos = Alunos::count();
        $totalSalas = Classroom::count();

        return response()->json([
            "turmas" => $turmasAbertas,
            "funcionarios" => $funcionarios,
            "alunos" => $totalAlunos,
            "salas" => $totalSalas
        ], 201);

    }


    public function dataBoxTurmas()
    {
        $turmasAbertas = YearClass::where('activeTime', '>', \Carbon\Carbon::now())
            ->count();

        $turmasFecadas = YearClass::where('activeTime', '<', \Carbon\Carbon::now())
            ->count();

        return response()->json(["turmasAbertas" => $turmasAbertas, "turmasFechadas" => $turmasFecadas]);
    }


    public function dataAlunosxAlunos()
    {
        $totalAlunos = Alunos::count();
        $alunosAtivos = Alunos::where('status', '=', true)->count();
        $alunosInativos = Alunos::where('status', '=', false)->count();

        $alunosEstudando = Alunos::where('status', '=', true)
            ->whereHas('yearClass', function ($query) {
                $query
                    ->where('activeTime', '=', \Carbon\Carbon::now()->format('Y-m-d'))
                    ->orWhere('activeTime', '>', \Carbon\Carbon::now()->format('Y-m-d'));
            })
            ->count();


        return response()->json(["alunosAtivos" => $alunosAtivos, "alunosInativos" => $alunosInativos, "alunosEstudando" => $alunosEstudando]);
    }


}
