<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Models\Alunos;
use App\Repositories\AlunosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Yajra\Datatables\Datatables;

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
        $columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

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
        $tipo_pessoas = \App\Models\TipoPessoa::where('status', '=', 1)->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');

        return view('alunos.create')->with(compact('tipo_pessoas', 'generos'));
//        return view('alunos.create');

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
        $input = $request->all();

        $emails = array_get($input, 'email');
        array_forget($input, 'email');


        $input['data_nascimento_aluno'] = \Carbon\Carbon::parse($input['data_nascimento_aluno'])->format('Y-m-d');
        $input['foto_aluno'] = $this->alunosRepository->create_avatar($request);

        $alunos = $this->alunosRepository->create($input);

        return dd($emails);
        $alunos->email()->createMany(
            $emails
        );


        Flash::success('Aluno criado com sucesso.');

        return redirect(route('alunos.show', $alunos->id));
    }

    /**
     * Display the specified Alunos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alunos = $this->alunosRepository->findWithoutFail($id);

        if (empty($alunos)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('alunos.index'));
        }

        return view('alunos.show')->with('alunos', $alunos);
    }


    /**
     * Show the form for editing the specified Alunos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipo_pessoas = \App\Models\TipoPessoa::where('status', '=', 1)->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');

        $alunos = $this->alunosRepository->findWithoutFail($id);


        if (empty($alunos)) {
            Flash::error('Aluno não encontrado');

            return redirect(route('alunos.index'));
        }

        return view('alunos.edit')->with('alunos', $alunos)->with(compact('tipo_pessoas', 'generos'));
    }

    /**
     * Update the specified Alunos in storage.
     *
     * @param  int $id
     * @param UpdateAlunosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlunosRequest $request)
    {

        $input = $request->all();

        $emails = array_get($input, 'email');
        array_forget($input, 'email');

        $alunos = $this->alunosRepository->findWithoutFail($id);

        if (empty($alunos)) {
            Flash::error('Aluno não encontrado');
            return redirect(route('alunos.index'));
        }

        if ($request->hasFile('foto_aluno')) {
            $input['foto_aluno'] = $this->alunosRepository->update_avatar($request);
        }

        $input['data_nascimento_aluno'] = \Carbon\Carbon::parse($input['data_nascimento_aluno'])->format('Y-m-d');
        $alunos = $this->alunosRepository->update($input, $id);

        if (!empty($emails))
            $alunos->email()->createMany($emails);

        Flash::success('Aluno Atualizado com sucesso.');

        return redirect(route('alunos.show', $id));
    }


    /**
     * Update the specified Alunos in storage.
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function updateResponsaveis($id, Request $request)
    {
        $input = $request->all();
        $alunos = $this->alunosRepository->findWithoutFail($id);
        $alunos->pessoa()->sync($input['responsavel']);

        Flash::success('Aluno Atualizado com sucesso.');

        return redirect(route('alunos.show', $id));
    }


    /**
     * Remove the specified Alunos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alunos = $this->alunosRepository->findWithoutFail($id);

        if (empty($alunos)) {
            Flash::error('Alunos not found');

            return redirect(route('alunos.index'));
        }

        $this->alunosRepository->delete($id);

        Flash::success('Alunos deleted successfully.');

        return redirect(route('alunos.index'));
    }


    /**
     * Remove the specified Alunos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function desvincularAluno($id, Request $request)
    {
        $alunos = $this->alunosRepository->findWithoutFail($request->id);

        if (empty($alunos)) {
            Flash::error('Aluno não encontrado');

            return redirect(route('alunos.index'));
        }

        $alunos->pessoa()->detach($id);

        Flash::success('Alunos deleted successfully.');

        return redirect()->back();
    }


}
