<?php

namespace App\Http\Controllers;

class MatriculaController extends Controller
{
    public function index()
    {
        $tipoPessoas = \App\Models\TipoPessoa::where('status', '=', 1)->get()->pluck('nome', 'id');
        $generos = \App\Models\Genero::where('status', '=', 1)->get()->pluck('nome', 'id');
        $estadoCivil = \App\Models\EstadoCivil::where('status', '=', 1)->get()->pluck('nome', 'id');
        $nacionalidades = \App\Models\Nacionalidade::where('status', '=', 1)->get()->pluck('nome', 'id');


        return view('matricula.index')->with(compact('tipoPessoas', 'generos', 'estadoCivil', 'nacionalidades'));
    }

}
