<?php

namespace App\Http\Controllers;

use App\Repositories\AlunosAcessoRepository;
use Auth;
use Illuminate\Http\Request;

class AlunosAcessoController extends Controller
{
    private $alunosAcessoRepository;

    public function __construct(AlunosAcessoRepository $alunosAcessoRepo)
    {
        $this->middleware(['role:Aluno', 'auth']);
        $this->alunosAcessoRepository = $alunosAcessoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.aluno.index');
    }

    public function atividade()
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);
        $activities = $aluno->getActivitiesByAluno($aluno);
        $atividadespaginate = \App\Helpers\Paginate::paginate($activities->sortBy('end_date'), 10);

        $atividadespaginate->withPath('/aluno/dash/atividade');

        return view('dash.aluno.atividade')->with(compact('atividadespaginate'));
    }


    public function turma()
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);
        $turmas = $aluno->getTurmaByIdAluno($aluno);

        $turmasPaginate = \App\Helpers\Paginate::paginate($turmas, 10);

        $turmasPaginate->withPath('/aluno/dash/turma');

        return view('dash.aluno.turma')->with(compact('turmasPaginate'));
    }

    public function mensagem()
    {
        $aluno = \App\Models\Alunos::find(Auth::user()->alunos_id);
        $notifications = $aluno->notification()->whereBetween('created_at', [\Carbon\Carbon::today()->subDays(15), \Carbon\Carbon::today()->addDays(20)])->orderBy('created_at', 'asc')->get();

        $notifciationPaginate = \App\Helpers\Paginate::paginate($notifications, 10);

        $notifciationPaginate->withPath('/aluno/dash/mensagem');

        return view('dash.aluno.mensagem')->with(compact('notifciationPaginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
