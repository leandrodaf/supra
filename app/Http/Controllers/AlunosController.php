<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\CreateDocRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Models\Alunos;
use App\Repositories\AlunosRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;

class AlunosController extends AppBaseController
{
    /** @var  AlunosRepository */
    private $alunosRepository;

    public function __construct(AlunosRepository $alunosRepo)
    {
        $this->middleware('auth');
        $this->alunosRepository = $alunosRepo;
    }

    /**
     * Display a listing of the Alunos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->alunosRepository->pushCriteria(new RequestCriteria($request));
        return view('alunos.index');
    }

    public function getBasicData()
    {
        $alunos = Alunos::select(['id', 'foto_aluno', 'nome_aluno', 'rg_aluno', 'sexo_aluno', 'data_nascimento_aluno', 'tipo_pessoas_id']);

        return Datatables::of($alunos)
            ->addColumn('foto_modificada', function ($alunos) {
                return '<img src="' . asset('uploads/avatars/' . $alunos->foto_aluno) . '" class="user-image"
                     alt="' . $alunos->nome_aluno . '" style="height: 50px; width: 50px;">';
            })
            ->editColumn('data_nascimento_aluno', function ($alunos) {
                return $alunos->data_nascimento_aluno ? with(new Carbon($alunos->data_nascimento_aluno))->format('d/m/Y') : '';
            })
            ->editColumn('status', function ($alunos) {
                if ($alunos->status == 1) {
                    return 'Feminino';
                } elseif ($alunos->status == 2) {
                    return 'Masculino';
                } elseif ($alunos->status == 3) {
                    return 'Outro';
                }
            })
            ->editColumn('tipo_pessoas_id', function ($alunos) {

                if ($alunos->tipo_pessoas_id == 1) {
                    return 'Aluno';
                } elseif ($alunos->tipo_pessoas_id == 2) {
                    return 'Responsável';
                } elseif ($alunos->tipo_pessoas_id == 3) {
                    return 'Autorizado';
                } elseif ($alunos->tipo_pessoas_id == 4) {
                    return 'Funcionário';
                } elseif ($alunos->tipo_pessoas_id == 5) {
                    return 'Empresa';
                }

            })
            ->editColumn('sexo_aluno', function ($alunos) {

                return $alunos->sexo_aluno != 1 ? 'Masculino' : 'Feminino';

            })
            ->addColumn('link', function ($alunos) {
                return '
                <a href="/alunos/' . $alunos->id . '' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="/alunos/' . $alunos->id . '/edit' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                ';
            })
            ->rawColumns(['link', 'foto_modificada'])
            ->make(true);
    }

    /**
     * Show the form for creating a new Alunos.
     *
     * @return Response
     */
    public function create()
    {
        $tipoPessoas = \App\Models\TipoPessoa::where('status', '=', 1)->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');
        return view('alunos.create')->with(compact('tipoPessoas', 'generos'));
    }


    /**
     * Store a newly created Alunos in storage.
     *
     * @param CreateAlunosRequest $request
     *
     * @return Response
     */
    public function store(CreateAlunosRequest $request)
    {
        $helper = new Helpers();
        $input = $request->all();
        $emails = array_get($input, 'email');
        array_forget($input, 'email');

        $phones = array_get($input, 'phone');
        array_forget($input, 'phone');

        $input['data_nascimento_aluno'] = $helper->formataDataPtBr($input['data_nascimento_aluno']);
        $input['foto_aluno'] = $this->alunosRepository->createAvatar($request);
        $alunos = $this->alunosRepository->create($input);

        if (!empty($emails)) {
            $alunos->email()->createMany(
                $emails
            );
        }

        if (!empty($phones)) {
            $alunos->phone()->createMany(
                $phones
            );
        }

        $flash = new Flash();
        $flash::success('Aluno criado com sucesso.');
        return redirect(route('alunos.show', $alunos->id));
    }

    /**
     * Display the specified Alunos.
     *
     * @param  int $idAluno
     *
     * @return Response
     */
    public function show($idAluno)
    {
        $alunos = $this->alunosRepository->findWithoutFail($idAluno);
        $docType = DB::table('type_doc')->select('id', 'name')
            ->whereNotIn('id', [2, 5])
            ->get();
        $notificationType = DB::table('notification_type')->select('id', 'title')->get();
        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Aluno não encontrado.');
            return redirect(route('alunos.index'));
        }

