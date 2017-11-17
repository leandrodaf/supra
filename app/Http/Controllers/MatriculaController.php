<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $responsaveis = array_get($input, 'responsaveis');
        $dadosMedicos = array_get($input, 'dadosMedicos');
        $emails = array_get($input, 'email');

        array_forget($input, 'responsaveis');
        array_forget($input, 'dadosMedicos');
        array_forget($input, 'email');


        $input['data_nascimento_aluno'] = \Carbon\Carbon::parse($input['data_nascimento_aluno'])->format('Y-m-d');
        $input['foto_aluno'] = $this->alunosRepository->matriculaAvatar($request);

        $alunos = $this->alunosRepository->create($input);

        if (!empty($emails)) {
            $alunos->email()->createMany(
                $emails
            );
        }

        $alunos->medico()->create(
            $dadosMedicos
        );


        $alunos->pessoa()->sync($responsaveis);

        $flash = new Flash();
        $flash::success('Aluno criado com sucesso.');

        return redirect(route('alunos.show', $alunos->id));
    }

}
