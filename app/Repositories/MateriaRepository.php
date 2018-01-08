<?php

namespace App\Repositories;

use App\Models\Materia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MateriaRepository
 * @package App\Repositories
 * @version January 8, 2018, 8:44 pm -02
 *
 * @method Materia findWithoutFail($id, $columns = ['*'])
 * @method Materia find($id, $columns = ['*'])
 * @method Materia first($columns = ['*'])
*/
class MateriaRepository extends BaseRepository
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
        return Materia::class;
    }
}
