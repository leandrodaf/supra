<?php

namespace App\Repositories;

use App\Models\Pessoa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PessoaRepository
 * @package App\Repositories
 * @version October 31, 2017, 1:16 am UTC
 *
 * @method Pessoa findWithoutFail($id, $columns = ['*'])
 * @method Pessoa find($id, $columns = ['*'])
 * @method Pessoa first($columns = ['*'])
*/
class PessoaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'cpf_cnpj',
        'sexo',
        'rg',
        'dataNascimento',
        'estadoCivil',
        'razaoSocial',
        'nomeFantasia',
        'inscricaoEstadual',
        'citizenship',
        'status',
        'tipo_pessoas_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pessoa::class;
    }
}
