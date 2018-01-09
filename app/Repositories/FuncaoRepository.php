<?php

namespace App\Repositories;

use App\Models\Funcao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FuncaoRepository
 * @package App\Repositories
 * @version January 8, 2018, 9:03 pm -02
 *
 * @method Funcao findWithoutFail($id, $columns = ['*'])
 * @method Funcao find($id, $columns = ['*'])
 * @method Funcao first($columns = ['*'])
*/
class FuncaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Funcao::class;
    }
}