        return view('alunos.show')->with(compact('alunos', 'notificationType', 'docType'));
    }

    /**
     * Show the form for editing the specified Alunos.
     *
     * @param  int $idAluno
     *
     * @return Response
     */
    public function edit($idAluno)
    {
        $tipoPessoas = \App\Models\TipoPessoa::where([['status', '=', 1], ['id', '=', 1]])->get()->pluck('nome', 'id');
        $genders = \App\Models\Gender::where('status', '=', 1)->get()->pluck('nome', 'id');
        $alunos = $this->alunosRepository->findWithoutFail($idAluno);
        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Aluno não encontrado');
            return redirect(route('alunos.index'));
        }
        return view('alunos.edit')->with('alunos', $alunos)->with(compact('tipoPessoas', 'genders'));
    }

    /**
     * Update the specified Alunos in storage.
     *
     * @param  int $idAluno
     * @param UpdateAlunosRequest $request
     *
     * @return Response
     */
    public function update($idAluno, UpdateAlunosRequest $request)
    {
        $helper = new Helpers();
        $input = $request->all();

        $emails = array_get($input, 'email');
        array_forget($input, 'email');

        $phones = array_get($input, 'phone');
        array_forget($input, 'phone');

        $alunos = $this->alunosRepository->findWithoutFail($idAluno);

        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Aluno não encontrado');
            return redirect(route('alunos.index'));
        }

        if ($request->hasFile('foto_aluno')) {
            $input['foto_aluno'] = $this->alunosRepository->updateAvatar($request);
        }

        $input['data_nascimento_aluno'] = $helper->formataDataPtBr($input['data_nascimento_aluno']);
        $alunos = $this->alunosRepository->update($input, $idAluno);

        if (!empty($emails)) {
            $alunos->email()->createMany($emails);
        }

        if (!empty($phones)) {
            $alunos->phone()->createMany($phones);
        }

        $flash = new Flash();
        $flash::success('Aluno Atualizado com sucesso.');
        return redirect(route('alunos.show', $idAluno));
    }

    /**
     * Update the specified Alunos in storage.
     *
     * @param  int $idAluno
     * @param Request $request
     *
     * @return Response
     */
    public function updateResponsaveis($idAluno, Request $request)
    {
        $input = $request->all();
        $alunos = $this->alunosRepository->findWithoutFail($idAluno);
        $responsaveis = [];
        foreach ($alunos->pessoa as $responsavel) {
            $responsaveis[] = $responsavel->id;
        }
        array_push($responsaveis, intval($input['responsavel']));
        $alunos->pessoa()->sync($responsaveis);
        $flash = new Flash();
        $flash::success('Aluno Atualizado com sucesso.');
        return redirect(route('alunos.show', $idAluno));
    }

    /**
     * Remove the specified Alunos from storage.
     *
     * @param  int $idAluno
     *
     * @return Response
     */
    public function destroy($idAluno)
    {
        $alunos = $this->alunosRepository->findWithoutFail($idAluno);
        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Alunos not found');
            return redirect(route('alunos.index'));
        }
        $this->alunosRepository->delete($idAluno);
        $flash = new Flash();
        $flash::success('Alunos deleted successfully.');
        return redirect(route('alunos.index'));
    }

    /**
     * Remove the specified Alunos from storage.
     *
     * @param  int $idAluno
     *
     * @return Response
     */
    public function desvincularAluno($idAluno, Request $request)
    {
        $alunos = $this->alunosRepository->findWithoutFail($request->id);
        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Aluno não encontrado');
            return redirect(route('alunos.index'));
        }
        $alunos->pessoa()->detach($idAluno);
        $flash = new Flash();
        $flash::success('Alunos deleted successfully.');
        return redirect()->back();
    }


    /**
     * Display the specified Pessoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getInfoUser($idAluno)
    {
        $aluno = $this->alunosRepository->findWithoutFail($idAluno);

        $resposta = [];

        $resposta['id'] = $aluno->id;
        $resposta['nome'] = $aluno->nome_aluno;
        $resposta['dataNascimento'] = $aluno->data_nascimento_aluno->format('d/m/Y');
        $resposta['sexo'] = $aluno->gender->nome;
        $resposta['rg'] = $aluno->rg_aluno;

        return response()->json($resposta);
    }

    public function mainEmailAlunoAjax(Request $request)
    {
        $parameters = $request->all();
        return $this->alunosRepository->setEmailMain($parameters['idAluno'], $parameters['idEmail']);
    }

    public function mainPhoneAlunosAjax(Request $request)
    {
        $parameters = $request->all();

        return $this->alunosRepository->setPhoneMain($parameters['idAluno'], $parameters['idPhone']);
    }


    public function availableAlunos(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;

            $aluno = new Alunos();

            $data = $aluno
                ->select("id", "nome_aluno")
//                ->where()
                ->limit(5)
                ->get();
        }

        return response()->json($data);
    }

    public function syncYearclass($id)
    {
        $this->alunosRepository->syncAluno($id);
    }


    public function getAllAlunos(Request $request, $id)
    {
        return $this->alunosRepository->getAllAlunos($request, $id);
    }


    public function storeDoc(CreateDocRequest $request)
    {

        $this->alunosRepository->storeDoc($request);
        return redirect()->back();
    }

}