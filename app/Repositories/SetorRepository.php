<?php

namespace App\Repositories;

use App\Models\Setor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SetorRepository
 * @package App\Repositories
 * @version January 9, 2018, 11:49 am -02
 *
 * @method Setor findWithoutFail($id, $columns = ['*'])
 * @method Setor find($id, $columns = ['*'])
 * @method Setor first($columns = ['*'])
*/
class SetorRepository extends BaseRepository
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
        return Setor::class;
    }
}
