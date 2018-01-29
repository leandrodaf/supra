<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Repositories\AlunosRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
class AlunosController extends AppBaseController
{
    /** @var  AlunosRepository */
    private $alunosRepository;
    public function __construct(AlunosRepository $alunosRepo)
    {
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
        $alunos = $this->alunosRepository->all();
        return view('alunos.index')
            ->with('alunos', $alunos);
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

        $input['data_nascimento_aluno'] = $helper->formataDataPtBr($input['data_nascimento_aluno']);
        $input['foto_aluno'] = $this->alunosRepository->createAvatar($request);
        $alunos = $this->alunosRepository->create($input);
        if (!empty($emails)) {
            $alunos->email()->createMany(
                $emails
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
        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Aluno não encontrado.');
            return redirect(route('alunos.index'));
        }
        return view('alunos.show')->with('alunos', $alunos);
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
        $input = $request->all();
        $emails = array_get($input, 'email');
        array_forget($input, 'email');
        $alunos = $this->alunosRepository->findWithoutFail($idAluno);
        if (empty($alunos)) {
            $flash = new Flash();
            $flash::error('Aluno não encontrado');
            return redirect(route('alunos.index'));
        }
        if ($request->hasFile('foto_aluno')) {
            $input['foto_aluno'] = $this->alunosRepository->updateAvatar($request);
        }
        $input['data_nascimento_aluno'] = \Carbon\Carbon::parse($input['data_nascimento_aluno'])->format('Y-m-d');
        $alunos = $this->alunosRepository->update($input, $idAluno);
        if (!empty($emails)) {
            $alunos->email()->createMany($emails);
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
}