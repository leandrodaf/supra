<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoMatricula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_aluno' => 'required|min:3|max:255',
            'foto_aluno' => '',
            'rg_aluno' => 'required|min:12|unique:alunos',
            'sexo_aluno' => 'required',
            'flg_certidao_nascimento_aluno' => 'required',
            'flg_carteira_vacinacao_aluno' => 'required',
            'flg_frequentou_escola_aluno' => 'required',
            'flg_irmaos_aluno' => 'required',
            'flg_juntos_aos_pais_aluno' => 'required',
            'qtd_irmaos_aluno' => 'nullable|min:1|max:10',
            'data_nascimento_aluno' => 'required|date',
            'tipo_pessoas_id' => 'required',
            'email.*' => 'required',
            'responsaveis.*' => 'required',
            'dadosMedicos.*' => 'required',
        ];
    }
}
