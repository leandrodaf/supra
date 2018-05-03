<?php

namespace App\Http\Controllers;

use App\Repositories\DashProfessorRepository;
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

            return view('dash.professor.index')->with(compact('turmas'));
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

}
