<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoMatricula;
use App\Repositories\AlunosRepository;
use Flash;

class MatriculaController extends AppBaseController
{
    /** @var  AlunosRepository */
    private $alunosRepository;

    public function __construct(AlunosRepository $alunosRepo)
    {
        $this->alunosRepository = $alunosRepo;
    }

    public function index()
    {
        $tipoPessoas = \App\Models\TipoPessoa::where('status', '=', 1)->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');
        $estadoCivil = \App\Models\EstadoCivil::where('status', '=', 1)->get()->pluck('nome', 'id');
        $nacionalidades = \App\Models\Nacionalidade::where('status', '=', 1)->get()->pluck('nome', 'id');


        return view('matricula.index')->with(compact('tipoPessoas', 'generos', 'estadoCivil', 'nacionalidades'));
    }


    public function store(StoreAlunoMatricula $request)
    {

        $input = $request->all();

        $emails = array_get($input, 'email');
        $responsaveis = array_get($input, 'responsaveis');
        $dadosMedicos = array_get($input, 'dadosMedicos');

        array_forget($input, 'responsaveis');
        array_forget($input, 'dadosMedicos');
        array_forget($input, 'email');

        $input['data_nascimento_aluno'] = \Carbon\Carbon::parse($input['data_nascimento_aluno'])->format('Y-m-d');
        $input['foto_aluno'] = $this->alunosRepository->matriculaAvatar($request);

        $aluno = $this->alunosRepository->create($input);

        if (!empty($emails)) {
            $aluno->email()->createMany(
                $emails
            );
        }

        if (!empty($responsaveis)) {
            $aluno->pessoa()->sync($responsaveis);
        }

        if (!empty($dadosMedicos)) {
            $medicos = $aluno->medico()->create(
                $dadosMedicos
            );

            $aluno->dados_medicos_id = $medicos->id;

            $aluno->save();

        }


        $flash = new Flash();
        $flash::success('Aluno criado com sucesso.');

        return redirect(route('alunos.show', $aluno->id));
    }

}
